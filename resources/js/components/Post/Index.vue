
<template>
  <el-container>
    <el-header height="auto;">
      <div class="wizleap_header">
        <div class="icon">
          <a href="https://hoken-room.jp">
            <img src="https://image.hoken-room.jp/asset/top_logo.png" width="230" height="40" alt="ほけんROOMのアイコンです">
          </a>
        </div>
        <div class="searchHome">
          <form id="search">
            <input id="searchBox"  name="s" type="text" placeholder="保険に関するお悩みを教えてください" />
            <input id="searchBtn" type="submit" value="検索" />
          </form>
        </div>
      </div>
    </el-header>
    <!-- 記事要素全体の編集 -->
    <el-main>
      <div class="all_contents">
        <div class="contents">
          <div class="article_top">
            <h2>「記事一覧」の１ページ目(1-50 / 5274件 )</h2>
          </div>
          <ul
            v-for="(post, index) in postDataList"
            :key="index">
            <li>
              <section>
                <div class="pic">
                  <img src="https://image.hoken-room.jp/article/original/8119.jpg?" >
                </div>
                <div class="info">
                  <div class="article">
                    <p>{{ post.title }}</p>
                  </div>
                </div>
              </section>
            </li>
          </ul>
        </div>
        <div class="sideBox">
          <div class="sideBox_ranking">
            <h2 class="sideBox_ranking_top">人気の記事ランキング</h2>
            <ul>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/original/1878.jpg?2020-03-03%2007:40:21">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/seimei/1878">【保険の窓口別】無料の保険相談でプレゼントが貰えるキャンペーン【2020年最新】</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/image/pixta/pixta_37665186_S.jpg">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/seimei/182">生命保険の見直しポイントを徹底解説！保険を見直したい方必見！</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/original/8119.jpg?2020-02-21%2002:18:43">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/car/6705">ソニー損保のCMに出演しているあの女優は？歴代女優も全員紹介！</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/normal/8495.jpg?2020-04-27 18:33:08">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/money-life/8495">お金ない・貯金なしでも結婚できる！その理由や結婚費用の相場を解説</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/normal/8491.jpg?2020-04-27 16:05:03">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/money-life/8491">老後貧乏になる人とその原因・対策！お金がない老後を回避するために</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/normal/8500.jpg?2020-04-28 12:37:08">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/money-life/8500">お金を貯めたい人必見の節約術・貯金術！現役FPが教える上手な貯金の仕方</a>
                  </div>
                </section>
              </li>
            </ul>
          </div>
          <!-- 最新記事一覧の編集 -->
          <div class="sideBox_newest">
            <h2 class="sideBox_newest_second">最新投稿記事一覧</h2>
            <ul>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/original/8119.jpg?2020-02-21%2002:18:43">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/car/8119">マセラティを購入した方が入るべき保険とは？保険料の違いなどを解説</a>
                  </div>
                </section>
              </li>
              <li>
                <section>
                  <div class="pic_side">
                    <img src="https://image.hoken-room.jp/article/normal/8581.jpg?2020-05-11 17:16:55">
                  </div>
                  <div class="info">
                    <a href="https://hoken-room.jp/money-life/8581">年金が高すぎる理由！年金を払えない時の対処法や未払いのデメリットを解説</a>
                  </div>
                </section>
              </li>
            </ul>
          </div>
        </div>
        <div class="contents_number">
          <ul>
            <li><a href="https://hoken-room.jp/search?page=1">1</a></li>
            <li><a href="https://hoken-room.jp/search?page=2">2</a></li>
            <li><a href="https://hoken-room.jp/search?page=3">3</a></li>
            <li><a href="https://hoken-room.jp/search?page=4">4</a></li>
            <span class="page-numbers dots">…</span>
            <li><a href="https://hoken-room.jp/search?page=20">20</a></li>
            <span class="page-numbers dots">…</span>
            <li><a href="https://hoken-room.jp/search?page=40">40</a></li>
          </ul>
        </div>
      </div>
    </el-main>
    <!-- footerの編集 -->
    <el-footer>
      <div class="wizleap_footer">
        <div class="wizleap_footer0">
          <div class="wizleap_footer1">
            <ul>
              <h2>はじめての方に</h2>
              <li><a href="https://hoken-room.jp/service">ほけんROOM相談室とは【無料保険相談】</a></li>
              <li><a href="https://hoken-room.jp/voice">サービス利用者の声 </a></li>
              <li><a href="https://hoken-room.jp/faq">保険相談のよくあるご質問</a></li>
            </ul>
            <ul>
            <h2 class="footer_kakei_hoken">家計・保険について学ぶ</h2>
              <div class="footer_kakei_hoken1">
                <h3 class="seimei_hoken">▼生命保険</h3>
                <div class="seimeihoken_kiso">
                  <div class="hoken_1">生命保険の基礎</div>
                  <div class="hoken_1">医療保険の基礎</div>
                  <div class="hoken_1">女性保険の基礎</div>
                  <div class="hoken_1">がん保険の基礎</div>
                  <div class="hoken_1">学資保険の基礎</div>
                  <div class="hoken_1">個人年金保険の基礎</div>
                  <div class="hoken_1">介護保険の基礎</div>
                </div>
              </div>
              <h3 class="songai_hoken">▼損害保険</h3>
              <div class="songaihoken_kiso">
                <div class="hoken_1">自動車保険の基礎</div>
                <div class="hoken_1">自転車保険の基礎</div>
                <div class="hoken_1">火災保険の基礎</div>
                <div class="hoken_1">海外保険の基礎</div>
                <div class="hoken_1">ペット保険の基礎</div>
                <div class="hoken_1">ミニ保険の基礎</div>
              </div>
              <h3 class="other_hoken">▼その他</h3>
                <div class="seimeihoken_kiso">
                  <div class="hoken_1">法人保険の基礎</div>
                  <div class="hoken_1">マネーライフ</div>
                </div>
            </ul>
          </div>
          <div class="wizleap_footer2">
            <ul>
              <h2>エリアから保険相談を探す</h2>
                <h3 class="other_hoken">◆北海道・東北</h3>
                <div class="seimeihoken_kiso">
                  <div class="hoken_1">北海道(札幌)</div>
                  <div class="hoken_1">青森</div>
                  <div class="hoken_1">岩手(盛岡)</div>
                  <div class="hoken_1">宮城(仙台)</div>
                  <div class="hoken_1">秋田</div>
                  <div class="hoken_1">山形</div>
                  <div class="hoken_1">福島</div>
                </div>
            </ul>
          </div>
          <div class="wizleap_footer3">
            <div class="wizleap_footer3_companyinfo">
              <p class="dairiten">[損害保険募集代理店]</p>
              <p class="companyName">株式会社Wizleap</p>
              <p class="dairitenName">代理店番号:HT-5382</p>
              <p class="TELL">TEL: 050-5241-5397</p>
              <p class="MAIL">mail:
                <a href="mailto:info@hoken-room.jp" target="_blank"> info@hoken-room.jp</a>
              </p>
            </div>
            <h2 class="SNS">ほけんROOMの公式SNS</h2>
            <ul>
              <a href="https://www.facebook.com/hokenroom/">
                <img src="https://image.hoken-room.jp/design/ic_sns_fb.png" width="70" height="40" alt="FaceBookのアイコンです"></a>
              <a href="https://www.instagram.com/hoken__room/">
                <img src="https://image.hoken-room.jp/design/ic_sns_ig.png" width="70" height="40" alt="instagramのアイコンです"></a>
              <a href="https://twitter.com/hokenROOM">
                <img src="https://image.hoken-room.jp/design/ic_sns_tw.png" width="70" height="40" alt="Twitterのアイコンです"></a>
              <a href="https://line.me/R/ti/p/%40qvl1577p">
                <img src="https://image.hoken-room.jp/design/ic_sns_ln.png" width="70" height="40" alt="Lineのアイコンです"></a>
              </ul>
            <h2>ほけんROOMについて</h2>
            <ul>
              <li>運営会社</li>
              <li>サービス利用規約</li>
              <li>個人情報の取り扱いについて</li>
              <li>勧誘方針</li>
              <li>サイトマップ</li>
              <li>記事TOP</li>
              <li>用語集TOP</li>
              <li>Q&A TOP</li>
            </ul>
            </div>
          </div>
        </div>
      <div class="wizleap_footer_copyright">
        <p>ほけんROOMを運営する株式会社Wizleapは損害保険代理店です。</p>
        <p id="copyright_footer">Copyright © Wizleap All Rights Reserved.</p>
      </div>
    </el-footer>
  </el-container>
</template>

<script>
  export default {
    data() {
      return {
        postDataList: '',
      }
    },
    mounted: function() {
      this.getPost();
    },
    methods: {
      getPost() {
        axios.get('/api/post/')
        .then( (res) => {
          this.postDataList = res.data.data;
        });
      }
    }
  }
</script>
