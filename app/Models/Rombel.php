<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\RombelController;

class Rombel extends Model
{
    use HasFactory;
    protected $fillable = [
        'rombel'
    ];
}
