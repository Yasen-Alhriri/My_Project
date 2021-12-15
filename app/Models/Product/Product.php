<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\Product\CategoryProduct;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;


    protected $table = 'products';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'size',
        'unit',
        'count_visits',
        'discount',
        'discount_date',
        'status',
        'deleted_at',
        'product_date',
        'category',
        'id_user'
    ];

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category');
    }

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageProduct()
    {
        return $this->hasMany(ImageProduct::class);
    }
    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rateProduct()
    {
        return $this->hasMany(RateProduct::class);
    }
}
