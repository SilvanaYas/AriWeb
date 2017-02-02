@extends('layouts.templateAdmin')
@section('title', 'Perfiles')
  @section('content')
  @include('rol.forms.modal')
  @include('alerts.alertDelete')
  @include('alerts.alertEditSuccess')
       
                
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title pull-right">Perfiles de Usuario</div>
                                    </div>
                                    <div class="pull-right"> <a class="btn btn-success" href="{!!URL::to('perfil/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="rols">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
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
    {!!Html::script('dist/js/perfiles.js')!!}     
@endsection


