<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Product Model
 *
 * Represents a product in the system.
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'price',
        'units_sold'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'units_sold' => 'integer',
    ];

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the formatted price.
     *
     * @param  mixed  $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

    /**
     * Set the SKU attribute to uppercase.
     *
     * @param  string  $value
     */
    public function setSkuAttribute($value)
    {
        $this->attributes['sku'] = strtoupper($value);
    }
}
