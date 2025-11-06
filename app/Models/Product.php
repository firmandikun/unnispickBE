<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','name','slug','description','price','thumbnail_url'];
    public function brand(){ return $this->belongsTo(Brand::class); }
    public function detail(){ return $this->hasOne(ProductDetail::class); }
}
