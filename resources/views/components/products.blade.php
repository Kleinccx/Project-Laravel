
    <table border = "3">
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td><a href="/product_details/{{$product->id}}">{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td><image width="100px" height="100px"src="{{$product->imageUrl}}"></td>
        </tr>
        @endforeach

    </table>
    