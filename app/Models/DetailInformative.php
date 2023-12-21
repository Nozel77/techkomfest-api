<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInformative extends Model
{
    use HasFactory;

    protected $table = 'detail_informatives';
    protected $fillable = ['province', 'history', 'geography', 'demographics', 'artculture', 'detail_description'];
}
