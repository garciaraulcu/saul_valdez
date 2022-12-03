@extends('layouts.app')

@section('content')
    <div class="cards">
        @foreach (App\Models\Product::all() as $product)
            <form action="{{ route('cart.store', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="bg-card">
                    <div>
                        <a href="#">
                            <img src="{{ url($product->image) }}" alt="Image1" class="img" />
                        </a>
                    </div>
                    <div class="center">
                        <a href="#" style="text-decoration: none">
                            <br>
                            <h6>
                                {{ $product->name }}
                            </h6>
                        </a>
                        <h6>{{ $product->type }}</h6>

                        <h4>
                            <span> ${{ $product->price }} MXN </span>
                        </h4>
                        <br>

                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        <input type="hidden" value="1" name="quantity">

                        <button type="submit" class="btn btn-primary" name="add" ">
                                Agregar al Carrito
                                <i class="fa fa-cart-plus cart-font"></i>
                            </button>

                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        </div>
                        <br />
                    </div>
                </form>
     @endforeach
                    </div>

                    <!-- Trigger/Open The Modal -->



                    <br>
                    <br>
                    <br>




                @endsection
