<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'alamat', 'user_input', 'user_update'];
}
