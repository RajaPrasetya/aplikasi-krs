<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';
    protected $primaryKey = 'kode_mk';
    protected $fillable = ['kode_mk', 'nama_mk', 'semester', 'sks'];
}
