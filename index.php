<!DOCTYPE html>
<html lang="es">
<head>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form action="" method="post">
		
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre">
		<input type="submit" id="btn" name="btn" value="Enviar">
	</form>
</body>
</html>

<?php 

$btn=@$_POST['btn'];
$nombre=@$_POST['nombre'];


if (isset($btn)) {

	function limpia($name){
		$name = strip_tags($name);
		$simbolos =array('?','¿','(',')','!','¡','$','%','&','/','·','1','2','3','4','5','6','7','8','9','0');
		foreach ($simbolos as $simb) {
			$name = str_replace($simb, " ", $name);
		}
		$name = trim($name);
		while (strpos($name, "  ")) {
			$name = str_replace("  ", " ",$name);
		}
		echo $name;
		var_dump($name);
		if(file_exists("datos.txt")){
			//echo "el archivo DATOS.TXT SI existe";
			$texto = @fopen("datos.txt","a");
			$nombre = "/" .$nombre;
			if ($texto) {
				fwrite($texto, $nombre);
				fclose($texto);
			}else{
				echo "operacion inválida";
			}

		}else{
			//echo "el archivo DATOS.TXT NO existe";
			$texto = @fopen("datos.txt","w");
			if ($texto) {
				fwrite($texto, limpia($nombre));
				fclose($texto);
			}

		}
	}

limpia($nombre);

echo $nombre;
}


?>