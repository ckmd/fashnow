<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function histories()
    {
      return $this->hasMany(History::class);
    }

    public function popularPoint()
    {
      return count($this->histories);
    }
}
