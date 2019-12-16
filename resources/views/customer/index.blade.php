@extends('layouts.base')
@section('content')

    @include('layouts.include.contentHeader', ['titleHeader' => 'Cliente Inicio'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Mis Clientes</h3>
                      <div class="card-tools">
                        <a href="{{ route('customer.create') }}" class="btn btn-primary">Crear Cliente</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th style="width: 18%">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        {{ $customer->id }}
                                    </td>
                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                    <td>
                                        {{ $customer->age }}
                                    </td>
                                    <td>
                                        {{ $customer->email }}
                                    </td>
                                    <td>
                                        {{ $customer->phone }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('customer.show', $customer) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning" href="{{ route('customer.edit', $customer) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <!-- Pagination Start-->
                      {{ $customers->links() }}
                      <!-- Pagination End-->
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection
