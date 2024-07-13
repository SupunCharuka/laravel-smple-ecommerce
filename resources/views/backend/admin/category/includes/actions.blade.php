@can('category.update')
    <a class="btn btn-sm btn-primary" href="{{ route('admin.category.edit', ['category' => $category]) }}" title="Edit">
        <i class="fas fa-edit"> </i>
    </a>
@endcan
@can('category.delete')
    <a class="btn btn-sm delete-category btn-danger" data-category="{{ $category->id }}"
        id="category-{{ $category->id }}" href="javascript:void(0)" title="Delete">
        <i class="fas fa-trash"> </i>
    </a>
@endcan

