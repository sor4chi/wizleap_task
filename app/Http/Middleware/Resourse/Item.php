<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Model\Post;

class Item extends JsonResource
{
  public function toArray($id)
  {
    return [
      'id' => $this->id,
      'comment' => $this->comment,
      'post_id' => $this->post_id,
    ];
  }
}

