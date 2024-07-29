<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrder extends Model
{
    use HasFactory;
    protected $table = 'online_orders';
    protected $fillable = [
        'user_id',
        'sales_id',
        'name',
        'email',
        'phone',
        'city',
        'country',
        'order_no',
        'address',
        'delivery_charges',
        'total',
        'payment_method_id',
        'payment_status',
        'order_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
}
