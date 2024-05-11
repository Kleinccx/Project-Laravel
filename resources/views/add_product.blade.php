@include('templates.header')

<x-navbar />

<h2>ADD PRODUCT</h2>

<div class="ms-5">
@if($errors->any())
    <ul>
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </ul>
@endif

</div>

<form action="/add-product" method="post" class="col-md-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="product_name" placeholder="Product Name">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Product Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Product Description">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="image" name="imageUrl">
    </div>
    <button type="submit" class="btn btn-success btn-sm">Submit</button>
</form>
@include('templates.footer')

@if(isset($product))
    <h3>Product Name: {{ $product->product_name }}</h3>
    <h3>Description: {{ $product->description }}</h3>
    <h3>Quantity: {{ $product->quantity }}</h3>
    <h3>Price: {{ $product->price }}</h3>
@endif