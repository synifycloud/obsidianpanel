<?php

namespace Pterodactyl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    /** @use HasFactory<\Database\Factories\ProductOptionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',   // Links to the product
        'memory',       // Memory in MB
        'cpu_limit',    // CPU limit in percentage
        'allocation_limit', // Maximum number of allocations
        'database_limit',   // Maximum number of databases
        'backup_limit',     // Maximum number of backups
        'storage',      // Storage in MB
        'egg_id',       // Associated egg ID
        'price',        // Price in pence
    ];

    /**
     * Define a relationship to the parent product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
