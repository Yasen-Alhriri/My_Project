<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateProduct extends Model
{
    use HasFactory;



    protected $table = 'rate';

    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_product',
        'rating',
        'comment'
    ];

    /**
     * Get all of the comments for the CategoryCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
