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

		function insertar_usuarios(){
		global $mysqli;
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$password = $_POST['password'];

		$sql = "INSERT INTO usuarios VALUES ('', '$nombre', '$correo', '$password', '$telefono', 1)";
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
	function eliminar_usuarios($id){
	global $mysqli;
	$consulta = "DELETE * FROM usuarios WHERE id_usr = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if($resultado){
		echo"Se elimino correctamente";
	}else{
        alert("El regstro no se ha eliminado");
      }
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