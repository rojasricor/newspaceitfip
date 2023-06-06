<?php
include_once 'cabecera.php';
include_once 'verificar_sesion.php';
include_once 'navegacion.php';
use app\SpaceItfip\Controladores\PrestamosControlador;
/**
 * [$prestamos description]
 * @var [type]
 */
$prestamos = !empty($_GET['busqueda'])
? PrestamosControlador::obtenerPorBien($_GET['busqueda'])
: PrestamosControlador::obtenerTodos();
// var_dump($prestamos);
?>
<div class="row">
	<div class="col-12 mb-3">
		<h1 class="h2">Bienes o espacios f&iacute;sicos prestados</h1>
	</div>
	<div class="col-12 mb-5">
		<?php if (!$prestamos) { ?>
			<div class="alert alert-primary">
				No se encontr&oacute; ning&uacute;n registro
			</div>
		<?php } else { ?>
			<div class="table-responsive">
				<table class="table table-light table-hover table-bordered text-center">
					<caption>Bienes y/o espacios f&iacute;sicos prestados</caption>
					<thead>
						<tr>
							<th>Id. pr&eacute;stamo</th>
							<th>Fecha registro</th>
							<th>Fecha inicio</th>
							<th>Fecha fin</th>
							<th>Elemento solicitado</th>
							<th>Solicitante</th>
							<th>C&eacute;dula</th>
							<th>Direcci&oacute;n</th>
							<th>Tel&eacute;fono</th>
							<th>Descripci&oacute;n Bien(es)</th>
							<th>Finalidad</th>
							<th>Aprobaci&oacute;n</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($prestamos as $prestamo) { ?>
							<tr>
								<td><?=$prestamo->id_prestamo?></td>
								<td><?=$prestamo->fecha_solicitud_bien?></td>
								<td><?=$prestamo->fecha_entrega_bien?></td>
								<td><?=$prestamo->fecha_fin_bien?></td>
								<td><?=$prestamo->nombre_bien?></td>
								<td><?=$prestamo->nombre_del_solicitante?></td>
								<td><?=$prestamo->numero_documento_del_solicitante?></td>
								<td><?=$prestamo->direccion_del_solicitante?></td>
								<td><?=$prestamo->telefono_del_solicitante?></td>
								<td><?=$prestamo->descripcion_prestamo?></td>
								<td><?=$prestamo->finalidad_prestamo?></td>
								<td ><?='si' === $prestamo->aprobacion_prestamo ? 
								'<font color= "green">Aprobado</font>' : '<font color="red">No aprobado</font>'?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>
</div>
<?php include_once 'pie.php';