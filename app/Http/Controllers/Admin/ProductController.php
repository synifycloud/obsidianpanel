<?php

namespace Pterodactyl\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\View\Factory as ViewFactory;
use Pterodactyl\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
    * DatabaseController constructor.
    */
    public function __construct(
        private ViewFactory $view,
    ) {
    }

    /**
     * Return the mount overview page.
     */
    public function index(): View
    {
        return $this->view->make('admin.products.index');
    }
}
