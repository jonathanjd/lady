@extends('layouts.base')
@section('content')

    @include('layouts.include.contentHeader', ['titleHeader' => 'Calendario Inicio'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Mi Calendario</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>

@endsection
