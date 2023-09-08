<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
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
        $category = Category::where(['url_path' => $url_path])->first();

        $products = $category->products()->where('status', 'ACTIVE')->paginate(6);

        return view('pages.category', compact('products', 'category'));
    }
}
