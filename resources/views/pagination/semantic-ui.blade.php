@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm">

    {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item first">
                <a class="page-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"
                ><i class="tf-icon bx bx-chevrons-left"></i
                ></a>
            </li>
            {{-- <a class="icon item disabled pagination-button" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a> --}}
        @else
            <li class="page-item first">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                ><i class="tf-icon bx bx-chevrons-left"></i
                ></a>
            </li>
            {{-- <a class="icon item " href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i> </a> --}}
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <a class="page-link"  aria-disabled="true">{{ $element }}</a>
                </li>
                {{-- <a class="icon item disabled " aria-disabled="true">{{ $element }}</a> --}}
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                        </li>
                        {{-- <a class="item active pagination-button" href="{{ $url }}" aria-current="page">{{ $page }}</a> --}}
                    @else
                        <li class="page-item">
                            <a class="page-link"  href="{{ $url }}">{{ $page }}</a>
                        </li>
                        {{-- <a class="item pagination-button" href="{{ $url }}">{{ $page }}</a> --}}
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item next">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
              ><i class="tf-icon bx bx-chevron-right"></i
            ></a>
          </li>
            {{-- <a class="icon item " href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a> --}}
        @else
            <li class="page-item last">
                <a class="page-link" aria-disabled="true" aria-label="@lang('pagination.next')"
                ><i class="tf-icon bx bx-chevrons-right"></i
                ></a>
            </li>
            {{-- <a class="icon item disabled " aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a> --}}
        @endif
        </ul>
    </nav>
@endif
{{-- <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item first">
        <a class="page-link" href="javascript:void(0);"
          ><i class="tf-icon bx bx-chevrons-left"></i
        ></a>
      </li>
      <li class="page-item prev">
        <a class="page-link" href="javascript:void(0);"
          ><i class="tf-icon bx bx-chevron-left"></i
        ></a>
      </li>
      <li class="page-item">
        <a class="page-link" href="javascript:void(0);">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="javascript:void(0);">2</a>
      </li>
      <li class="page-item active">
        <a class="page-link" href="javascript:void(0);">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="javascript:void(0);">4</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="javascript:void(0);">5</a>
      </li>
      <li class="page-item next">
        <a class="page-link" href="javascript:void(0);"
          ><i class="tf-icon bx bx-chevron-right"></i
        ></a>
      </li>
      <li class="page-item last">
        <a class="page-link" href="javascript:void(0);"
          ><i class="tf-icon bx bx-chevrons-right"></i
        ></a>
      </li>
    </ul>
</nav> --}}
