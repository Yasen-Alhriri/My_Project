<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportVideo extends Model
{
    use HasFactory;



    protected $table = 'reports';

    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_video',
        'message'

    ];

    /**
     * Get all of the comments for the CategoryCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Video()
    {
        return $this->belongsTo(Video::class, 'id_video');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
