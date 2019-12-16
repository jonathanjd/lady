@extends('layouts.base')
@section('content')

    @include('layouts.include.contentHeader', ['titleHeader' => 'Datos de Cliente'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Cliente</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $customer->name }}</p>
                        <p><strong>Edad:</strong> {{ $customer->age }}</p>
                        <p><strong>Correo:</strong>{{ $customer->email }}</p>
                        <p><strong>Documento de Identificación:</strong> {{ $customer->documentid }}</p>
                        <p><strong>Teléfono:</strong> {{ $customer->phone }}</p>
                        <p><strong>Servicio:</strong> {{ $customer->service }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('customer.index') }}">Regresar</a>
                    </div>

                  </div>
            </div>
        </div>
    </div>

@endsection
