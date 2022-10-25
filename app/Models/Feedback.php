<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    //protected $primaryKey = 'feedback_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'status', 
        'rating',
        
    ];

    // public function categories()
    // {
    //     return $this->belongsTo('App\Models\CategoryFeedback');
    // }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function center()
    {
        return $this->belongsTo('App\Models\Center');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

}
