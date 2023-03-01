<?php 
  namespace contenido\modelo;

  use contenido\configuracion\conexion\BDConexion as BDConexion;

class ventasM extends BDConexion{
	private $metodo;
	private $cedula;
	private $evento;
	private $entrada;
	private $mesa;
	private $pago;
	private $descripcion;
	private $fechaPago;
	private $hora;
  private $codigo;
	private $moneda;
	private $cambio;

	public function __construct(){
		parent::__construct();
	}

  //---------------------------------METODO--------------------------------

	public function getMetodo($metodo){
		$this->metodo=$metodo;

		return $this->registrarMetodo();

	}

  //---------------------------------REGISTRAR METODO--------------------------------

	private function registrarMetodo(){
		
			try{

				$new = $this->con->prepare("SELECT `metodo`  FROM `metodopago` WHERE `status` = 'Disponible' and `metodo` = ?");
				$new->bindValue(1, $this->metodo);
				$new->execute();
				$data = $new->fetchAll();

				if(!isset($data[0]["metodo"])){

				$new= $this->con->prepare("INSERT INTO `metodopago`(`metodo`,`status`) VALUES(?, 'Disponible')");

				$new->bindValue(1,$this->metodo);
				$new->execute();
				return array("Good", "Exitoso");
				}

         else{
          return array("metodo",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
            <i class=" bi bi-exclamation-triangle-fill
            " style="font-size: 22px;"></i> EL Método <b>'.$this->metodo.'</b> se encuentra registrado, ingrese otro Método de pago.
            <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}

             }
               catch(exection $error){
                return array("Sistema", " <i class='fa-solid fa-triangle-exclamation' style='color:rgb(173, 39, 39);'></i> ¡Error Sistema!");
			    
			 }	
	   }
//---------------------------------CONSULTAR METODO--------------------------------

	    public function consultarMetodo(){
           
           	try {
           		$new = $this->con->prepare("SELECT * FROM `metodopago` WHERE `status`='Disponible'");
           		$new->execute();
				      $data = $new->fetchAll(\PDO::FETCH_OBJ);

				return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
         
           }
 
  //---------------------------------MODIFICAR METODO--------------------------------


            public function modificarMetodo($cod, $met){
            	$this->codigo=$cod;
              $this->metodo=$met;

           	try {
           		
           		 	$new=$this->con->prepare("UPDATE `metodopago` SET `metodo`=? WHERE `id_metodo`= '$this->codigo' ");
                $new->bindValue(1,$this->metodo);
           	    	$new->execute();
           		 }

            	catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
           		
           	}
           }

  //---------------------------------ELIMINAR METODO--------------------------------

        public function eliminarMetodo($id){

            $this->codigo=$id;

            try {

              $new=$this->con->prepare("UPDATE `metodopago` SET `status`='Anulado' WHERE `id_metodo`= '$this->codigo' ");
              $new->execute();


              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }
  
  //---------------------------------Papelera Metodo-------------------------------

       public function papeleraMetodo(){
           try {
              $new = $this->con->prepare("SELECT * FROM `metodopago` WHERE  `status` = 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }
//---------------------------------Restaurar Metodo-------------------------------
           public function restaurarMetodo($restaurarME){

            $this->codigo=$restaurarME;

            try {

              $new=$this->con->prepare("UPDATE `metodopago` SET `status`='Disponible' WHERE `id_metodo`= '$this->codigo' ");
              $new->execute();


              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

        //---------------------------------MONEDA--------------------------------

           public function getMoneda($moneda, $cambio){

          	$this->moneda=$moneda;
          	$this->cambio=$cambio;
          	return $this->registrarMoneda();

          }
       //---------------------------------REGISTRAR MONEDA--------------------------------

          private function registrarMoneda(){
          	try{

				$new = $this->con->prepare("SELECT `moneda`  FROM `moneda` WHERE `status` = 'Disponible' and `moneda` = ?");
				$new->bindValue(1, $this->moneda);
				$new->execute();
				$data = $new->fetchAll();

				if(!isset($data[0]["moneda"])){

				$new= $this->con->prepare("INSERT INTO `moneda`(`moneda`,`cambio`,`status`) VALUES(?,? ,'Disponible')");

				$new->bindValue(1,$this->moneda);
			    $new->bindValue(2,$this->cambio);
				$new->execute();
				return array("Good", "Exitoso");
				}

        else{
           return array("moneda",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
            <i class=" bi bi-exclamation-triangle-fill
            " style="font-size: 22px;"></i> La Moneda <b>'.$this->moneda.'</b> se encuentra registrada, ingrese otra moneda.
            <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				
				}

             }
               catch(exection $error){
                return array("Sistema", " <i class='fa-solid fa-triangle-exclamation' style='color:rgb(173, 39, 39);'></i> ¡Error Sistema!");
			    
			 }	

          }
        //---------------------------------CONSULTAR MONEDA--------------------------------


          public function consultarMoneda(){

           	try {
           		$new = $this->con->prepare("SELECT * FROM `moneda` WHERE `status`='Disponible'");
           		$new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);

				      return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }

          }

          //---------------------------------ELIMINAR MONEDA--------------------------------

        public function eliminarMoneda($id){

           	$this->codigo=$id;
           	try {

           		$new=$this->con->prepare("UPDATE `moneda` SET `status`='Anulado' WHERE `id`= '$this->codigo' ");
           		$new->execute();
           	} 

           	catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
           		
           	}
           }

             //---------------------------------MODIFICAR MONEDA--------------------------------


             public function modificarMoneda($codi, $mon, $camb){

              $this->codigo=$codi;
              $this->moneda=$mon;
              $this->cambio=$camb;

            try {
              
                $new=$this->con->prepare("UPDATE `moneda` SET `moneda`=? , `cambio`=? WHERE `id`= '$this->codigo' ");
                $new->bindValue(1,$this->moneda);
                $new->bindValue(2,$this->cambio);
                $new->execute();
            }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }


 //---------------------------------PAPELERA MONEDA-------------------------------

       public function papeleraMoneda(){
           try {
              $new = $this->con->prepare("SELECT * FROM `moneda` WHERE  `status` = 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }
//---------------------------------RESTAURAR MONEDA -------------------------------
           public function restaurarMoneda($restaurarMO){

            $this->codigo=$restaurarMO;

            try {

              $new=$this->con->prepare("UPDATE `moneda` SET `status`='Disponible' WHERE `id`= '$this->codigo' ");
              $new->execute();


              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

//----------------------------------------------------------------------------------------------------
 public function cantVentas(){
           try {
              $new = $this->con->prepare("SELECT COUNT(*) as venta FROM `ventas` WHERE  `status` = 'Disponible' ");
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