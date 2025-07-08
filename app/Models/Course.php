<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'price', 'category'];
    use HasFactory;

  // app/Models/Course.php

public function users()
{
    return $this->belongsToMany(User::class, 'course_user');
}

}
