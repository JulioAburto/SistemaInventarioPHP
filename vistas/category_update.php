<div class="container is-fluid mb-6">
	<h1 class="title">Categorías</h1>
	<h2 class="subtitle">Actualizar categoría</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['category_id_up'])) ? $_GET['category_id_up'] : 0;

		/*== Verificando categoria ==*/
    	$check_categoria=conexion();
    	$check_categoria=$check_categoria->query("SELECT * FROM categoria WHERE id_Categoria='$id'");

        if($check_categoria->rowCount()>0){
        	$datos=$check_categoria->fetch();
	?>

<div class="form-rest mb-6 mt-6"></div>

<form
	action="./php/categoria_actualizar.php"
	method="POST"
	class="FormularioAjax"
	autocomplete="off"
>
	<input type="hidden" name="id_Categoria" value="<?php echo $datos['id_Categoria']; ?>" required />

	<div class="columns">
		<div class="column">
			<div class="control">
				<label>Nombre</label>
				<input
					class="input"
					type="text"
					name="nombre_Categoria"
					pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}"
					maxlength="50"
					required
					value="<?php echo $datos['nombre_Categoria']; ?>"
				/>
			</div>
		</div>
		<div class="column">
			<div class="control">
				<label>Ubicación</label>
				<input
					class="input"
					type="text"
					name="descripcion_Categoria"
					pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}"
					maxlength="150"
					value="<?php echo $datos['descripcion_Categoria']; ?>"
				/>
			</div>
		</div>
	</div>
	<p class="has-text-centered">
		<button type="submit" class="button is-success is-rounded is-focused is-light">Actualizar</button>
	</p>
</form>

	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_categoria=null;
	?>
</div>