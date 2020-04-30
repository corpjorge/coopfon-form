@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Tablas')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{$table}}</h4>
                            <p class="card-category"> Resultados de la tabla</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Descargar</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    @foreach($fields as $field)
                                    <th>
                                        {{$field}}
                                    </th>
                                    @endforeach
                                    </thead>
                                    <tbody>
                                    @foreach($values as $row)
                                    <tr>
                                        @foreach($row as $data)
                                        <td>
                                            {{ $data }}
                                        </td>
                                        @endforeach
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
