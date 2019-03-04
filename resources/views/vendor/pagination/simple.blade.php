@if ($paginator->hasPages())
    <div class="row">
        <div class="col-sm-12">
            <nav class="pagination-a">
                <ul class="pagination justify-content-end">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <a class="page-link" href="#" tabindex="-1">
                                <span class="ion-ios-arrow-back"></span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                <span class="ion-ios-arrow-back"></span>
                            </a>
                        </li>
                    @endif
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
                        @endif
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item next">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" aria-disabled="true" rel="next" aria-label="@lang('pagination.next')">
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif