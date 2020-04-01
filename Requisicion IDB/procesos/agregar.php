<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array( #Se colocan los datos en un arreglo para que se mas facil moverlos

		$_POST['producto'],
		$_POST['marca'],
		$_POST['cantidad']
				);

	echo $obj->agregar($datos);
 ?>