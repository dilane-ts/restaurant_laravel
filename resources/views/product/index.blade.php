@extends('base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#" class="text-decoration-none fs-6">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Foods</li>
@endsection

@section('content')
   <div class="row justify-content-center py-2">
       @foreach($products as $product)
           <div class="col-lg-3 col-md-4 col-sm-6 mb-3 ms-3 border rounded-4 p-0 overflow-hidden shadow" style="height: 45rem">
               <img src="/{{ $product->image }}" alt="" class="object-fit-cover" height="60%" width="100%">
               <div class="d-flex align-items-center flex-column mt-3 gap-2 px-3">
                   <div class="d-flex gap-1">
                       @for($i = 0; $i < 5; $i++)
                           <i class="bi bi-star-fill text-warning"></i>
                       @endfor
                   </div>
                   <a
                       href="{{ route('product.show', ['slug' => $product->slug]) }}"
                       class="fw-bold font-kalam fs-4 text-capitalize text-decoration-none text-black"
                   >{{ $product->name }}</a>
                   <p class="text-muted fs-6 text-center">{{ substr($product->description, 0, 50) }}...</p>
                   <h4 class="text-primary fw-bold">${{ $product->price }}</h4>
                   <div class="d-flex w-100 align-self-start align-items-center">
                       <a
                           href="{{ route('product.show', ['slug' => $product->slug]) }}"
                           class="text-dark bg-body-secondary d-flex align-items-center justify-content-center p-2 rounded-circle" style="width: 32px; height: 32px"
                       >
                           <i class="bi bi-eye"></i>
                       </a>
                       <form class="ms-2 w-100 d-flex" action="{{ route('product.cart',  $product->id) }}" method="POST">
                           @csrf
                           <input type="hidden" name="quantity" value="1">
                           <button type="submit"  class="btn btn-outline-primary w-100 border border-2 rounded-5"><i class="bi bi-cart4"></i> Add to cart</button>
                       </form>
                   </div>
               </div>
           </div>
       @endforeach
   </div>
@endsection
