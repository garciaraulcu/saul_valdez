@extends('layouts.app')

@section('template_title')
    Update Product
@endsection

@section('content')
    @can('delete')
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Update Product</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('products.update', $product->id) }}" role="form"
                                enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="name">Nombre</label>
                                        <input name="name" class="form-control" type="text" value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label  for="price">Precio</label>
                                        <input name="price" class="form-control" type="text" value="{{ $product->price }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label  for="cantidad">Cantidad</label>
                                        <input name="cantidad" class="form-control" type="text"
                                            value="{{ $product->cantidad }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label  for="category_id">Categoria</label>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach (App\Categoria::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label  for="cantidad">Link de Descarga</label>
                                        <input name="link_download" class="form-control" type="text"
                                            value="{{ $product->link_download }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">IMG 1</label>
                                    <input type="text" name="image" class="form-control" value="{{ $product->image }}">
                                </div>
                                <div class="form-group">
                                    <label for="image_dos">IMG 1</label>
                                    <input type="text" name="image_dos" class="form-control" value="{{ $product->image_dos }}">
                                </div>
                                <div class="form-group">
                                    <label for="image_tres">IMG 1</label>
                                    <input type="text" name="image_tres" class="form-control" value="{{ $product->image_tres }}">
                                </div>
                                <div class="form-group">
                                    <label for="image_cuatro">IMG 1</label>
                                    <input type="text" name="image_cuatro" class="form-control" value="{{ $product->image_cuatro }}">
                                </div>
                                <div class="form-group">
                                    <label  for="info">Descripcion</label>
                                    <textarea name="info" id="editor" cols="30" rows="10">{{ $product->info }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection
