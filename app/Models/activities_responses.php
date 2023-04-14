<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class activities_responses extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['activities_id', 'user_id', 'check',  'note',  'filepath', 'description'];
    protected $casts = [
        'check' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function activityModel(){
        return $this->belongsTo(Activities::class, 'activities_id', 'id');
    }
}
