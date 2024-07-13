@if ($products->hasMorePages())
    <button id="load-more" class="btn btn-primary" data-next-page="{{ $products->currentPage() + 1 }}">Load More</button>
@endif
