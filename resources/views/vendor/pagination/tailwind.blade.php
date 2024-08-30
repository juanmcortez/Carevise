@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="table-pagination">
        <div class="buttons">
            @if ($paginator->onFirstPage())
                <span class="arrow-prev">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="arrow-prev-link">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="arrow-next-link">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="arrow-next">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="details">
            <p class="count">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>

            <div>
                <span class="previous">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="arrow-prev" aria-hidden="true">
                                <box-icon name='chevron-left'></box-icon>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="arrow-prev-link"
                            aria-label="{{ __('pagination.previous') }}">
                            <box-icon name='chevron-left'></box-icon>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="page">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="page">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="element"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="arrow-next-link"
                            aria-label="{{ __('pagination.next') }}">
                            <box-icon name='chevron-right'></box-icon>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="arrow-next" aria-hidden="true">
                                <box-icon name='chevron-right'></box-icon>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
