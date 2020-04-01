
<!-- esta es la tabla de Nueva requisicion -!>
<?php
    require_once"clases/conexion.php";
    $obj=new conectar();
    $conexion=$obj->conexion();
    $sql="SELECT id_pro,
                 producto,
                 marca,
                 cantidad
         from _requisicion_tmp";
      $result=mysqli_query($conexion,$sql); #ejecutar query de Select   
?>


<div>
    <table class="table table-hover table-condensed table-bordered" id="iddatatable">
        <thead style="background-color: #243F5F;color: white; font-weight: bold;">
            <!-- Estructuracion de la tabla "cabecera"-->
            <tr>
                <!-- Estructuracion de la tabla "cabecera+colummnas"-->
                <td>Producto</td>
                <td>Marca</td>
                <td>Cantidad</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tfoot style="background-color: #3AAEBA;color: white; font-weight: bold;">
            <!-- Estructuracion de la tabla "footer"-->
            <tr>
                <!-- Estructuracion de la tabla "footer +colummnas"-->
                <td>Producto</td>
                <td>Marca</td>
                <td>Cantidad</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </tfoot>
        <tbody>
            <!-- Estructuracion de la tabla "boody"-->
            <?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
            <tr>
                <td><?php echo $mostrar[1] ?></td>
                <td><?php echo $mostrar[2] ?></td>
                <td><?php echo $mostrar[3] ?></td>
                <td style="text-align: center;">
                    <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar"
                        onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
                        <span class="fa fa-pencil-square-o"></span>
                    </span>
                </td>
                <td style="text-align: center;">
                    <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                        <span class="fa fa-trash"></span>
                    </span>
                </td>
            </tr>
            <?php 
			}
			?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#iddatatable').DataTable();
});
</script>