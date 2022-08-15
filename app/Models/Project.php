<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'description',
        'rep_link',
        'completed_at',
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    
}
