<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    // protected $primaryKey = “id”; //指定主鍵
      protected $table = "product"; //指定資料表名稱
       // public $timestamps = false; //若要取消時間戳記
       protected $fillable = [ //新增的欄位名稱
          'product_id',
          'category_id',
          'product_name',
          'product_price',
          'img',
          'description',
       ];

      

}
