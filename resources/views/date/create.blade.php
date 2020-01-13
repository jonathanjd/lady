@extends('layouts.base')
@section('content')

    @include('layouts.include.contentHeader', ['titleHeader' => 'Crear Citas'])

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
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Formulario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('date.store') }}">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="customer_id">Clientes</label>
                          <select class="form-control" name="customer_id">
                              <option value="" disabled selected>Seleccione un Cliente</option>
                            @foreach ($myCustomer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="service">Servicio</label>
                          <input name="service" type="text" class="form-control" id="service">
                        </div>
                        <div class="form-group">
                          <label for="note">Nota</label>
                          <textarea name="note" class="form-control" id="note" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="hour">Hora</label>
                          <select class="form-control" name="hour">
                            <option value="" disabled selected>Seleccione una Hora</option>
                          @foreach ($myHour as $item)
                              <option value="{{ $item }}">{{ $item . ':00' }}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="date">Fecha</label>
                          <select class="form-control" name="date">
                            <option value="" disabled selected>Seleccione una Fecha</option>
                          @foreach ($myWeekArray as $item)
                              <option value="{{ $item['myValue'] }}">{{ $item['myFormatDate'] }}</option>
                          @endforeach
                        </select>
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
