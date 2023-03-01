<?php 
  
  namespace contenido\modelo;

  use contenido\configuracion\conexion\BDConexion as BDConexion;

	class clientM extends BDConexion {
		private $tipoCI;
		private $cedula;
		private $nombre;
		private $apellido;
		private $telefono;
		private $correoElectronico;

		public function __construct(){
			parent::__construct();
		}


		public function getClientes($tipoCI,$cedula, $nombre, $apellido, $telefono, $correo ){
			$this->tipoCI=$tipoCI;
			$this->cedula= $cedula;
			$this->nombre= $nombre;
			$this->apellido=$apellido;
			$this->telefono=$telefono;
			$this->correoElectronico=$correo;

			$CI=$this->tipoCI.$this->cedula;
			$this->CI=$CI;

			return $this->registrarClientes();

		}

		private function registrarClientes(){


			try{

				$new = $this->con->prepare("SELECT `cedula` FROM `clientes` WHERE `status` ='Disponible' and `cedula` = ?");
				$new->bindValue(1, $this->CI);
				$new->execute();
				$data = $new->fetchAll();


				if(!isset($data[0]["cedula"])){

				$new= $this->con->prepare("INSERT INTO `clientes`(`cedula`, `nombre`, `apellido`, `telefono`, `correoElectronico`,`status`) VALUES (?, ?, ?, ?, ?,'Disponible')");

				$new->bindValue(1,$this->CI);
				$new->bindValue(2, $this->nombre);
				$new->bindValue(3, $this->apellido);
				$new->bindValue(4, $this->telefono);
				$new->bindValue(5, $this->correoElectronico);
				$new->execute();
				return array("Good", "Exitoso");
				
				}else{
					return array("cedula",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
                      <i class=" bi bi-exclamation-triangle-fill
                       " style="font-size: 22px;"></i> La cedula <b>'.$this->cedula.'</b> se encuentra registrada.
                        <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}
				


             }
               catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
			        
			         }	
           
      }

        public function consultarClientes(){
           	try {
           			$new = $this->con->prepare("SELECT * FROM `clientes` WHERE `status`='Disponible'");
           			$new->execute();
								$data = $new->fetchAll(\PDO::FETCH_OBJ);

				        return $data;
			         }

                catch(exection $error){
                return $error;
			    
			         }
         }

       // =========================== MODIFICAR CLIENTE ========================

  					public function modificarCliente($cod, $cedula00, $nombre00, $apellido00, $tel00, $corr00){  			
              $this->codigo=$cod;
              $this->cedula=$cedula00;
              $this->nombre=$nombre00;
              $this->apellido=$apellido00;
              $this->telefono=$tel00;
              $this->correoElectronico=$corr00;

            try {
              
                $new=$this->con->prepare("UPDATE `clientes` SET `cedula`=?,`nombre`=?,`apellido`=?,`telefono`=?,`correoElectronico`=? WHERE `cedula`= '$this->codigo' ");
                 $new->bindValue(1, $this->cedula);
                 $new->bindValue(2, $this->nombre);
                 $new->bindValue(3, $this->apellido);
                 $new->bindValue(4, $this->telefono);
                 $new->bindValue(5, $this->correoElectronico);
                 $new->execute();
               }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            	}
           }

           // =========================== ANULAR CLIENTE ===========================//
     
     	public function eliminarCliente($cod){
          	$this->codigo=$cod;

           	try {
           		$new = $this->con->prepare("UPDATE `clientes` SET `status` = 'Anulado' WHERE `cedula`= '$this->codigo'");
           		$new->execute();
				
			}

                catch(exection $error){
               		return array("Sistema", "¡Error Sistema!");
			    
			   }
         

          }



//=========================== PAPELERA CLIENTES ============================== //

       public function papeleraClientes(){
           try {
              $new = $this->con->prepare("SELECT * FROM `clientes` WHERE  `status` ='Anulado'");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }


// ============================== RESTAURAR CLIENTES ===================== //


public function restaurarClientes($restaurarCL){

  $this->codigo=$restaurarCL;

    try {

      $new=$this->con->prepare("UPDATE `clientes` SET `status`='Disponible' WHERE `cedula`= '$this->codigo' ");
      $new->execute();


              
  } 

  catch(exection $error){
    return array("Sistema", "¡Error Sistema!");
              
    }
}


public function cantClientes(){
           try {
              $new = $this->con->prepare("SELECT COUNT(*) as clientes FROM `clientes` WHERE  `status` = 'Disponible' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }

}


 ?>
