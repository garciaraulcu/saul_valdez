@extends('layouts.app')

@section('template_title')
    {{ $orderproduct->name ?? 'Show Orderproduct' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Orderproduct</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orderproducts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Order:</strong>
                            {{ $orderproduct->id_order }}
                        </div>
                        <div class="form-group">
                            <strong>Id Products:</strong>
                            {{ $orderproduct->id_products }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
