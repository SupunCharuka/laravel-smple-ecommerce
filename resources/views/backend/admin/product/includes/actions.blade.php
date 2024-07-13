@can('product.update')
    <a class="btn btn-sm btn-primary" href="{{ route('admin.product.edit', ['product' => $product]) }}" title="Edit">
        <i class="fas fa-edit"> </i>
    </a>
@endcan
@can('product.delete')
    <a class="btn btn-sm delete-product btn-danger" data-product="{{ $product->id }}"
        id="product-{{ $product->id }}" href="javascript:void(0)" title="Delete">
        <i class="fas fa-trash"> </i>
    </a>
@endcan

