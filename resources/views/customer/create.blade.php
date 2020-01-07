@extends('layouts.base')
@section('content')

    @include('layouts.include.contentHeader', ['titleHeader' => 'Crear Cliente'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Formulario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('customer.store') }}">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="edad">Edad</label>
                          <input name="age" type="text" class="form-control" id="edad">
                        </div>
                        <div class="form-group">
                          <label for="email">Correo</label>
                          <input name="email" type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="documentid">Documento de Identificación</label>
                          <input name="documentid" type="text" class="form-control" id="documentid">
                        </div>
                        <div class="form-group">
                          <label for="phone">Teléfono</label>
                          <input name="phone" type="text" class="form-control" id="phone">
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>

@endsection
