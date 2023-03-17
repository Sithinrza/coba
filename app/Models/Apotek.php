<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



// Model berfungsi untuk query ke db, insert baru, update/hapus dr db
class Apotek extends Model
{
    use HasFactory;
    protected $guarded = ['idProduk'];
}
