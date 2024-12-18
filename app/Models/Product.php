<?php

namespace Pterodactyl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',         // Unique identifier
        'name',       // Name of the product
        'description', // Description of the product
        'nest_id',    // Associated nest ID
    ];

    /**
     * Define a relationship for configurable options.
     */
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
}
