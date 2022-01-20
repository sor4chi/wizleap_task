<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Post;
use App\Model\Item;
use Log;

use App\Http\Resources\Post as PostResource;
use App\Http\Resources\Item as ItemResource;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function items(Request $request)
    {
        $post_id = $request->input('post_id');
        return PostResource::collection(Post::where('id', $post_id)->get());
    }

    public function store_item(Request $request)
    {
        $post_id = $request->input('post_id');
        $item_comment = $request->input('comment');
        $item = new Item;
        $item->post_id = $post_id;
        $item->comment = $item_comment;
        $item->save();
        $post = Post::find($post_id);
        $item_order = $post->item_order;
        $item_order_arr = explode(",", $item_order);
        $item_order_arr[] = $item->id;
        $item_order = implode(",", $item_order_arr);
        $post->item_order = $item_order;
        $post->save();
        return new ItemResource($item);
    }

    public function edit_item(Request $request)
    {
        $item_id = $request->input('item_id');
        $item = Item::find($item_id);
        $item->comment = $request->input('comment');
        $item->save();
        return new ItemResource($item);
    }

    public function update_item_order(Request $request)
    {
        $post_id = $request->input('post_id');
        $item_order = $request->input('item_order');
        $post = Post::find($post_id);
        $post->item_order = $item_order;
        $post->save();
        return new PostResource($post);
    }

    public function delete_item(Request $request)
    {
        $post_id = $request->input('post_id');
        $item_id = $request->input('item_id');
        $item_order = $request->input('item_order');

        Post::where([
            'id' => $post_id
        ])
            ->update([
                'item_order' => $item_order
            ]);

        Item::where([
            'id' => $item_id,
        ])
            ->delete();
    }
}
