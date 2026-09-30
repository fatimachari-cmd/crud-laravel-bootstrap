<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensenyament extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function alumnes()
    {
        return $this->hasMany(Alumne::class);
    }
}