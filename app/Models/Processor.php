<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'number_of_cores',
        'is_overclockable',
        'architecture',
        'frequency'
    ];

    // public function smartphones()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
