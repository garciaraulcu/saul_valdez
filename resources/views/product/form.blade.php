@if (Auth::user()->hasRole('Superadmin'))
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-row">
            <div class="form-group col-6 ">
                {{ Form::label('name') }}
                {{ Form::text('name', $product->name, ['class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('price') }}
                {{ Form::text('price', $product->price, ['class' => 'form-control ' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('cantidad') }}
                {{ Form::text('cantidad', $product->cantidad, ['class' => 'form-control ' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-6">
                {{ Form::label('category_id') }}
                {{ Form::select('category_id', App\Categoria::pluck('name','id'), ['class' => 'form-control ' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
                {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Link de Descarga') }}
            {{ Form::text('link_download', $product->link_download, ['class' => 'form-control ' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Link de Descarga']) }}
            {!! $errors->first('link_download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image') }}
            {{ Form::file('image', $product->image, ['accept' => 'image/*','class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_dos') }}
            {{ Form::file('image_dos', $product->image_dos, ['accept' => 'image/*','class' => 'form-control' . ($errors->has('image_dos') ? ' is-invalid' : ''), 'placeholder' => 'Image Dos']) }}
            {!! $errors->first('image_dos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_tres') }}
            {{ Form::file('image_tres', $product->image_tres, ['accept' => 'image/*','class' => 'form-control' . ($errors->has('image_tres') ? ' is-invalid' : ''), 'placeholder' => 'Image Tres']) }}
            {!! $errors->first('image_tres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_cuatro') }}
            {{ Form::file('image_cuatro', $product->image_cuatro, ['accept' => 'image/*','class' => 'form-control' . ($errors->has('image_cuatro') ? ' is-invalid' : ''), 'placeholder' => 'Image Cuatro']) }}
            {!! $errors->first('image_cuatro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('info') }}
            {{ Form::textarea('info', $product->info, ['id' => 'editor','class' => 'form-control' . ($errors->has('info') ? ' is-invalid' : ''), 'placeholder' => 'Info']) }}
            {!! $errors->first('info', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@else
    <h2 class="container">
        Sin Acceso
    </h2>
@endif