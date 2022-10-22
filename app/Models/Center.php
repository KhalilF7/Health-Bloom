<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Center;


class Center extends Model
{
    use HasFactory;
    protected $table = 'centers';
    protected $primaryKey = 'id';
    protected $fillable = ['name','description','address','email','phone'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
}
