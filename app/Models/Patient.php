<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','phone','birth_date','gender'];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function records(){
        return $this->hasMany(Record::class);
    }
}
