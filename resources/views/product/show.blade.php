@can('show')
@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $product->type }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <img src="{{ $product->image }}" alt="{{ $product->image }}">
                        </div>
                        <div class="form-group">
                            <strong>Download:</strong>
                            {{ $product->download }}
                        </div>
                        <div class="form-group">
                            <strong>Info:</strong>
                            {{ $product->info }}
                        </div>
                        <div class="form-group">
                            <strong>Image Dos:</strong>
                            {{ $product->image_dos }}
                        </div>
                        <div class="form-group">
                            <strong>Image Tres:</strong>
                            {{ $product->image_tres }}
                        </div>
                        <div class="form-group">
                            <strong>Image Cuatro:</strong>
                            {{ $product->image_cuatro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@else
    @section('content')
        <h1 style="text-align: center">
            Se Requiere Permiso Madafakas
        </h1>
    @endsection
@endcan