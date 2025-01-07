<?php

namespace Pterodactyl\Http\Controllers\Api\Client\Billing;

use Pterodactyl\Http\Requests\Api\Client\ClientApiRequest;
use Pterodactyl\Http\Controllers\Api\Client\ClientApiController;
use Pterodactyl\Models\Product;

class ProductsController extends ClientApiController
{
    /**
     * Returns a paginated set of the user's activity logs.
     */
    public function index()
    {
        $products = Product::query()
            ->when(request('filter.*'), function ($query) {
                $query->where('name', 'like', '%' . request('filter.*') . '%');
            })
            ->paginate(10);
        return $products;
    }
}
