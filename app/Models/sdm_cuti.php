<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sdm_cuti extends Model
{
    use HasFactory;
    protected $table = 'sdm_cuti';
    protected $guarded =[];
    protected $casts = [
        'approval' => 'integer', // Cast kolom 'approval' sebagai integer
    ];

    public function user()
    {
        return $this->belongsTo(users::class, 'user_created', 'email');
        return $this->belongsTo(users::class, 'nik', 'nik');
    }
}
