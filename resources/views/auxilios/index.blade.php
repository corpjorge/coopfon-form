@extends('layouts.app', ['activePage' => 'auxilios', 'titlePage' => __('Auxilios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Auxilios') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar las solicitudes') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                  <a href=" {{ url('table/f_aux/export') }}" class="btn btn-sm btn-primary">Descargar</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                       <th>
                        {{ __('nombre') }}
                      </th>
                      <th>
                        {{ __('cedula') }}
                      </th>
                      <th>
                        {{ __('telefono') }}
                      </th>
                      <th>
                        {{ __('email') }}
                      </th>
                      <th>
                        {{ __('solicitud') }}
                      </th>
                      <th>
                        {{ __('soportes') }}
                      </th>                       
                      <th>
                        {{ __('area') }}
                      </th>
                      <th>
                        {{ __('fecha de solicitud	') }}
                      </th>
                      <th>
                        {{ __('estado') }}
                      </th>
                      <th>
                        {{ __('usuario') }}
                      </th>
                      <th>
                        {{ __('fecha de aplicacion') }}
                      </th>
                       
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                        <td>
                            {{ $dato->nombre }}
                          </td>
                          <td>
                            {{ $dato->cedula }}
                          </td>
                          <td>
                            {{ $dato->telefono }}
                          </td>
                          <td>
                            {{ $dato->email }}
                          </td> 
                          <td>
                            {{ $dato->solicitud }}
                          </td> 
                          <td>
                          <a href="http://www.fonmibus.co/modulos/servicios/auxilios/{{ $dato->soporte1 }}"  target="_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>  
                           <a href="http://www.fonmibus.co/modulos/servicios/auxilios/{{ $dato->soporte2 }}"  target="_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                            <a href="http://www.fonmibus.co/modulos/servicios/auxilios/{{ $dato->soporte3 }}"  target="_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>                          
                          </td>                           
                          <td>
                            {{ $dato->area }}
                          </td>
                          <td>
                            {{ $dato->fecha_de_solicitud }}
                          </td>
                          <td>
                            <form action="{{url('auxilios/'.$dato->id)}}" method="post">
                              @csrf  
                              @method('PUT') 
                              <input type="hidden" name="user" value="{{auth()->user()->name}}"> 
                              <select class="form-control" id="exampleFormControlSelect1" name="estado">
                                  <option value="{{ $dato->estado }}">{{ $dato->estado }}</option>
                                  <option>En Análisis</option>
                                  <option>En comité y/o Gerencia</option>
                                  <option>En tesorería</option>
                                  <option>Negado y/o Anulado</option>
                                  <option>Devuelto</option>
                                </select>                              
                                                       
                              <button type="submit" class="btn btn-primary btn-lg btn-block btn-sm">Cambiar</button>                            
                            </form>                     
                          </td>
                          <td>
                            {{ $dato->user }}
                          </td>
                          <td>
                            {{ $dato->Updated_at }}
                          </td>                                                    
                        </tr>
                      @endforeach
                    </tbody>

                    {{ $datos->links() }}
                  </table>
                </div>
              </div>
              {{ $datos->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>



  @push('js')
        <script>
       
            $("form").submit(function(e) {
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

            });
        </script>
    @endpush


@endsection
