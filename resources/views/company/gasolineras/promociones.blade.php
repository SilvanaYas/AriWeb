@extends('layouts.templateGasolinera')
 @section('title', 'Listado de promociones')
@section('content')   

@if(Session:: has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

    
  @if(count($perfil)>0)
    @foreach ($perfil as $data)         
      <div class="row">
          <div class="col-xs-12 col-sm-12">
                <div class="navbar-inner breadcrumb">          
                    <span class="navbar-brand">{{$data->nombreEmpresa}}</span>    

                    <ul class="collapse navbar-collapse nav navbar-nav top-menu"> 
                       <li class="dropdown">
                            <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-fire"></i>Opciones<span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                            <li>{!!link_to_route('company.edit', $title = 'Editar datos Registrados', $parameters = $data->id, $attributes = ['class'=>'text-danger'])!!}</li>
                            <li>{!!link_to_route('company.edit', $title = 'Ver datos Registrados', $parameters = $data->id, $attributes = ['class'=>'text-danger'])!!}</li>
                                
                            </ul>
                        </li>                     
                    </ul>
                </div>
            </div>
        </div>
      @endforeach
                      <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de Promociones</div>
                                    </div>
                                    <div class="pull-right">
                        <a class="btn btn-success" href="{!!URL::to('promotion/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($promociones as $promo)

                                            <tr>
                                                <td>{{$promo->promo}}</td>
                                                <td>{{$promo->ruc}}</td>
                                                <td>{{$promo->telefono}}</td>
                                                <td>{{$promo->direccion}}</td>
                                                <td>{{$promo->activo==1? "Activo":"Inactivo"}}</td>
                                                 <td class="center">
                                                    {!!link_to_route('promotion.update', $title = '', $parameters = $promo->idPromocion, $attributes = ['class'=>'glyphicon glyphicon-eye-open','title'=>'Ver mas'])!!}

                                                    {!!link_to_route('promotion.edit', $title = '', $parameters = $promo->idPromocion, $attributes = ['class'=>'glyphicon glyphicon-edit','title'=>'Editar'])!!}

                                                    {!!link_to_route('promotion.destroy', $title = '', $parameters = $promo->idpromocion, $attributes = ['class'=>'glyphicon glyphicon-trash','title'=>'Eliminar'])!!}
                                                                                                       
                                                   </td>
                                            </tr>                                              
                                              @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
  @else
  @include('company.forms.index')
  @endif
   
@stop
