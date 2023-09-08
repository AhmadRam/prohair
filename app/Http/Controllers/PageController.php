<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
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
        $page = Page::where(['url_path' => $url_path])->first();

        return view('pages.page')->with('page', $page);
    }
}
