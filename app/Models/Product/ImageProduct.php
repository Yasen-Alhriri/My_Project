<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    protected $table = 'images';

    public $timestamps = false;
    protected $fillable = [
        'id_product',
        'image'
    ];

    /**
     * Get all of the comments for the images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
