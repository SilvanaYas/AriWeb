@extends('layouts.templateFarmacia')
@section('title', 'Stock de productos')
@section('content')
@include('group.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Mi Stock de Productos</div>
                                    </div>
                                    <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="reporteMisProductos/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteMisProductos/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="miStock">
                                        <thead>
                                            <tr>
                                                <th>Medicamento</th>
                                                <th>Simular</th>
                                                <th>Tipo</th>
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
    {!!Html::script('dist/js/miStock.js')!!}
@endsection

