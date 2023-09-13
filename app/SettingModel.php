<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        "minimal_telat",
        'minimal_pulang',
        'potongan_telat'
    ];
}
