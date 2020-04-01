

<?php

class conectar{

	public function conexion(){

		$conexion=mysqli_connect('localhost','root','','requisicion');
		return $conexion;
	}
}

#  $obj=new conectar();  se usa para comprobar coenxion
# if ($obj->conexion()) {
#    echo "coenctado";
 #   }
?>