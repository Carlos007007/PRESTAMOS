<?php
	
	require_once "mainModel.php";

	class loginModelo extends mainModel{

		/*--------- Modelo iniciar sesion ---------*/
		protected static function iniciar_sesion_modelo($datos){
			$sql=mainModel::conectar()->prepare("SELECT * FROM usuario WHERE usuario_usuario=:Usuario AND usuario_clave=:Clave AND usuario_estado='Activa'");
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->execute();
			return $sql;
		}
	}