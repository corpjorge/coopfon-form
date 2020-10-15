@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
               

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <a href="http://www.fonmibus.co//modulos/servicios/ahorros/auxilio_form.php"  target="_blank">
                    <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>                     
                    <h3 class="card-title">Ahorros</h3>
                    </div>
                    <div class="card-footer">                     
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <a href="https://fonmibus.co/modulos/servicios/creditos/login.php"  target="_blank">
                    <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>                     
                    <h3 class="card-title">Créditos</h3>
                    </div>
                    <div class="card-footer">                     
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <a href="https://fonmibus.co/modulos/servicios/auxilios/login.php"  target="_blank">
                    <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>                     
                    <h3 class="card-title">Auxilios</h3>
                    </div>
                    <div class="card-footer">                     
                    </div>
                    </a>
                </div>
            </div>


            </div>
        </div>
    </div>
@endsection
