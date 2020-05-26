<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    // protected $primaryKey = “id”; //指定主鍵
      protected $table = "order"; //指定資料表名稱
      public $timestamps = false; //若要取消時間戳記
      protected $fillable = [ //新增的欄位名稱
          'date',
          'total',
          'deliveryfee',
          'custom_id',
          'custom_name',
          'custom_email',
          'custom_phone',
          'custom_addr',
          'paytype',

       ];
}
