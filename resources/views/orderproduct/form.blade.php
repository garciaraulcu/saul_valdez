<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_order') }}
            {{ Form::text('id_order', $orderproduct->id_order, ['class' => 'form-control' . ($errors->has('id_order') ? ' is-invalid' : ''), 'placeholder' => 'Id Order']) }}
            {!! $errors->first('id_order', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_products') }}
            {{ Form::text('id_products', $orderproduct->id_products, ['class' => 'form-control' . ($errors->has('id_products') ? ' is-invalid' : ''), 'placeholder' => 'Id Products']) }}
            {!! $errors->first('id_products', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>