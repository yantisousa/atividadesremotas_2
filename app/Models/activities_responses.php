<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities_responses extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['activity_id', 'student_id', 'check', 'filepath', 'description'];
}
