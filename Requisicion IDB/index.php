<!-- pantalla principal nueva requisicion-->
<!DOCTYPE html>
<html>
<head>
	<title>Nueva Requisicion</title>
	<?php require_once "scripts.php";  ?>
	<link rel=icon href='./img/Logos-en-Vectores-100x100.jpg' sizes="32x32" type="image/jpg"> 
</head>
<body>
	
	
	
	<div class="container py-5">
		<div class="row-fluid">
			<div class="col-sm-12">
				<h2><img src="./img/Logo.jpg" >Sistema de Requisicion</h2>
				<hr>
			<!-- Tarjeta de nuevos productos -->
				<div class="card text-left">
					<div class="card-header">
						Nueva Requisicion
					</div>
					<div class="card-body">
						<span class="btn" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo producto <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						CopyRigth Grupo de Clinicas IDB
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal de nuevos productos -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos Productos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Producto</label>
						<input type="text" class="form-control input-sm" id="producto" name="producto">
						<label>Marca</label>
						<input type="stext" class="form-control input-sm" id="marca" name="marca">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal editar -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Productos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="id_pro" name="id_pro">
						<label>Producto</label>
						<input type="text" class="form-control input-sm" id="productoU" name="productoU">
						<label>Marca</label>
						<input type="text" class="form-control input-sm" id="marcaU" name="marcaU">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>

<!-- scripit para agregar nuevo-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id_pro){
		$.ajax({
			type:"POST",
			data:"id_pro=" + id_pro,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id_pro').val(datos['id_pro']);
				$('#productoU').val(datos['producto']);
				$('#marcaU').val(datos['marca']);
				$('#cantidadU').val(datos['cantidad']);
			}
		});
	}

	function eliminarDatos(id_pro){
		alertify.confirm('Eliminar un producto', '¿Seguro de eliminar este producto :( ?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_pro=" + id_pro,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>