<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartgory extends Model
{
    //

    // protected $primaryKey = “id”; //指定主鍵
        protected $table = "product"; //指定資料表名稱
       // public $timestamps = false; //若要取消時間戳記
       protected $fillable = [ //新增的欄位名稱
           'category_id',
           'category_name',
           'sort',
       ];

      
   }
