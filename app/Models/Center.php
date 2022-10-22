<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Center;
use App\Models\User;


class Center extends Model
{
    use HasFactory;
    protected $table = 'centers';
    protected $primaryKey = 'id';
    protected $fillable = ['name','description','address','email','phone'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
     public function categorycenter()
    {
        return $this->belongsTo(Categorycenter::class);
    }

  
}
