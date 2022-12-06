@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <div class="container">
        <br>
        <h2>{{ $product->name }}</h2>

        <div class="bg-card">
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <img src="{{ asset($product->image) }}" id="expandedImg" style="width:100%">
                        <!-- The four columns -->
                        <div class="row container">
                            <img class="col" src="{{ asset($product->image) }}" style="width:100%; padding: 0px;"
                                onclick="myFunction(this);">
                            <img class="col" src="{{ asset($product->image_dos) }}" style="width:100%; padding: 0px;"
                                onclick="myFunction(this);">
                            <img class="col" src="{{ asset($product->image_tres) }}" style="width:100%; padding: 0px;"
                                onclick="myFunction(this);">
                            <img class="col" src="{{ asset($product->image_cuatro) }}" style="width:100%; padding: 0px;"
                                onclick="myFunction(this);">
                        </div>
                    </div>

                </div>
                <div class="col-md-6 ">
                    <br>
                    <div class="container">
                        <div class="w3-hide-small">
                            <h5>Descripción</h5>
                            <p>{!! $product->info !!}</p>
                        </div>
                        <h6><b>Categoria: </b>{{ App\Categoria::find($product->category_id) ? App\Categoria::find($product->category_id)->name : "Sin Categoria" }}</h6>
                        <h6><b>Piezas: </b>{{ $product->cantidad }}</h6>
                        <center>
                            <h3>$ {{ $product->price }} MXN</h3>
                            <form action="{{ route('cart.store', $product->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->category_id }}" name="category_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">

                                <button style="width: 100%" type="submit" class="btn btn-primary" name="add">
                                    Agregar al Carrito
                                    <i class="fa fa-cart-plus cart-font"></i>
                                </button>

                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            </form>
                        </center>
                        <br>
                        <div class="w3-hide-medium w3-hide-large">
                            <h5>Descripción</h5>
                            <p>{!! $product->info !!}</p>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <br>
        </div>

    </div>
    </div>
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
        }
    </script>
@endsection
