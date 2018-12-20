<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['name', 'email'];

    public function votes()
    {
        return $this->hasMany('App\Votes');
    }
}
