<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    protected $fillable = [
        'id',
        'brand_id',
        'name',
        'date_start',
        'date_end',
        'class',
        'image_url'];

    public $incrementing = false;
    protected $keyType = 'uuid';

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function works()
    {
        return $this->belongsToMany(CarWork::class, 'car_model_work', 'car_model_id', 'car_work_id');
    }
}
