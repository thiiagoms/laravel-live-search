<x-layout title="Live Search - Products">
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Product List</h1>
            <p class="lead">Laravel - Live Search</p>
            <hr class="my-4">
            <p>Live Search With Laravel</p>
            <p class="lead">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addNewProduct">
                    Add Product
                </button>
            </p>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewProduct" aria-hidden="true"
            id="addNewProduct">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('product.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName"
                                    placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice"
                                    placeholder="Product Price">
                            </div>
                            <div class="form-group">
                                <label for="productCategory">Product Category</label>
                                <select class="form-control" id="productCategory" name="productCategory">
                                    <option>Cleaning</option>
                                    <option>Food</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('product.search') }}">
            @csrf
            <div class="form-row">
                <div class="col-11">
                    <label class="sr-only" for="productData">Product Name</label>
                    <input type="text" class="form-control mb-2" id="productData" name="productData"
                        placeholder="Search by product name or category">
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <span class="d-flex">
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                    class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</x-layout>
