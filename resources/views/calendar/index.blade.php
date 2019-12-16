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
                        <div id="calendar" style="height: 800px;"></div>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>

    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.js"></script>
    <script src="https://uicdn.toast.com/tui.dom/v3.0.0/tui-dom.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>

    <script>

        var Calendar = tui.Calendar;

        var calendar = new Calendar('#calendar', {
            defaultView: 'week',
        });

    </script>

@endsection
