@include('templates.header')

            <h3>Product Name: {{ $product->product_name }}</h3>
            <h3>Description: {{ $product->description }}</h3>
            <h3>Quantity: {{ $product->quantity }}</h3>
            <h3>Price: {{ $product->price }}</h3>
            <h3><image width="100px" height="100px"src="{{$product->imageUrl}}"></h3>

    <h2>Featured Products</h2>    

    <x-products :products="$products"/>
    @include('templates.footer')