<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelWork extends Model
{
    protected $table = 'car_model_work';

    public $incrementing = false;
    protected $keyType = 'uuid';
}
