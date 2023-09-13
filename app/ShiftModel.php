<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftModel extends Model
{
    use HasFactory;
    protected $table = 'shifts';
    protected $fillable = [
        "name",
        'jam_masuk',
        'jam_pulang',
        'id_cabang',
    ];
}
