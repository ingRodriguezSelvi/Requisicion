<?php 

	class crud{
		public function agregar($datos){ # funcion para agregar
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into  _requisicion_tmp (producto,marca,cantidad)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($id_pro){ #llamos al id, para cargar los datos del mismo
			$obj= new conectar();
			$conexion=$obj->conexion(); # conexion

			$sql="SELECT id_pro,
							producto,
							marca,
							cantidad
					from _requisicion_tmp 
					where id_pro='$id_pro'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( #arrelgo asociativo para guardar datos
				'id_pro' => $ver[0],
				'producto' => $ver[1],
				'marca' => $ver[2],
				'cantidad' => $ver[3]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE _requisicion_tmp set producto='$datos[0]',
										marca='$datos[1]',
										cantidad='$datos[2]'
						where id_pro='$datos[3]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($id_pro){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from _requisicion_tmp where id_pro='$id_pro'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>