<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    //
    // protected $primaryKey = “id”; //指定主鍵
      protected $table = "cart"; //指定資料表名稱
      public $timestamps = false; //若要取消時間戳記
      protected $fillable = [ //新增的欄位名稱
          'cart_id',
          'user_id',
          'product_id',
          'quantity',

       ];

       public function user()
       {
           return $this->belongsTo(User::class);
       }




}
