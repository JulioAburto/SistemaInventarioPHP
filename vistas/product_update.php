<div class="container is-fluid mb-6">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle">Actualizar producto</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM articulo WHERE id_Articulo='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

<div class="form-rest mb-6 mt-6"></div>

<h2 class="title has-text-centered"><?php echo $datos['nombre_Articulo']; ?></h2>

<form
	action="./php/producto_actualizar.php"
	method="POST"
	class="FormularioAjax"
	autocomplete="off"
>
	<input type="hidden" name="id_Articulo" value="<?php echo $datos['id_Articulo']; ?>" required />

	<div class="columns">
		<div class="column">
			<div class="control">
				<label>Código de barra</label>
				<input
					class="input"
					type="text"
					name="codigo_Articulo"
					pattern="[a-zA-Z0-9- ]{1,70}"
					maxlength="70"
					required
					value="<?php echo $datos['codigo_Articulo']; ?>"
				/>
			</div>
		</div>
		<div class="column">
			<div class="control">
				<label>Nombre</label>
				<input
					class="input"
					type="text"
					name="nombre_Articulo"
					pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}"
					maxlength="70"
					required
					value="<?php echo $datos['nombre_Articulo']; ?>"
				/>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column">
			<div class="control">
				<label>Precio</label>
				<input
					class="input"
					type="text"
					name="precio_Articulo"
					pattern="[0-9.]{1,25}"
					maxlength="25"
					required
					value="<?php echo $datos['precio_Articulo']; ?>"
				/>
			</div>
		</div>
		<div class="column">
			<div class="control">
				<label>Stock</label>
				<input
					class="input"
					type="text"
					name="stock_Articulo"
					pattern="[0-9]{1,25}"
					maxlength="25"
					required
					value="<?php echo $datos['stock_Articulo']; ?>"
				/>
			</div>
		</div>
		<div class="column">
			<label>Categoría</label><br />
			<div class="select is-rounded">
				<select name="producto_categoria">
					<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM categoria"); if($categorias->rowCount()>0){
					$categorias=$categorias->fetchAll(); foreach($categorias as $row){
					if($datos['id_Categoria']==$row['id_Categoria']){ echo '
					<option value="'.$row['id_Categoria'].'" selected="">
						'.$row['nombre_Categoria'].' (Actual)
					</option>
					'; }else{ echo '
					<option value="'.$row['id_Categoria'].'">'.$row['nombre_Categoria'].'</option>
					'; } } } $categorias=null; ?>
				</select>
			</div>
		</div>
	</div>
	<p class="has-text-centered">
		<button type="submit" class="button is-success is-rounded">Actualizar</button>
	</p>
</form>

	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>