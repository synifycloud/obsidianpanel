<?php

namespace Pterodactyl\Http\Controllers\Api\Client\Billing;

use Pterodactyl\Http\Requests\Api\Client\ClientApiRequest;
use Pterodactyl\Http\Controllers\Api\Client\ClientApiController;

class ProductsController extends ClientApiController
{
    /**
     * Returns a paginated set of the user's activity logs.
     */
    public function index(ClientApiRequest $request): array
    {
        return 
    [
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ['id' => 3, 'name' => 'Product 3', 'price' => 300],
    ];
    }
}
