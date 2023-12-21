<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informative extends Model
{
    use HasFactory;

    protected $table = 'informative';
    protected $fillable = ['province','description','image','link'];
}
