<?php
include_once 'cabecera.php';
include_once 'verificar_sesion.php';
include_once 'navegacion.php';
use app\SpaceItfip\Controladores\BienesItfipControlador;

date_default_timezone_set('America/Bogota');
?>
<h> HOY: </h>
<?php
$hoy = date("Y-m-d");
echo $hoy;
?>

<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h2">Mostrar si esta disponible el espacio a prestar</h1>
	</div>
	<div class="col-lg-12 mb-3">
		<form action="#" method="post" class="form-control bg-light mb-5">
		<?php if (isset($_GET['falta_espacio'])) { ?>
				<div class="alert alert-warning">
					Ingrese el bien o espacio a registrar *
				</div>
			<?php } ?>
        </from>

			<form action="#" method="post" class="form-control bg-light mb-5">
			<div class="col-12 mb-3">
				<div class="table-responsive">
                <table class="table table-hover">
                        <caption>Mostrar los pr&eacute;stamos</caption>
                        <tr>
                            <th>
                                <div class="form-floating mb-2">

                                <?php
                                    print '<input name="fecha_entrega" class="form-control" type="date" min="'.$hoy.'" max="2025-12-31">
                                    <label class="form-label" for="fecha_entrega">Ingresa la fecha de reserva </label>';
                                ?>
                                    </div>
                            </th>
                            <th colspan="1">
                                <div class="form-floating mb-2">
                                    <select required name="bien" class="form-select btn btn-light mr-sm-2">
                                        <option value=''> Seleccione Bien</option>
                                        <?php foreach(BienesItfipControlador::obtenerTodos() as $bien) { ?>
                                            <option value="<?=$bien->id_bien?>"><?=$bien->nombre_bien?></option>
                                        <?php } ?>
                                    </select>
                                    <label class="form-label" for="bien">Espacio f&iacute;sico: </label>
                                </div>
                            </th>
                        </tr>
                    </table>
					<div class="form-group ml-2 mb-3">
                    <input type="submit" class="btn btn-danger" style="background: #f00;" name="btn_mostrar" value="Mostrar">  
					</div>	
		       </div>
		    </div>			
        </form>

        <?php
        
        ?>


    </div>
</div>


<?php include_once 'pie.php';