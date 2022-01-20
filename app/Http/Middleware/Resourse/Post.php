<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Model\Item;

class Post extends JsonResource
{
  public function toArray($request){
    return [
      'id' => $this->id,
      'title' => $this->title,
      'body' => $this->body,
      'item_order' => $this->item_order,
      'items' => Item::get_items($this->id),
    ];
  }
}
