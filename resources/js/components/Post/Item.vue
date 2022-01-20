<template>
  <el-container>
    <el-header height="80px;">
      <div class="header-container">
        <a class="logo" href="index.html">
          <img
            class="logo-img"
            src="https://image.hoken-room.jp/asset/header_logo.svg"
          />
        </a>
      </div>
    </el-header>
    <el-main>
      <el-row class="wrapper">
        <h1 style="font-size:20px;display:inline;">編集画面</h1>
        <el-col :span="24" :offset="0" class="item-box">
          <div style="margin: 10px;">
            <el-form>
              <el-form-item>
                <legend>textを入力</legend>
                <el-input
                  type="textarea"
                  :rows="2"
                  style="width: 90%; height: 50px; margin-bottom:10px;"
                  v-model="text"
                >
                </el-input>
                <el-button
                  type="primary"
                  @click="submitItem"
                  :disabled="itemLoading"
                  >保存する</el-button
                >
                <el-button>キャンセル</el-button>
              </el-form-item>
            </el-form>
            <div>
              <div
                class="item text-item"
                v-for="(item, key) in itemDataList"
                :key="key"
                @mouseenter="mouseenter(item.id)"
                @mouseleave="mouseleave(item.id)"
              >
                <p claa="text-item-p">{{ item.comment }}</p>
                <div class="editpager clearfix" v-if="itemId === item.id">
                  <el-button-group>
                    <el-button
                      class="first-order"
                      icon="el-icon-top"
                      @click="itemToTop(key)"
                      :disabled="itemLoading"
                      >一番上へ</el-button
                    >
                    <el-button
                      class="minus-order"
                      icon="el-icon-arrow-up"
                      @click="itemUp(key)"
                      :disabled="itemLoading"
                      >上へ</el-button
                    >
                    <el-button
                      class="first-order"
                      icon="el-icon-arrow-down"
                      @click="itemDown(key)"
                      :disabled="itemLoading"
                      >下へ</el-button
                    >
                    <el-button
                      class="first-order"
                      icon="el-icon-bottom"
                      @click="itemToBottom(key)"
                      :disabled="itemLoading"
                      >一番下へ</el-button
                    >
                    <el-button
                      class="first-order"
                      icon="el-icon-edit"
                      @click="edit(key)"
                      :disabled="itemLoading"
                      >編集</el-button
                    >
                    <el-button
                      class="first-order"
                      icon="el-icon-delete"
                      @click="deleteItem(item.id, key)"
                      :disabled="itemLoading"
                      >削除</el-button
                    >
                    <el-form v-if="isEdit && nowEditKey === key">
                      <el-form-item>
                        <legend>textを入力</legend>
                        <el-input
                          type="text"
                          :rows="2"
                          style="width: 90%; height: 50px; margin-bottom:10px;"
                          v-model="newcomment"
                        >
                        </el-input>
                        <el-button
                          type="primary"
                          @click="editItem(item.id)"
                          :disabled="itemLoading"
                          >保存する</el-button
                        >
                        <el-button @click="cancel">キャンセル</el-button>
                      </el-form-item>
                    </el-form>
                  </el-button-group>
                </div>
              </div>
            </div>
          </div>
        </el-col>
      </el-row>
    </el-main>
    <el-footer>
      <div class="footer-container">
        <ul class="footer-menu">
          <li>会社概要<span>|</span></li>
          <li>利用規約<span>|</span></li>
          <li>プライバシーポリシー</li>
        </ul>
        <p class="copyright">Copyright© Wizleap Inc. engineers.</p>
      </div>
    </el-footer>
  </el-container>
</template>

