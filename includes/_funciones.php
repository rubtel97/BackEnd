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

		default:
		#code...
		break;
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