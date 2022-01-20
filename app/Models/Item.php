<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;
use Illuminate\Support\Facades\Log;

class Item extends Model
{
    public $timestamps = false;

    public static function get_items($id)
    {
        $item_data = self::where('post_id', $id)->get();
        $item_order = Post::where('id', $id)->value('item_order');
        $item_ids = explode(",", $item_order);
        $index = array();
        $items = array();
        foreach ($item_data as $key => $item) {
            $index[$item['id']] = $key;
        }
        foreach ($item_ids as $key => $i) {
            $items[] = $item_data[$index[$i]];
        }
        return $items;
    }
}