<script>
export default {
  data() {
    return {
      itemDataList: "",
      itemId: "",
      text: "",
      itemLoading: false,
      isEdit: false,
      nowEditKey: "",
      newcomment: ""
    };
  },
  mounted: function() {
    this.getItems();
  },
  methods: {
    mouseenter(id) {
      if (!this.isEdit) {
        this.itemId = id;
      }
    },
    mouseleave() {
      if (!this.isEdit) {
        this.itemId = null;
      }
    },
    getItems() {
      axios
        .post("post/items/", {
          post_id: this.$route.params.id
        })
        .then(res => {
          this.postDataList = res.data.data;
          if (this.postDataList != null) {
            this.itemDataList = this.postDataList[0]["items"];
          }
        });
    },
    //削除機能
    deleteItem(id, key) {
      if (!confirm("削除しますか？")) {
        return false;
      }
      this.itemLoading = true;
      this.itemDataList.splice(key, 1);
      const itemOrder = this.getItemOrder();
      axios
        .post("/post/delete_item", {
          item_id: id,
          post_id: this.$route.params.id,
          item_order: itemOrder
        })
        .then(res => {
          this.itemLoading = false;
        });
    },
    edit(key) {
      this.isEdit = true;
      this.nowEditKey = key;
      this.newcomment = this.itemDataList[key].comment;
    },
    editItem(id) {
      this.itemLoading = true;
      axios
        .post("/post/edit_item", {
          item_id: id,
          comment: this.newcomment
        })
        .then(res => {
          this.itemLoading = false;
          this.isEdit = false;
          this.itemId = null;
          this.nowEditKey = "";
          this.getItems();
        });
    },
    cancel() {
      this.isEdit = false;
      this.nowEditKey = "";
      this.itemId = null;
    },
    getItemOrder() {
      const itemIds = this.itemDataList.map(v => v.id);
      return itemIds.join(",");
    },
    submitItem() {
      this.itemLoading = true;
      axios
        .post("/post/store_item", {
          post_id: this.$route.params.id,
          comment: this.text
        })
        .then(res => {
          this.text = "";
          this.itemLoading = false;
          this.getItems();
        });
    },
    itemToTop(key) {
      if (key <= 0) {
        return false;
      }
      this.itemLoading = true;
      const item = this.itemDataList[key];
      const beforeItems = this.itemDataList.slice(0, key);
      const afterItems = this.itemDataList.slice(key + 1);
      this.itemDataList = [item].concat(beforeItems).concat(afterItems);
      const itemOrder = this.getItemOrder();
      axios
        .post("/post/update_item_order", {
          post_id: this.$route.params.id,
          item_order: itemOrder
        })
        .then(res => {
          this.itemLoading = false;
          this.getItems();
        });
    },
    itemUp(key) {
      if (key <= 0) {
        return false;
      }
      this.itemLoading = true;
      const item_to_down = this.itemDataList[key - 1];
      const item_to_up = this.itemDataList[key];
      this.itemDataList[key - 1] = item_to_up;
      this.itemDataList[key] = item_to_down;
      const itemOrder = this.getItemOrder();
      axios
        .post("/post/update_item_order", {
          post_id: this.$route.params.id,
          item_order: itemOrder
        })
        .then(res => {
          this.itemLoading = false;
          this.getItems();
        });
    },
    itemDown(key) {
      if (key >= this.itemDataList.length - 1) {
        return false;
      }
      this.itemLoading = true;
      const item_to_down = this.itemDataList[key];
      const item_to_up = this.itemDataList[key + 1];
      this.itemDataList[key] = item_to_up;
      this.itemDataList[key + 1] = item_to_down;
      const itemOrder = this.getItemOrder();
      axios
        .post("/post/update_item_order", {
          post_id: this.$route.params.id,
          item_order: itemOrder
        })
        .then(res => {
          this.itemLoading = false;
          this.getItems();
        });
    },
    itemToBottom(key) {
      if (key >= this.itemDataList.length - 1) {
        return false;
      }
      this.itemLoading = true;
      const item = this.itemDataList[key];
      const beforeItems = this.itemDataList.slice(0, key);
      const afterItems = this.itemDataList.slice(key + 1);
      this.itemDataList = beforeItems.concat(afterItems).concat([item]);
      const itemOrder = this.getItemOrder();
      axios
        .post("/post/update_item_order", {
          post_id: this.$route.params.id,
          item_order: itemOrder
        })
        .then(res => {
          this.itemLoading = false;
          this.getItems();
        });
    }
  }
};
</script>
