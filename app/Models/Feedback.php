<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description'
    ];

    public function rating()
    {
        return $this->belongsTo('App\Models\Rating');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function center()
    {
        return $this->belongsTo('App\Models\Center');
    }


}
