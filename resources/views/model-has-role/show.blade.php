@role('Superadmin|Admin')
    @extends('layouts.app')

    @section('template_title')
    @endsection

    @section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Show Model Has Role</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('giveroles.index') }}"> Back</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Name:</strong>
                                @foreach ($modelHasRole as $item)
                                    {{ $item->name}}
                                @endforeach
                            </div>
                            <div class="form-group">
                                <strong>Role:</strong>
                                @foreach ($modelHasRole as $item)
                                    {{ $item->role_name }}
                                @endforeach
                            </div>
                            <div class="form-group">
                                <strong>E-mail:</strong>
                                @foreach ($modelHasRole as $item)
                                    {{ $item->email }}
                                @endforeach
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
            Se Requiere Permiso
        </h1>
    @endsection
@endrole
