<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $primaryKey = "kelas_id";


    protected $guarded =[
        'kelas_id'
    ];

    public function santri()
    {
        return $this->hasMany(Santri::class,'santri_id', 'santri_id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    

}
