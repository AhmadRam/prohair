<div class="row" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li>
                            <!-- Previous Page Link -->
                            <a
                                href="{{ $paginate->onFirstPage() ? '#' : fullUrlWithQuery(['page' => $paginate->currentPage() - 1]) }}">{{ __('app.prev') }}</a>
                        </li>
                        @for ($i = 1; $i <= $paginate->lastPage(); $i++)
                            <li>
                                <!-- Page Link -->
                                <a class="{{ $i === $paginate->currentPage() ? 'active' : '' }}"
                                    href="{{ fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>

                            </li>
                        @endfor
                        <li>
                            <!-- Next Page Link -->
                            <a
                                href="{{ $paginate->hasMorePages() ? fullUrlWithQuery(['page' => $paginate->currentPage() + 1]) : '#' }}">{{ __('app.next') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    function fullUrlWithQuery($additionalQuery)
    {
        $url = url()->current();
        $queryParameters = request()->query();
    
        unset($queryParameters['page']);
    
        $additionalQueryString = http_build_query($additionalQuery);
    
        return !empty($queryParameters) ? $url . '?' . http_build_query($queryParameters) . '&' . $additionalQueryString : $url . '?' . $additionalQueryString;
    }
@endphp
