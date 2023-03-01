<?php 
  namespace contenido\modelo;

  use contenido\configuracion\conexion\BDConexion as BDConexion;
  use contenido\help\traitsImagen as traitsImagen;


class perfilM extends BDConexion{
    use traitsImagen;

    private $usuario;
    private $tipoUsuario;
    private $correo;
    private $clave;
	  private $repetirClave;
	  private $codigo;

    

	public function __construct(){
		parent::__construct();
	}

// =========================== MODIFICAR PERFIL ========================

  public function modificarPerfil($idUser, $usuario, $tipoUsuario, $correo){  			
              $this->codigo=$idUser;
              $this->usuario=$usuario;
              $this->tipoUsuario=$tipoUsuario;
              $this->correo=$correo;
              $img = $this->loadImg($_FILES, "assets/img/perfil/");
            try {
              
                $new=$this->con->prepare("UPDATE `usuarios` SET imagen=?, `usuario`=?,`tipoUsuario`=?,`correo`=? WHERE `id`= '$this->codigo' ");
                 $new->bindValue(1, $img[0]);
                 $new->bindValue(2, $this->usuario);
                 $new->bindValue(3, $this->tipoUsuario);
                 $new->bindValue(4, $this->correo);
                 $new->execute();
       
                 $perfil = $this->con->prepare("SELECT * FROM usuarios WHERE  id ='$this->codigo'"); 
                 $perfil->execute();

                 $data = $perfil->fetchAll();
                      $_SESSION['usuario']=$data[0]["usuario"];
                      $_SESSION['tipoUsuario']=$data[0]["tipoUsuario"];
                      $_SESSION['correo']=$data[0]["correo"];
                      $_SESSION['imagen']=$data[0]["imagen"];

               }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

// =========================== CAMBIAR CONTRASEÑA ========================

  public function cambiarContraseña($id, $password, $newpassword, $renewpassword){  
      
  			      $this->codigo=$id;
              $this->claveA=$password;
              $this->clave=$newpassword;
              $this->repetirClave=$renewpassword;

           try{
				$new = $this->con->prepare("SELECT clave  FROM `usuarios` WHERE id='$this->codigo'  "); 

				$new->execute();
				$data = $new->fetchAll();

				if(isset($data[0]["clave"])){
                  if($data[0]["clave"] == $this->claveA){
                  

                 $cambio=$this->con->prepare("UPDATE `usuarios` SET clave= ?, repetirClave= ? WHERE `id`= '$this->codigo' ");
                  $cambio->bindValue(1, $this->clave);
                  $cambio->bindValue(2, $this->repetirClave);
                  $cambio->execute();
                    
				   }else{
					    return "<i  class='bi bi-exclamation-triangle-fill'></i> Error: Contraseña Inválida!";
				  }
				
				}

			}catch(exection $error){
               return $error;
			}

}
}

 ?>