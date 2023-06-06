<?php use app\SpaceItfip\Controladores\BienesItfipControlador; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
	<div class="container-fluid">
		<span class="navbar-brand">
            <img class="d-inline-block align-top" src="img/Space_itfip_logotype.png" alt="Logo SpaceItfip" width="42" height="42">
		</span>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			    <li class="nav-item">
					<a class="nav-link active" href="reservas.php">Mostrar reservas <i class="fa fa-plus"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="registrar.php">Registrar pr&eacute;stamo <i class="fa fa-plus"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="aprobar.php">Aprobar pr&eacute;stamo <i class="fa fa-check"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="prestamos.php">Todos los pr&eacute;stamos <i class="fa fa-check-double"></i></a>
				</li>
				<li class="nav-item">
					<div>
						<a class="nav-link" href="Generar.php">Registrar bien <i class="fa fa-plus"></i> </a>
					</div>
				</li>
				<li class="nav-item">
					<div>
						<button onclick="cambiartema()" class="btn rounded-fill"><i id="dl-icon" class=" bi bi-moon-fill"></i></button>
					</div>
				</li>
				<li class="nav-item">
					<div>
						<a class="nav-link" href="cerrar_sesion.php">Cerrar sesi&oacute;n <i class="fa fa-sign-out-alt"></i> (<?=$_SESSION['correo_administrador']?>)</a>
					</div>
				</li>
			</ul>
			<form class="d-flex" role="search">
				<select required name="busqueda" id="busqueda" class="form-select btn btn-light mr-sm-2 me-2" style="width: 270px">
					<option disabled value='unset' selected>No seleccionado</option>
					<?php foreach(BienesItfipControlador::obtenerTodos() as $bien) { ?>
						<option value="<?=$bien->id_bien?>"><?=$bien->nombre_bien?></option>
					<?php } ?>
				</select>
				<button class="btn btn-warning" type="submit">Buscar</button>
			</form>
		</div>
	</div>
</nav>
<?php if (!empty($_GET['busqueda'])) { ?>
<script>
	document.getElementById('busqueda').querySelector(`option[value="${<?=$_GET['busqueda']?>}"]`).setAttribute('selected', true);
</script>
<?php } ?>
