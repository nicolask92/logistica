<?php


class RegistroModel
{
	private $database;

	public function __construct($database){
		$this->database = $database;
	}

	public function crearUsuario($nombre, $apellido, $email, $contrasenia, $codigo) {
		$usuario = $nombre.$apellido;
		$sql = "INSERT INTO usuario(nombre, apellido, usuario, contrasenia, email, estado, codigo) 
				VALUES('${nombre}','${apellido}', '${usuario}','${contrasenia}', '${email}', false, ${codigo})";
		$resultado = $this->database->execute($sql);

		$usuario_id = $this->obtenerIdDelUsuarioRecienCreado(); 
		$sql = "INSERT INTO empleado (usuario_id,id_rol) VALUES ('${usuario_id}',5)";
		//por defecto 5 es sinRol ya que cuando se crea un usuario nuevo este no tiene rol hasta
		//que el administrador le asigne uno
		$resultado = $this->database->execute($sql);
		return $resultado;
	}

	private function obtenerIdDelUsuarioRecienCreado(){
		$sql = "SELECT MAX(id) from usuario";
		$resultado = $this->database->execute($sql);
		$resultado = $resultado->fetch_assoc();
		return $resultado['MAX(id)'];
	}

	public function activarCuenta($email, $codigo) {
		$sqlBuscar = "SELECT * FROM usuario WHERE email = '${email}' AND codigo = ${codigo} AND estado = false";

		$resultado = $this->database->execute($sqlBuscar);

		if ($resultado) {
			$id = mysqli_fetch_assoc($resultado)['id'];
			$sqlActivar = "UPDATE usuario SET estado = true WHERE id = ${id}";
			if ($this->database->execute($sqlActivar)) {
				return true;
			}
			return false;
		}
		return false;
	}
}