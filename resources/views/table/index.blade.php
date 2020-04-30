@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Tablas')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Tabla
                  </th>
                  <th>
                    Ver
                  </th>
                </thead>
                <tbody>
                @foreach($tables as $table)
                    <tr>
                    <td>
                        {{$table}}
                    </td>
                    <td>
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('table/'.$table) }}" data-original-title="" title="">
                           <i class="material-icons">remove_red_eye</i>
                           <div class="ripple-container"></div>
                        </a>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
