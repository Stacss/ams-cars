<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarWork extends Model
{
    use HasFactory;

    protected $table = 'car_works';
    protected $fillable = [
        'id',
        'name',
        'price',
        'time'
    ];

    public $incrementing = false;
    protected $keyType = 'uuid';

    public function models()
    {
        return $this->belongsToMany(CarModel::class, 'car_model_work', 'car_work_id', 'car_model_id');
    }
}
