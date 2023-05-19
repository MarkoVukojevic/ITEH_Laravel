<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model_name',
        'description',
        'color',
        'price',
        'battery',
        'manufacturer_id',
        'processor_id'
    ];


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    public function processor()
    {
        return $this->belongsTo(Processor::class);
    }



}
