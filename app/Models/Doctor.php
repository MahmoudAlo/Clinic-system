<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['user_id','specialty','experience_years'];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function records(){
        return $this->hasMany(Record::class);
    }
}
