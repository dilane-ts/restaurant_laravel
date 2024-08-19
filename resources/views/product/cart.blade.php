@extends('base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/" class="text-decoration-none fs-6">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}" class="text-decoration-none fs-6">Foods</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <caption>List of products</caption>
                    <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($cart as $item)
                            <tr class="align-middle">
                                <td>{{ $item->product_id }}</td>
                                <td class="text-capitalize">{{ $item->product->name }}</td>
                                <td>
                                    <img src="/{{ $item->product->image }}" alt="" class="rounded-3" width="64px" height="64px">
                                </td>
                                <td class="border rounded-5 d-flex align-items-center">
                                    <i onclick="decrementQuantity()" class="bi bi-dash px-2"></i>
                                    <input
                                        type="number"
                                        id="quantity" name="quantity"
                                        class="form-control px-0 border-top-0 border-bottom-0 rounded-0 text-center"
                                        style="width: 3rem"
                                        value="{{ $item->quantity }}"
                                    >
                                    <i onclick="incrementQuantity()" class="bi bi-plus px-2"></i></td>
                                <td class="fw-bold">${{ $item->product->price }}</td>
                                <td class="fw-bold text-primary">${{ $item->quantity * $item->product->price }}</td>
                                <td>
                                    <form action="{{ route('product.cart.destroy', $item->product->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="align-middle">
                            <td colspan="5" class="fs-4">Total</td>
                            <td class="align-middle fs-4 text-primary fw-bold">${{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 ps-5">
                <h3 class="text-center font-kalam text-decoration-underline">Shipping Detail</h3>
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="first-name">First Name</label>
                            <input type="text" name="firstname" id="first-name" class="form-control" value="John" placeholder="John">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="lastname" id="last-name" class="form-control" value="Doe" placeholder="Doe">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="john@doe.com" placeholder="example@example.com">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="shipping-address">Shipping adress</label>
                            <input type="text" name="shipping_address" id="shipping-address" class="form-control" value="Yoyo Bar" placeholder="Cite verte, Yoyo Bar">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" {{ $total !== 0 ?: 'disabled'  }}><i class="bi bi-check fs-5"></i> Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const quantityElement = document.getElementById('quantity')

        function incrementQuantity(max) {
            quantityElement.value = parseInt(quantityElement.value) + 1
        }

        function decrementQuantity() {
            quantityElement.value = parseInt(quantityElement.value) - 1
            if(quantityElement.value <= 0)
                quantityElement.value = 1
        }


    </script>
@endsection
