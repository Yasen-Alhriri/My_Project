<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    use HasFactory;



    protected $table = 'category_course';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'image'
    ];

    /**
     * Get all of the comments for the CategoryCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
