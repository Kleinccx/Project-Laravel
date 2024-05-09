@include('templates.header')

<x-navbar />
<h2>ADD PRODUCT</h2>


<div class="ms-5">
    @if($errors->any())
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    @endif
</div>

<form action="/add-product" method="post" class="col-md-5">
@csrf
<div class="mb-3">
    
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name = "name"placeholder="name@example.com">
  
    </div>
    <div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="text" class="form-control" id="price" name= "price"placeholder="name@example.com">
    </div>
    <div class="mb-3">
  <label for="quantity" class="form-label">Product Quantity</label>
  <input type="text" class="form-control" id="quantity" name= "quantity"placeholder="name@example.com">
    </div>
    <div class="mb-3">
  <label for="quantity" class="form-label">Product Description</label>
  <input type="text" class="form-control" id="description" name= "description" placeholder="name@example.com">
  <button type="submit" class ="btn btn-success btn-sm">Submit</button>
    </div>
</form>


@include('templates.footer')
