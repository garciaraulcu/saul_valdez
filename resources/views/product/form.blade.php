<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $product->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image') }}
            {{ Form::text('image', $product->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('download') }}
            {{ Form::text('download', $product->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'placeholder' => 'Download']) }}
            {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('info') }}
            {{ Form::text('info', $product->info, ['class' => 'form-control' . ($errors->has('info') ? ' is-invalid' : ''), 'placeholder' => 'Info']) }}
            {!! $errors->first('info', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_dos') }}
            {{ Form::text('image_dos', $product->image_dos, ['class' => 'form-control' . ($errors->has('image_dos') ? ' is-invalid' : ''), 'placeholder' => 'Image Dos']) }}
            {!! $errors->first('image_dos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_tres') }}
            {{ Form::text('image_tres', $product->image_tres, ['class' => 'form-control' . ($errors->has('image_tres') ? ' is-invalid' : ''), 'placeholder' => 'Image Tres']) }}
            {!! $errors->first('image_tres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image_cuatro') }}
            {{ Form::text('image_cuatro', $product->image_cuatro, ['class' => 'form-control' . ($errors->has('image_cuatro') ? ' is-invalid' : ''), 'placeholder' => 'Image Cuatro']) }}
            {!! $errors->first('image_cuatro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>