<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    // protected $table = 'activities';
    protected $fillable = ['teacher_id', 'discipline_id', 'name', 'filepath', 'description','status' ];

    public function teacherModel(){
        return $this->hasOne(Teachers::class, 'teacher_id');
    }
    public function disciplineModel(){
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'id');
    }
    public function activity(){
        return $this->hasMany(activities_responses::class);
    }
}
