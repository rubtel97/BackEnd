<?php 
	require_once("_db.php");
	switch ($_POST["accion"]) {
		case 'login':
			login();
			break;
		case 'consultar_usuarios':
			consultar_usuarios();
			break;
		case 'insertar_usuarios':
			insertar_usuarios();
			break;
		case 'eliminar_registro':
			eliminar_usuarios();
			break;
		case 'editar_usuarios':
			editar_usuarios();
			break;
		case 'carga_foto':
			carga_foto();
			break;
		case 'consultar_registro':
			consultar_registro($_POST["registro"]);
			break;
		case 'eliminar_registro':
			eliminar_usuarios($_POST["registro"]);
			break;
		case 'consultar_features':
			consultar_features();
			break;
		case 'insertar_features':
			insertar_features();
			break;
		default:
		#code...
		break;
	}

	function insertar_features(){
		global $mysqli;
		$icon = $_POST['icon'];
		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];

		$sql = "INSERT INTO features VALUES ('', '$icon', '$titulo', '$texto')";
		$resultado=mysqli_query($mysqli, $sql);
	}

	function consultar_features(){
	global $mysqli;
	$consulta = "SELECT * FROM features";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

	function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../../img/usuarios/";
		$respuesta = [
			"archivo" => "../img/usuarios/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "../img/usuarios/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}

	function insertar_usuarios(){
	global $mysqli;
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$password = $_POST['password'];

		$sql = "INSERT INTO usuarios VALUES ('', '$nombre', '$correo', '$password', '$telefono', 1)";
		$resultado=mysqli_query($mysqli, $sql);
	}

	function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}	

	function editar_usuarios(){
	global $mysqli;
	extract($_POST);
	$consulta = "UPDATE usuarios SET nombre_usr =  '$nombre',correo_usr =  '$correo',password_usr =  '$password',telefono_usr =  '$telefono' WHERE id_usr = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	if($resultado){
		echo "Se editó correctamente";
	}else{
		echo "Se generó un error, intenta nuevamente";
	}
}

	function insertar_usuarios(){
	global $mysqli;
	extract($_POST);
	$consulta = "INSERT INTO usuarios VALUES('','$nombre','$correo','$password','$telefono',1)";
	$resultado = mysqli_query($mysqli, $consulta);
	if($resultado){
		echo "Se insertó correctamente";
	}else{
		echo "Se generó un error, intenta nuevamente";
	}
}
	function eliminar_usuarios($id){
	global $mysqli;
	$consulta = "DELETE FROM usuarios WHERE id_usr = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if($resultado){
		echo "Se eliminó correctamente";
	}else{
		echo "Se generó un error, intenta nuevamente";
	}
}

	function consultar_registro($id){
	global $mysqli;
	$query = "SELECT * FROM usuarios WHERE id_usr = $id LIMIT 1";
	$stmt = mysqli_query($mysqli, $query);
	$fila = mysqli_fetch_array($stmt);
	echo json_encode($fila);
}
	function login(){
		// Conectar a la base de datos
	global $mysqli;
		// Si usuario y contraseña están vacíos imprimir 3 
	$consulta = "SELECT * FROM USUARIOS WHERE correo_usr='$correo'";
	$resultado = mysqli($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	if($fila["password_usr"] == "$password" ){
	}
}
		//Consultar a la base de datyos que el usuario exista
			//si el usuario existe, consultar quie el password sea el correcto
				//Si el password es corrcto, imprimir 1
				//Si el password no es corrcto, imprimir 0
			//Si el usuario no existe, imprimir 2
		
// echo "Tu usuario es: " $_POST["usuario"]. ", Tu contraseña es: ". $_POST["password"]
?>