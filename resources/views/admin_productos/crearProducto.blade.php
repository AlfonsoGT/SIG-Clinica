@extends('layouts.app')
@section('content')
<div class="container">
    <div id="loginbox" style="margin-top:30px">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Ingresar nuevo Producto</div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <form class="form-horizontal" role="form" method="POST" action="{{ url( '/admin_productos' ) }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                    <div class="form-group">
                            <label for="tipoProducto" class="col-md-4 control-label">Tipo de Producto</label>
                            <div class="col-md-6">
                                 <select required class="form-control" name="tipoProducto" id="tipoProducto">
                                 <option value="" disabled selected>Elije un tipo de Producto</option>
                                            @foreach($tipoProductos as $tipoProducto)
                                            <option  value='{{ $tipoProducto->idTipoProducto }}'> {{ $tipoProducto->nombreTipoProducto }} </option>
                                        @endforeach
                                    </select>
                            </div>
                    </div>
                    <div class="form-group {{ $errors->has('cantidad') ? ' has-error' : '' }}">
								<label for="cantidad" class="col-md-4 control-label">Cantidad de Producto en Cajas</label>
								<div class="col-md-6">
									<input id="cantidad" type="text" class="form-control" name= "cantidad" value="{{ old('cantidad') }}" autocomplete="off" required autofocus>
									@if ($errors->has('cantidad'))
									<span class="help-block">
										<strong>{{ $errors->first('cantidad') }}</strong>
									</span>
									@endif
								</div>
					</div>

					<div class="form-group {{ $errors->has('precioUnidad') ? ' has-error' : '' }}">
						<label for="precioUnidad" class="col-md-4 control-label">Precio Unitario</label>
						<div class="col-md-6">
							<input id="precioUnidad" type="text" class="form-control" name= "precioUnidad" value="{{ old('precioUnidad') }}" autocomplete="off" required autofocus>
									@if ($errors->has('precioUnidad'))
							<span class="help-block">
									<strong>{{ $errors->first('precioUnidad') }}</strong>
							</span>
									@endif
						</div>
					</div>
                    <div class="form-group {{ $errors->has('fechaCompra') ? ' has-error' : '' }}">
                        <label for="fechaCompra" class="col-md-4 control-label">Fecha de Compra</label>
                        <div class="col-md-6">
                            <input id="fechaCompra" type="date" class="form-control" name="fechaCompra" value="{{ old('fechaCompra') }}"  required autofocus onblur="validarFecha();" >
                            @if ($errors->has('fechaCompra'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fechaCompra') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success btn-sm">
                             <span class="glyphicon glyphicon-floppy-disk"></span>Guardar Registro de Producto
                        </button>
                         <a href="{{ url('/admin_productos') }}" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-list-alt"></span>Regresar a Productos</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection