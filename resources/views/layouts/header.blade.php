<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo" style="float:{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
                        <a href="{{ route('shop.index') }}">
                            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
                        <ul>
                            <li><a style="text-align: start"
                                    href="{{ route('shop.index') }}">{{ __('app.header.home') }}</a></li>
                            <li><a style="text-align: start"
                                    href="{{ route('shop.products') }}">{{ __('app.header.products') }}</a></li>
                            {{-- <li><a style="text-align: start" href="#">{{ __('app.header.categories') }}</a>
                                <ul class="sub-menu" style="right:{{ app()->getLocale() == 'ar' ? '10px' : '' }};">
                                    @foreach (App\Models\Category::all() as $category)
                                        <li style="text-align:{{ app()->getLocale() == 'ar' ? 'right' : '' }};"><a
                                                style="text-align: start"
                                                href="{{ route('shop.category', $category->url_path) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> --}}
                            {{-- <li><a style="text-align: start"
                                    href="{{ route('shop.news') }}">{{ __('app.header.news') }}</a></li> --}}
                            <li><a style="text-align: start"
                                    href="{{ route('shop.blogs') }}">{{ __('app.header.blogs') }}</a></li>
                            <li><a style="text-align: start"
                                    href="{{ route('shop.page', 'about-us') }}">{{ __('app.header.about-us') }}</a>
                            </li>
                            <li id="lang-nav"><a style="text-align: start"
                                    href="#">{{ app()->getLocale() == 'en' ? __('app.header.english') : __('app.header.arabic') }}</a>
                                <ul class="sub-menu" style="max-width:140px">
                                    <li style="text-align:{{ app()->getLocale() == 'ar' ? 'right' : '' }};"><a
                                            style="text-align: start"
                                            href="{{ request()->url() }}?locale=en">{{ __('app.header.english') }}</a>
                                    </li>
                                    <li style="text-align:{{ app()->getLocale() == 'ar' ? 'right' : '' }};"> <a
                                            style="text-align: start"
                                            href="{{ request()->url() }}?locale=ar">{{ __('app.header.arabic') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li style="float:{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}">
                                <div class="header-icons">
                                    {{-- <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a> --}}
                                    <a class="mobile-hide search-bar-icon" href="#"><i
                                            class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>{{ __('app.header.search-for') }}:</h3>
                        <form method="GET" action="{{ route('shop.search') }}">
                            <input type="text" placeholder="" name="search">
                            <button type="submit">{{ __('app.header.search') }} <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->

@section('scripts')
    <script>
        window.onload = function() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                var elements = document.querySelectorAll('a.mean-expand');

                if (document.documentElement.getAttribute("lang") === 'ar') {
                    elements.forEach(function(element) {
                        element.style.right = '90%';
                    });
                }

            } else {
                var langEle = document.getElementById('lang-nav');
                if (document.documentElement.getAttribute("lang") === 'ar') {
                    langEle.style.setProperty('inset-inline-start', '185px');
                } else {
                    langEle.style.setProperty('inset-inline-start', '215px');
                }
            }
        }
    </script>
@stop
