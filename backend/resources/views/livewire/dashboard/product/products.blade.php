
<div class="card-body">
    @include('livewire.dashboard.product.create')
    @include('livewire.dashboard.product.edit')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Added By</th>
            <th>Control</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    {{$product->name}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->description}}
                </td>
                <td>
                    <img src="{{$product->image}}" alt="product_img" style="width: 50px;height: auto">
                </td>
                <td>
                    {{optional($product->admin)->name}}
                </td>

                <td>
                    <button wire:model="productId" wire:click="resetData({{$product->id}})" type="button"
                            class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#editProductModal"
                            data-whatever="@getbootstrap">
                        edit
                    </button>
                    <button wire:click="delete({{$product->id}})" type="submit"
                            class="btn btn-danger btn-sm">
                        delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button  wire:click="removeData()" type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3"
            data-toggle="modal" data-target="#addProductModal">
        Add
    </button>
</div>
@section('script')
    <script>
        window.addEventListener('addProduct', event => {
            $('#addProductModal').modal('hide');
        });
        window.addEventListener('editProduct', event => {
            $('#editProductModal').modal('hide');
        })
    </script>
@endsection
