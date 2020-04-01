<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		
		$_POST['productoU'],
		$_POST['marcaU'],
		$_POST['cantidadU'],
		$_POST['id_pro']
				);

	echo $obj->actualizar($datos);
	

 ?>