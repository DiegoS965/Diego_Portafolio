<?php

namespace App\Models;

use App\Models\File;
use App\Models\Like;
use App\Models\User;
use App\Models\Image;
use App\Models\Ability;
use App\Models\Dislike;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'biography_title',
        'description',
        'phone_number',
        'email',
        'birthdate',
        'university',
        'city',
        'country',
        'linkedin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function disLikes()
    {
        return $this->hasMany(Dislike::class);
    }
}
