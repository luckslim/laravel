@if ($paginator->hasPages())
    <nav aria-label="Pagination Navigation" class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            {{-- Link para página anterior --}}
            @if ($paginator->onFirstPage())
                <span class="btn btn-outline-secondary disabled" aria-disabled="true">« Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary">« Previous</a>
            @endif

            {{-- Link para próxima página --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary ms-3">Next »</a>
            @else
                <span class="btn btn-outline-secondary disabled ms-3" aria-disabled="true">Next »</span>
            @endif
        </div>

        <div class="d-none d-sm-flex flex-fill justify-content-between align-items-center">
            <div>
                <p class="small text-muted mb-0">
                    Showing
                    <span class="fw-bold">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="fw-bold">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="fw-bold">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            <ul class="pagination mb-0">
                {{-- Link para página anterior --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">«</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">«</a>
                    </li>
                @endif

                {{-- Elementos da paginação --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Links de página --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Link para próxima página --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">»</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">»</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
