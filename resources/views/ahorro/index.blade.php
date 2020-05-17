@extends('layouts.app', ['activePage' => 'ahorros', 'titlePage' => __('Ahorros')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Ahorro') }}</h4>
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
                  <a href=" {{ url('table/f_ahorros/export') }}" class="btn btn-sm btn-primary">Descargar</a>
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
                        {{ __('ahorro') }}
                      </th>
                      <th>
                        {{ __('valor') }}
                      </th>
                      <th>
                        {{ __('cuotas') }}
                      </th>
                      <th>
                        {{ __('soporte') }}
                      </th>
                      <th>
                        {{ __('area') }}
                      </th>
                      <th>
                        {{ __('confirmacion') }}
                      </th>
                      <th>
                        {{ __('fecha de solicitud	') }}
                      </th>
                      <th>
                        {{ __('estado') }}
                      </th>
                      <th>
                        {{ __('fecha de aplicacion') }}
                      </th>
                       
                    </thead>
                    <tbody>
                      @foreach($ahorros as $ahorro)
                        <tr>
                        <td>
                            {{ $ahorro->nombre }}
                          </td>
                          <td>
                            {{ $ahorro->cedula }}
                          </td>
                          <td>
                            {{ $ahorro->telefono }}
                          </td>
                          <td>
                            {{ $ahorro->email }}
                          </td>
                          <td>
                            {{ $ahorro->ahorro }}
                          </td>
                          <td>
                            {{ $ahorro->valor }}
                          </td>
                          <td>
                            {{ $ahorro->cuotas }}
                          </td>
                          <td>
                          <a href="http://www.fonmibus.co//modulos/servicios/ahorros/{{ $ahorro->soporte }}"  target="_blank"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                            
                          </td>
                          <td>
                            {{ $ahorro->area }}
                          </td>
                          <td>
                            {{ $ahorro->confirmacion }}
                          </td>
                          <td>
                            {{ $ahorro->fecha_de_solicitud }}
                          </td>
                          <td>
                            <form action="{{url('ahorros/'.$ahorro->id)}}" method="post">
                              @csrf  
                              @method('PUT')                               
                              <input type="text" value="{{ $ahorro->estado }}" name="estado" />                               
                              <button type="submit" class="btn btn-primary btn-lg btn-block btn-sm">Cambiar</button>                            
                            </form>                     
                          </td>
                          <td>
                            {{ $ahorro->Updated_at }}
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
