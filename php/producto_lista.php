<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="articulo.id_Articulo,articulo.codigo_Articulo,articulo.nombre_Articulo,articulo.precio_Articulo,articulo.stock_Articulo,articulo.foto_Articulo,articulo.id_Categoria,articulo.id_Usuario,categoria.id_Categoria,categoria.nombre_Categoria,usuario.id_Usuario,usuario.usuario_Nombre,usuario.usuario_Apellido";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM articulo INNER JOIN categoria ON articulo.id_Categoria=categoria.id_Categoria INNER JOIN usuario ON articulo.id_Usuario=usuario.id_Usuario WHERE articulo.codigo_Articulo LIKE '%$busqueda%' OR articulo.nombre_Articulo LIKE '%$busqueda%' ORDER BY articulo.nombre_Articulo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_Articulo) FROM articulo WHERE codigo_Articulo LIKE '%$busqueda%' OR nombre_Articulo LIKE '%$busqueda%'";

	}elseif($id_Categoria>0){

		$consulta_datos="SELECT $campos FROM articulo INNER JOIN categoria ON articulo.id_Categoria=categoria.id_Categoria INNER JOIN usuario ON articulo.id_Usuario=usuario.id_Usuario WHERE articulo.id_Categoria='$id_Categoria' ORDER BY articulo.nombre_Articulo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_Articulo) FROM articulo WHERE id_Categoria='$id_Categoria'";

	}else{

		$consulta_datos="SELECT $campos FROM articulo INNER JOIN categoria ON articulo.id_Categoria=categoria.id_Categoria INNER JOIN usuario ON articulo.id_Usuario=usuario.id_Usuario ORDER BY articulo.nombre_Articulo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(id_Articulo) FROM articulo";

	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<article class="media">
			        <figure class="media-left">
			            <p class="image is-64x64">';
			            if(is_file("./img/producto/".$rows['foto_Articulo'])){
			            	$tabla.='<img src="./img/producto/'.$rows['foto_Articulo'].'">';
			            }else{
			            	$tabla.='<img src="./img/producto.png">';
			            }
			   $tabla.='</p>
			        </figure>
			        <div class="media-content">
			            <div class="content">
			              <p>
			                <strong>'.$contador.' - '.$rows['nombre_Articulo'].'</strong><br>
			                <strong>CODIGO:</strong> '.$rows['codigo_Articulo'].', <strong>PRECIO:</strong> $'.$rows['precio_Articulo'].', <strong>STOCK:</strong> '.$rows['stock_Articulo'].', <strong>CATEGORIA:</strong> '.$rows['nombre_Categoria'].', <strong>REGISTRADO POR:</strong> '.$rows['usuario_Nombre'].' '.$rows['usuario_Apellido'].'
			              </p>
			            </div>
			            <div class="has-text-right">
			                <a href="index.php?vista=product_img&product_id_up='.$rows['id_Articulo'].'" class="button is-link is-focused is-light is-small">Imagen</a>
			                <a href="index.php?vista=product_update&product_id_up='.$rows['id_Articulo'].'" class="button is-success is-focused is-light is-small">Actualizar</a>
			                <a href="'.$url.$pagina.'&product_id_del='.$rows['id_Articulo'].'" class="button is-danger is-focused is-light is-small">Eliminar</a>
			            </div>
			        </div>
			    </article>

			    <hr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<p class="has-text-centered" >
					<a href="'.$url.'1" class="button is-link is-focused is-light is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
		}else{
			$tabla.='
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}