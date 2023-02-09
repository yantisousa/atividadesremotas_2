<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class activities_responses extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['activity_id', 'student_id', 'check', 'filepath', 'description'];

    public function userResponse(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function activityRelationship(){
        return $this->belongsTo (Activities::class, 'activity_id', 'id');
    }
}
