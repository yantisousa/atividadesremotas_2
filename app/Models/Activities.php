<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = ['teacher_id', 'discipline_id', 'name', 'filepath', 'description','status' ];

    public function teacherModel(){
        return $this->hasOne(Teachers::class, 'teacher_id');
    }
    public function disciplineModel(){
        return $this->hasOne(Disciplines::class, 'id', 'discipline_id');
    }
    public function activityresponseRelationship(){
        return $this->hasMany(activities_responses::class, 'activity_id',  'id');
    }
}
