<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'biography_id',
    ];

    public function biography()
    {
        return $this->belongsTo(Biography::class);
    }
}
