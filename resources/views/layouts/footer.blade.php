<!-- footer -->
<div class="footer-area" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                </div>
            </div> --}}
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages {{ app()->getLocale() }}">
                    <h2 class="widget-title {{ app()->getLocale() }}">{{ __('app.footer.info') }}</h2>
                    <ul>
                        @foreach (App\Models\Page::where('status', 'ACTIVE')->skip(0)->take(5)->get() as $page)
                            <li><a href="{{ route('shop.page', $page->url_path) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <ul>
                    @foreach (App\Models\Page::where('status', 'ACTIVE')->skip(5)->take(10)->get() as $page)
                        <li><a href="{{ route('shop.page', $page->url_path) }}">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages {{ app()->getLocale() }}">
                    <h2 class="widget-title {{ app()->getLocale() }}">{{ __('app.footer.contact') }}</h2>
                    <ul>
                        <li>{{ setting('site.address') }}</li>
                        <li><a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></li>
                        <li><a href="tel:{{ setting('site.phone') }}">{{ setting('site.phone') }}</a></li>
                    </ul>

                </div>
                <div class="social-icons" style="text-align: center">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- end footer -->
