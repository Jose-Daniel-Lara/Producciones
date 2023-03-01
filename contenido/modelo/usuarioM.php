<?php 
  namespace contenido\modelo;

  use contenido\configuracion\conexion\BDConexion as BDConexion;


class usuarioM extends BDConexion{

    private $usuario;
    private $tipoUsuario;
    private $correo;
    private $clave;
	private $repetirClave;
	private $imagen;

	public function __construct(){
		parent::__construct();
	}


// =========================== USUARIO ========================

	public function getRegistrar($usuario, $tipoUsuario,$correo,$imagen ,$clave, $repetirClave ){
		
		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $usuario)){
			return "Error!";
		};
 
		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $clave)){
			return "Error!";
		};

		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $repetirClave)){
			return "Error!";
		};


		$this->usuario = $usuario;
		$this->tipoUsuario = $tipoUsuario;
		$this->correo = $correo;
		$this->imagen = $imagen;
		$this->clave = $clave;
		$this->repetirClave = $repetirClave;

		return $this->registrarUsuario();

	}
// =========================== Registrar USUARIO ========================

	private function registrarUsuario(){
		
		try{
			    $new = $this->con->prepare("SELECT `usuario` FROM `usuarios` WHERE `status` ='Disponible' and `usuario` = ?");
				$new->bindValue(1, $this->usuario);
				$new->execute();
				$data = $new->fetchAll();

				if(!isset($data[0]["usuario"])){
					$new = $this->con->prepare("SELECT `usuario` FROM `usuarios` WHERE `status` = 'Disponible'  and `correo` = ?");
					$new->bindValue(1, $this->correo);
					$new->execute();
					$data = $new->fetchAll();

					if(!isset($data[0]["usuario"])){
				$new = $this->con->prepare("INSERT INTO `usuarios`(imagen,`usuario`, `tipoUsuario`, `correo`, `clave`, `repetirClave`,`status`) VALUES (?,?, ?, ?, ?, ?, 'Disponible' )"); 
				$new->bindValue(1, $this->imagen);
				$new->bindValue(2, $this->usuario);
				$new->bindValue(3, $this->tipoUsuario);
				$new->bindValue(4, $this->correo);
				$new->bindValue(5, $this->clave);
				$new->bindValue(6, $this->repetirClave);
				$new->execute();
				$data = $new->fetchAll();

		 		if(!$data){
                  echo "";
               }
               }

			    else{
			    	 return array("correo",'<div class="alert alert-dismissible alerta col fade show  shadow " role="alert">
                      <i class=" bi bi-exclamation-triangle-fill
                     " style="font-size: 22px;"></i> El  <b>'.$this->correo.'</b> se encuentra registrado, ingrese otro Correo Electrónico.
                         <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
					
				}
			    }
                else{
						 return array("usuario",'<div class="alert alert-dismissible alerta col fade show shadow " role="alert">
                            <i class=" bi bi-exclamation-triangle-fill
                             " style="font-size: 22px;"></i> El Usuario <b>'.$this->usuario.'</b> se encuentra registrado, ingrese otro Nombre.
                              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}

			    }catch(exection $error){
                 return array("Sistema", "¡Error Sistema!");;
			}
	}



// =========================== INGRESAR AL SISTEMA ========================

  	public function getUsuarioSistema($usuario, $clave){
		
		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $usuario)){
			return "Error!";
		};

		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $clave)){
			return "Error!";
		};

		$this->usuario = $usuario;
		$this->clave = $clave;

		return $this->usuarioSistema();

	}

	private function usuarioSistema(){
		try{
				$new = $this->con->prepare("SELECT id , imagen, `usuario`,`tipoUsuario`, correo,`clave` FROM `usuarios` WHERE `status` = 'Disponible'  and `usuario` = ?"); 
				$new->bindValue(1 , $this->usuario);
				$new->execute();
				$data = $new->fetchAll();

				if(isset($data[0]["clave"])){
                  if($data[0]["clave"] == $this->clave){
                      session_start();
                      $_SESSION['idusuario']=$data[0]["id"];
                      $_SESSION['usuario']=$data[0]["usuario"];
                      $_SESSION['tipoUsuario']=$data[0]["tipoUsuario"];
                      $_SESSION['correo']=$data[0]["correo"];
                      $_SESSION['imagen']=$data[0]["imagen"];
                      $_SESSION['clave']=$data[0]["clave"];
                      $_SESSION['time'] = time();

                      if (isset( $_SESSION['tipoUsuario'])) {
                         if ($_SESSION['tipoUsuario']=='Administrador') {
                         	 die("<script>location='?url=home'</script>");
                         }
                         elseif ($_SESSION['tipoUsuario']=='Encargado') {
                         	 die("<script>location='?url=registros'</script>");
                         }
                      }

				   }else{
					    return "<i  class='bi bi-exclamation-triangle-fill'></i> Error: Contraseña Inválida!";
				  }
				}else{
					return "<i  class='bi bi-exclamation-triangle-fill'></i> Error: El usuario no existe!";
				}
				

			}catch(exection $error){
               return $error;
			}
	}

// =========================== CONSULTAR USUARIO ========================


	public function consultarUsuarios(){
			try {
           		$new = $this->con->prepare("SELECT * FROM `usuarios` WHERE status='Disponible' ");
           		$new->execute();
				$data = $new->fetchAll(\PDO::FETCH_OBJ);

				return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
         
	}

// =========================== MODIFICAR USUARIO ========================

  public function modificarUsuario($cod,$user, $tUser, $email,$img, $cla, $rCla){  			
              $this->codigo=$cod;
              $this->usuario=$user;
              $this->tipoUsuario=$tUser;
              $this->correo=$email;
              $this->imagen = $img;
              $this->clave=$cla;
              $this->repetirClave=$rCla;

            try {
              
                $new=$this->con->prepare("UPDATE `usuarios` SET imagen= ?, `usuario`=?,`tipoUsuario`=?,`correo`=?,`clave`=?,`repetirClave`=? WHERE `id`='$this->codigo'");
                $new->bindValue(1, $this->imagen);
				$new->bindValue(2, $this->usuario);
				$new->bindValue(3, $this->tipoUsuario);
				$new->bindValue(4, $this->correo);
				$new->bindValue(5, $this->clave);
				$new->bindValue(6, $this->repetirClave);
                 $new->execute();
               }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }


 // ============================ ANULAR USUARIO =========================

	public function EliminarUsuario($cod){
          	$this->codigo=$cod;

           	try {
           		$new = $this->con->prepare("UPDATE `usuarios` SET `status` = 'Anulado' WHERE `id`= '$this->codigo'");
           		$new->execute();
				
			}

                catch(exection $error){
               		return array("Sistema", "¡Error Sistema!");
			    
			   }
         

          }




//=========================== PAPELERA DE USUARIOS ============================== //

       public function papeleraUsuarios(){
           try {
              $new = $this->con->prepare("SELECT * FROM `usuarios` WHERE  `status` = 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }


// ============================== RESTAURAR USUARIOS ===================== //


public function restaurarUsuario($restaurarU){

  $this->usuario=$restaurarU;

    try {

      $new=$this->con->prepare("UPDATE `usuarios` SET `status`='Disponible' WHERE `id`= '$this->usuario' ");
      $new->execute();
              
  } 

  catch(exection $error){
    return array("Sistema", "¡Error Sistema!");
              
    }

}
}


 ?>