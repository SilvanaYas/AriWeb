@extends('layouts.templateGasolinera')
@section('title', 'Combustibles registrados')
@section('content')
@include('product.forms.modal_gaso')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Combustibles Registrados</div>
                                    </div>
                                    <div class="pull-right"><a class="btn btn-success" href="{!!URL::to('product/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                        
                                    </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="reporteCombustibles/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteCombustibles/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="prod">
                                        <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Tipo</th>
                                            <th>Presentación</th>
                                            <th>Precio Presentación</th>
                                            <th>Fabricante</th>
                                            <th>Agregar Promoción</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
@section('scripts')
    {!!Html::script('dist/js/combustibles.js')!!}
@endsection

