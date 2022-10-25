<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'complaint';
    protected $primaryKey = 'id';
    protected $fillable = ['description','title','status','classification','user_id'];
    protected $dates = ['deleted_at'];


     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
/**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

}
