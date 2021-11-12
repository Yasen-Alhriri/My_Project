<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    public $timestamps = false;
    protected $fillable = [
        'email ',
        'password',
        'email_validate',
        'f_name',
        'l_name',
        'description',
        'image',
        'date',
        'gender',
        'phone ',
        'location',
        'status',
        'create_date'
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
/**
 * Get all of the ReportVideo for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function reportVideo()
{
    return $this->hasMany(ReportVideo::class );
}
/**
 * Get all of the comments for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function rateProduct()
{
    return $this->hasMany(RateProduct::class);
}

}//End Class
