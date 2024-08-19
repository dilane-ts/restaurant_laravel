@extends('base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/" class="text-decoration-none fs-6">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}" class="text-decoration-none fs-6">Foods</a></li>
    <li class="breadcrumb-item active" aria-current="page">Food Detail</li>
@endsection

@section('content')
    <div class="mt-5 margin-5">
        <div class="row mb-5">
            <div class="col-lg-6 mb-3">
                <img class="w-100 h-100 object-fit-cover rounded-4" style="max-height: 30rem"
                     src="/{{ $product->image }}" alt="{{ $product->name }}">
            </div>
            <div class="col-lg-6 d-flex flex-column gap-2 px-5 mb-3">
                <h1 class="fw-bold font-kalam text-capitalize fst-italic"
                    style="font-size: 4rem">{{ $product->name }}</h1>
                <div class="d-flex gap-2 align-items-center">
                    @for($i = 0; $i < 5; $i++)
                        <i class="bi bi-star-fill text-warning fs-4"></i>
                    @endfor
                    <span class="text-muted"> (123 reviews)</span>
                </div>
                <p class="text-muted fs-6">{{ substr($product->description, 0, 500) }}...</p>
                <div class="d-flex gap-3">
                    <h4 class="text-primary fw-bold">${{ $product->price }}</h4>
                    <h4 class="text-secondary text-decoration-line-through">${{ $product->price + 5 }} </h4>
                </div>
                <form action="{{ route('product.cart', $product->id) }}" method="post" class="d-flex w-100 align-self-start align-items-center gap-3">
                    @csrf
                    <div class="border rounded-5 d-flex align-items-center">
                        <i onclick="decrementQuantity()" class="bi bi-dash px-2"></i>
                        <input
                            type="number"
                            id="quantity" name="quantity"
                            class="form-control px-0 border-top-0 border-bottom-0 rounded-0 text-center"
                            style="width: 3rem"
                            value="1"
                        >
                        <i onclick="incrementQuantity()" class="bi bi-plus px-2"></i>
                    </div>
                    <button type="submit" class="btn btn-outline-primary px-5 border border-2 rounded-5"><i
                            class="bi bi-cart4"></i> Add to cart
                    </button>
                    <div class="rounded-circle border text-muted d-flex align-items-center justify-content-center"
                         style="width: 34px; height: 34px"><i class="bi bi-heart text-muted"></i></div>
                </form>
                <div class="lh-1 mt-3">
                    <p class="text-uppercase"><span class="fw-bold">SKU : </span> PR{{ $product->id  }}</p>
                    <p class="text-capitalize"><span class="fw-bold">CATEGORY : </span> {{ $product->category->name  }}</p>
                    <p class="text-capitalize"><span class="fw-bold">TAG : </span> {{ $product->tags === [] ? : ''  }}</p>
                </div>
            </div>
        </div>

        <div class="my-5">
            <h4 class="text-primary text-center  pb-2 border-2 border-bottom fw-bold">Description</h4>
            <div class="margin-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam, commodi debitis deserunt dolorem eligendi id illo minima non odit quisquam reiciendis tempora, voluptates! Cum itaque laborum nemo nostrum, repudiandae sequi suscipit unde veniam. Architecto autem beatae consequatur doloribus ducimus ex fugit labore laborum, modi neque non numquam omnis possimus quas reiciendis! Ab adipisci aliquam asperiores dolores dolorum eaque est excepturi explicabo impedit minima modi numquam obcaecati perferendis, placeat, possimus quasi repellat unde. Assumenda beatae consequuntur ducimus neque porro similique!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum error maiores natus nesciunt nisi sequi. Aliquam atque consequatur facere, iusto molestias quod. Aliquam earum eius laboriosam maxime obcaecati unde ut? Eius impedit similique veritatis? Aperiam blanditiis dolorem iure iusto libero maiores necessitatibus quia sapiente! Adipisci alias aliquid animi consequuntur corporis dolorum eaque error id in iusto maiores maxime molestias nam nisi nulla obcaecati perspiciatis praesentium qui, quisquam rem sapiente similique soluta ut velit veritatis. Asperiores ipsam quia totam voluptate.</p>
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
