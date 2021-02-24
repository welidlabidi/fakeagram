<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ?  $this->image : '/uploads/KAlHAflUKk2vFfr9B8oU1RrYa6clPEbc5xshaQ1c.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}