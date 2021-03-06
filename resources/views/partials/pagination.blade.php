@if ($paginator->lastPage() > 1)
<div class="product__pagination">
    <a class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $paginator->url(1) }}"><i class="fa fa-long-arrow-left"></i></a>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <a class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
    @endfor
    <a class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="fa fa-long-arrow-right"></i></a>
</div>
@endif