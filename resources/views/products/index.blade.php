@extends('template')

@section('title')
    Products - Live Search
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Product List</h1>
            <p class="lead">Laravel - Live Search</p>
            <hr class="my-4">
            <p>Simple live search with laravel</p>
            <p class="lead">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addNewProduct">
                    Add Procut
                </button>
            </p>
        </div>
        

        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewProduct"
            aria-hidden="true" id="addNewProduct">
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
                    <label class="sr-only" for="inlineFormInput">Product name</label>
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
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    @section('scripts')
        <script>
            function appendDataTable(data) {
                let htmlView = '';

                if (data.products == null) {
                    htmlView += `
                        <tr>
                            <td>Data not found</td>
                            <td>Data not found</td>
                            <td>Data not found</td>
                        </tr>`;
                    return $('tbody').html(htmlView);
                }

                for (let i = 0; i < data.products.length; i++) {
                    htmlView += `
                        <tr>
                            <td>`+ data.products[i].name + `</td>
                            <td>`+ data.products[i].category +`</td>
                            <td>`+ data.products[i].price +`</td>
                        </tr>`;
                }

                $('tbody').html(htmlView);
            }

            $('#productData').on('keyup', function() {
                let productData = $(this).val();
                $.post('{{ route("product.search") }}',
                    {
                        "_token": "{{ csrf_token() }}",
                        productData: productData
                    },
                    function (data) {
                        appendDataTable(data);
                    }
                );
            });
            
        </script>
    @endsection

@endsection
