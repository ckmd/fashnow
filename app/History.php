<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class History extends Model
{
  public function inventory()
  {
    return $this->belongsTo(Inventory::class);
  }
}
