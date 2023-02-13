<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class activities_responses extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['activity_id', 'user_id', 'check',  'note',  'filepath', 'description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function activity(){
        return $this->belongsTo(Activities::class);
    }
}
