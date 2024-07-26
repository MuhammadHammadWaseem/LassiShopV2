<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrderDetails extends Model
{
    use HasFactory;
    protected $table = 'online_order_details';
    protected $fillable = [
        'online_order_id',
        'product_id',
        'price',
        'quantity'
    ];

    public function Orders()
    {
        return $this->belongsTo(OnlineOrder::class, 'online_order_id', 'id');
    }

    public function Products()
    {
        return $this->belongsTo(NewProduct::class, 'product_id', 'id');
    }

}
