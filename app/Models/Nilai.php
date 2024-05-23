<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = "nilai";
    protected $primaryKey = "nilai_id";


    protected $guarded =[
        'nilai_id'
    ];

    public function santri(){
        return $this->belongsTo(Santri::class, 'santri_id', 'nilai_id');
    }
}
