<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $table = 'car_brands';
    protected $fillable = [
        'id',
        'name'
    ];

    public $incrementing = false;
    protected $keyType = 'uuid';

    public function models()
    {
        return $this->hasMany(CarModel::class, 'brand_id');
    }
}
