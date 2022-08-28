@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Products</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-primary" id="btn-add">
                    Add Product
                </button>
            </div>
        </div>
        <div class="row my-3">
            <table class="table table-hover table-striped">
                <thead>
                    <tr >
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody id="products-list">
                    @foreach ($products as $product)
                        <tr id="product{{ $product->id }}" >
                            <td>{{ $product->title }}</td>
                            <td><img width="50px" src="{{ $product->imageUrl }}" alt=""></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <button   id="add_btn" product_id={{ $product->id }}  class="btn btn-success fs-5 mx-2 add">+</button>
                                <button id="remove_btn" product_id={{ $product->id }} class="btn btn-danger mx-2 fs-5 remove">-</button>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Product</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">


                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" value="">
                                </div>
                                <div class="form-group">
                                    <label>Image Url</label>
                                    <input type="text" class="form-control" id="imageUrl" name="imageUrl"
                                        placeholder="Enter imageUrl" value="">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter price" value="">
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="Enter quantity" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="product_id" name="product_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@section('dashboard')
<script src="{{ asset('js/product.js') }}" defer></script>
@endsection
