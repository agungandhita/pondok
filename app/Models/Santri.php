<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = "santris";
    protected $primaryKey = "santri_id";


    protected $guarded =[
        'santri_id'
    ];

    public function wali()
    {
        return $this->belongsTo(User::class,'user_id', 'user_id');
    }

    public function kelas(){

        return $this->belongsTo(Kelas::class,'kelas_id','kelas_id');
    }
}
