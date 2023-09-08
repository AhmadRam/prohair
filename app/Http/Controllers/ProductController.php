<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * To extract the page content and load it in the respective view file
     *
     * @param  string  $url_path
     * @return \Illuminate\View\View
     */
    public function view($url_path)
    {
        $product = Product::where(['url_path' => $url_path])->first();

        return view('pages.product')->with('product', $product);
    }
}
