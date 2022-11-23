@hasanyrole('Superadmin|Admin')
    @extends('layouts.app')

    @section('template_title')
        Update Model Has Role
    @endsection

    @section('content')
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Update Model Has Role</span>
                        </div>
                        <div class="card-body">

                            @foreach ($data as $item)
                            @endforeach
                            <form method="POST" action="{{ route('giveroles.update', $item->model_id) }}" role="form"
                                enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="role_id">Role:</label>
                                        <select name="role_id" id="" class="form-select">
                                            @foreach ($roles as $item)
                                                @if ($item->id != 1)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"> Update </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection



@else
    @section('content')
        <h1 style="text-align: center">
            Se Rquiere Permiso
        </h1>
    @endsection
@endhasanyrole
