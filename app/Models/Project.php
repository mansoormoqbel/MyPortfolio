<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    
    protected $fillable = ['description','category','live_url','thumbnail','is_published'];


     /* public function images(){
        return $this->hasMany(ProjectImage::class);
    } */

}
