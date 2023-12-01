<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar' , 'name_en' , 'description_ar' , 'description_en' , 'price' , 'store_id' , 'has_vat'];


    public function store()
    {
        return $this->belongsTo(Shop::class , 'store_id');
    }
}
