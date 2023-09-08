<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::where(['status' => 'ACTIVE'])->orderby('sort_order', 'ASC')->get();

        $products = Product::where(['status' => 'ACTIVE'])->get();

        $count = $products->count() < 6 ? $products->count() : 6;
        $products = $products->random($count);

        $news = News::orderby('id', 'ASC')->limit(3)->get();

        return view('pages.index', compact('sliders', 'products', 'news'));
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        $search_query = request()->search;
        $products = Product::where(['status' => 'ACTIVE'])->where('name_en', 'like', "%$search_query%")->orWhere('name_ar', 'like', "%$search_query%")->paginate(6);

        return view('pages.search', compact('products'));
    }
}
