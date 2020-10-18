<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "product";
    public $fillable = ['name','price','images','quantity','status','description','id_unit','id_type'];
    public function Product_Type(){
        return $this->belongsTo('App\Product_type',"id_type","id");//Khi xuất ra giao diện chỉ chọn 1 nên ko dùng foreach
    }
    public function Unit(){
        return $this->belongsTo("App\Unit","id_unit","id");
    }
    public function Description_Images(){
        return $this->hasMany("App\Description_images","id_product","id");//khi dùng xuất ra giao diện vì là một nhiều nên phải dùng foreach
    }
    public function Discount_Info(){
        return $this->hasMany("App\Discount_info","id_product","id");
    }
    public function Rating(){
        return $this->hasMany("App\Rating","id_product","id");
    }
    public function Comments(){
        return $this->hasMany("App\Comments","id_product","id");
    }
    public function Bill_Detail(){
        return $this->hasMany("App\Bill_detail","id_product","id");
    }
}
