<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManage extends Model
{
    protected $fillable = [
        'stock_name',
        'price',
        'quantity',
    ];
}