@extends('layouts.templateFarmacia')
@section('title', 'Listado de Productos')
@section('content')
@include('group.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

    <div class="alert alert-info" role="alert">
        <strong>Por favor</strong> Seleccionar primero los productos y luego dar click en el botón a gregar
    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Stock de Productos General de la Empresa</div>
                                    </div>
                                    <div class="pull-right">
                           <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success">Agregar</button>
                                </div>
                             </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="stock">
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
    {!!Html::script('dist/js/stockEmpresa.js')!!}
@endsection

