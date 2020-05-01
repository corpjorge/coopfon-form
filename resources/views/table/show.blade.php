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
                                    <a href=" {{ url('table/'.$table.'/export') }}" class="btn btn-sm btn-primary">Descargar</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead class=" text-primary">
                                    @foreach($fields as $field)
                                    <th class="tabledit-view-mode">
                                        {{$field}}
                                    </th>
                                    @endforeach
                                    </thead>
                                    <tbody>
                                    @foreach($values as $row)
                                        <tr>
                                            @foreach($fields as $field)
                                                <td>

                                                    @if (Auth::user()->area == $row->area)
                                                        @if($field == "fecha_aplicacion")
                                                        <form action="{{url('table/'.$table.'/'.$row->id )}}" method="post">
                                                            @csrf
                                                            <input type="text" value="{{$row->$field}}" name="{{$field}}">
                                                            <button class="btn btn-primary btn-sm" style="padding: 0;">
                                                                <i class="material-icons">save</i>
                                                            </button>
                                                        </form>
                                                        @else
                                                            {{$row->$field}}
                                                        @endif
                                                    @endif
                                                    @if (Auth::user()->area == '')
                                                        @if($field == "fecha_aplicacion")
                                                            <form action="{{url('table/'.$table.'/'.$row->id )}}" method="post">
                                                                @csrf
                                                                <input type="text" value="{{$row->$field}}" name="{{$field}}">
                                                                <button class="btn btn-primary btn-sm" style="padding: 0;">
                                                                    <i class="material-icons">save</i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            {{$row->$field}}
                                                        @endif
                                                    @endif
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


    @push('js')
        <script>
           /* $("form").submit(function(e) {
                e.preventDefault();
                var actionurl = e.currentTarget.action;
                $.ajax({
                    url: actionurl,
                    type: 'post',
                    //dataType: 'application/json',
                    dataType: 'text',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data);
                        console.log('data');

                       $.notify(
                        {
                            icon: "add_alert",
                            message: "Dato guardado"

                        },
                        {
                            type: 'success',
                            timer: 4000,
                            placement: {
                                from: 'top',
                                align: 'left'
                            }
                        });

                    },
                    error: function(e){
                        $.notify(
                            {
                                icon: "add_alert",
                                message: "Error"
                            },
                            {
                                type: 'danger',
                                timer: 4000,
                                placement: {
                                    from: 'top',
                                    align: 'left'
                                }
                            });
                    }
                });

            });*/
        </script>
    @endpush


@endsection
