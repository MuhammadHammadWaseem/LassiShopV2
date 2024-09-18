<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProductForUserSelect extends Model
{
    use HasFactory;

    protected $table = 'new_product_for_user_select';
    protected $fillable = ['product_id', 'new_product_id', 'created_at', 'updated_at'];

    public function newProduct()
    {
        return $this->belongsTo(NewProduct::class, 'new_product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
