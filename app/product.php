<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
   public function attributes(){
   	return $this->hasMany('App\ProdutAttribute','product_id');
   }
}
