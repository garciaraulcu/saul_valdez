
@can('edit')

@extends('layouts.app')

@section('template_title')
    Create Model Has Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Model Has Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('giveroles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="role_id">Role Id</label>
                                    <select name="role_id" id="" class="form-select">
                                        @foreach ($roles as $item)
                                        @if ($item->id != 1)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            
                                        @endif
                                        @endforeach
                                    </select>


                                </div>
                                <br>

                              <br>
                              <div class="form-group">
                                <label for="model_type">Model Id</label>

                                  <input list="model_id" type="text" name="model_id" class="form-control" required>
                                  <datalist id="model_id">
                                      @foreach ($users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                      @endforeach
                                  </datalist>

                              </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"> Crear </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection    
@else

@section('content')
<br><br><br><br><br><h1 style="text-align:center"> Se Requiere Autorizacion</h1>
    
@endsection    
@endcan