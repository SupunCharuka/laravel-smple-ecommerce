<div>
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Product</h3>
        </div>

        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select wire:model.lazy="category_id" class="form-control" id="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input wire:model.lazy="title" type="text" class="form-control" id="title"
                        placeholder="Enter title">
                    @error('title')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <div wire:ignore>
                        <textarea wire:model.defer="description" class="form-control" id="summernote" placeholder="Enter description"></textarea>
                    </div>
                    @error('description')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input wire:model.lazy="price" type="number" step="0.01" class="form-control" id="price"
                        placeholder="Enter price">
                    @error('price')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input wire:model.lazy="quantity" type="number" class="form-control" id="quantity"
                        placeholder="Enter quantity">
                    @error('quantity')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input wire:model="image" type="file" class="form-control" id="image">
                    @if ($existingImageUrl)
                    <div>
                        <img src="{{ $existingImageUrl }}" alt="Current Image"
                            style="max-width: 100px; margin-bottom: 10px;">
                    </div>
                @endif
                    @error('image')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });
        });
    </script>
</div>
