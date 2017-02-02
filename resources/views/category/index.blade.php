@extends('layouts.templateAdmin')
 @section('title', 'Categorias')
@section('content')
@include('category.forms.modal')
@include('alerts.alertError')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')
                                     
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Tipo de Creditos Bancarios</div>
                                    </div>
                                    <div class="pull-right"> <a class="btn btn-success" href="{!!URL::to('category/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="category">
                                        <thead>
                                            <tr>
                                                <th>Credito</th>
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
    {!!Html::script('dist/js/categorias.js')!!}     
@endsection



