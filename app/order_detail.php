<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
  // protected $primaryKey = “id”; //指定主鍵
    protected $table = "order_detail"; //指定資料表名稱
    public $timestamps = false; //若要取消時間戳記
    protected $fillable = [ //新增的欄位名稱
        'order_id',
        'product_id',
        'custom_name',
        'unitproce',
        'quantity',
        'total',

     ];
}
