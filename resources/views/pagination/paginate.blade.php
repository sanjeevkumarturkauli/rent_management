<div class="d-flex justify-content-between align-items-center mx-3 mb-2">
    <!-- Results Summary -->
    <div>
        <p class="mb-0">
            Showing
            <strong>{{ $paginator->firstItem() }}</strong>
            to
            <strong>{{ $paginator->lastItem() }}</strong>
            of
            <strong>{{ $paginator->total() }}</strong> results
        </p>
    </div>

    <!-- Pagination Controls -->
    <nav aria-label="Page navigation">
        @if ($paginator->hasPages())
            <ul class="pagination mb-0">
                <!-- First Page -->
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link p-2" href="javascript:void(0);" wire:click="gotoPage(1)">
                        <i class="ti ti-chevrons-left ti-xs"></i>
                    </a>
                </li>

                <!-- Previous Page -->
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link p-2" href="javascript:void(0);" wire:click="previousPage">
                        <i class="ti ti-chevron-left ti-xs"></i>
                    </a>
                </li>

                <!-- Pagination Links -->
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item {{ $paginator->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="javascript:void(0);" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Page -->
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link p-2" href="javascript:void(0);" wire:click="nextPage">
                        <i class="ti ti-chevron-right ti-xs"></i>
                    </a>
                </li>

                <!-- Last Page -->
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link p-2" href="javascript:void(0);" wire:click="gotoPage({{ $paginator->lastPage() }})">
                        <i class="ti ti-chevrons-right ti-xs"></i>
                    </a>
                </li>
            </ul>
        @endif
    </nav>
</div>
