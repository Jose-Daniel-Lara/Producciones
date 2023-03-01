<?php

   namespace contenido\modelo;

   use contenido\configuracion\conexion\BDConexion as BDConexion;
     
     class eventoM extends BDConexion{


     	private $lugar;
     	private $direccion;
     	private $tipo;
     	private $evento;
     	private $tipoEvento;
     	private $lugares;
     	private $entradas;
     	private $fecha;
     	private $hora;
     	private $imagen;


     	public function __construct(){
     		parent::__construct();
     	}

//================================== LUGAR =====================================
  public function getLugar($lugar, $direccion){

     		$this->lugar=$lugar;
     		$this->direccion=$direccion;
     		$cod_lugar=rand(10000,90000);

 	        $this->cod_lugar=$cod_lugar;

 	        return $this->registrarLugar();
     	}

//================================== REGISTRAR LUGAR =====================================
  private function registrarLugar(){

			try{

				$new = $this->con->prepare("SELECT `cod_lugar`  FROM `lugar` WHERE `status` = 'Disponible' and `cod_lugar` = ?");
				$new->bindValue(1, $this->cod_lugar);
				$new->execute();
				$data = $new->fetchAll();


				if(!isset($data[0]["cod_lugar"])){
					$new = $this->con->prepare("SELECT `cod_lugar` FROM `lugar` WHERE `status` = 'Disponible'  and `lugar` = ?");
					$new->bindValue(1, $this->lugar);
					$new->execute();
					$data = $new->fetchAll();

				if(!isset($data[0]["cod_lugar"])){
					$new = $this->con->prepare("SELECT `cod_lugar` FROM `lugar` WHERE `status` ='Disponible' and `direccion` = ?");
					$new->bindValue(1, $this->direccion);
					$new->execute();
					$data = $new->fetchAll();

				if(!isset($data[0]["cod_lugar"])){

				$new= $this->con->prepare("INSERT INTO `lugar`(`cod_lugar`, `lugar`, `direccion`, `status`) VALUES ( ?, ?, ?, 'Disponible')");

				$new->bindValue(1,$this->cod_lugar);
				$new->bindValue(2, $this->lugar);
				$new->bindValue(3, $this->direccion);
				$new->execute();
				return array("Good", "Exitoso");
				}else{
             return array("direccion",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> La dirección <b>'.$this->direccion.'</b> se encuentra registrada, ingrese otra dirección.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}
			    }
			    else{
            return array("direccion",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> El lugar <b>'.$this->lugar.'</b> se encuentra registrado, ingrese otro lugar.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}
			    }

        else{
					return array("cod_lugar", "¡El codigo ya esta registrado");
				}

             }
               catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
			    
			 }	

     	}

//================================== CONSULTAR LUGAR =====================================

   public function consultarLugar(){
          	try {
           		$new = $this->con->prepare("SELECT * FROM `lugar` WHERE status='Disponible'");
           		$new->execute();
				$data = $new->fetchAll(\PDO::FETCH_OBJ);

				return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
           }

    
// ============================ MODIFICAR LUGAR ==============================

public function modificarLugar($cod, $lug, $dir){
              $this->codigo=$cod;
              $this->lugar=$lug;
              $this->direccion=$dir;

            try {
              
                $new=$this->con->prepare("UPDATE `lugar` SET `lugar`=?,`direccion`=? WHERE `cod_lugar`= '$this->codigo' ");
                $new->bindValue(1, $this->lugar);
                $new->bindValue(2, $this->direccion);
                 $new->execute();
               }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

// ============================ ANULAR LUGAR ==============================

public function AnularLugar($cod){
            $this->codigo=$cod;

            try {
              $new = $this->con->prepare("UPDATE `lugar` SET `status` ='Anulado' WHERE `cod_lugar`= '$this->codigo'");
              $new->execute();
        
      }

                catch(exection $error){
                  return array("Sistema", "¡Error Sistema!");
          
         }
         

          }


//=========================== PAPELERA LUGAR ===========================

          public function papeleraLugar(){
           try {
              $new = $this->con->prepare("SELECT * FROM `lugar` WHERE `status`= 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }

//=========================== RESTAURAR LUGAR ===========================

public function restaurarLugar($restaurarLU){

            $this->lugar=$restaurarLU;

            try {

              $new=$this->con->prepare("UPDATE `lugar` SET `status` ='Disponible' WHERE `cod_lugar`= '$this->lugar' ");
              $new->execute();

            }
            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

/////////////////////////////////////////////////////////////////////////////////////////


//================================== TIPO DE EVENTO =====================================


        public function getTipo($tipo){
        	$this->tipo=$tipo;
        	$cod_tipo=rand(10000,90000);

 	        $this->cod_tipo=$cod_tipo;

 	        return $this->registrarTipoEvento();

        }

//============================= REGISTRAR TIPO DE EVENTO =================================

  private function registrarTipoEvento(){

			try{

				$new = $this->con->prepare("SELECT `cod_tipo`  FROM `tipoEvento` WHERE `status` = 'Disponible' and `cod_tipo` = ?");
				$new->bindValue(1, $this->cod_tipo);
				$new->execute();
				$data = $new->fetchAll();


				if(!isset($data[0]["cod_tipo"])){
					$new = $this->con->prepare("SELECT `cod_tipo` FROM `tipoEvento` WHERE `status` = 'Disponible' and `tipo` = ?");
					$new->bindValue(1, $this->tipo);
					$new->execute();
					$data = $new->fetchAll();

				if(!isset($data[0]["cod_tipo"])){

				$new= $this->con->prepare("INSERT INTO `tipoEvento`(`cod_tipo`, `tipo`,`status`) VALUES ( ?, ?,'Disponible')");

				$new->bindValue(1,$this->cod_tipo);
				$new->bindValue(2, $this->tipo);
				$new->execute();
				return array("Good", "Exitoso");
				}else{
           return array("tipo",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> El tipo de Evento <b>'.$this->tipo.'</b> se encuentra registrado, ingrese otro  tipo de Evento.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
						
				}
			    }

       else{
					return array("cod_tipo", "<i class='fa-solid fa-triangle-exclamation' style='color:rgb(173, 39, 39);'></i>¡El codigo ya esta registrado");
				}

             }
               catch(exection $error){
                return array("Sistema", "<i class='fa-solid fa-triangle-exclamation' style='color:rgb(173, 39, 39);'></i>¡Error Sistema!");
			    
			 }	
        }

//============================= CONSULTAR TIPO DE EVENTO =================================

 public function consultarTipo(){
           try {
           		$new = $this->con->prepare("SELECT * FROM `tipoEvento`  WHERE `status`='Disponible'");
           		$new->execute();
				$data = $new->fetchAll(\PDO::FETCH_OBJ);

				return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
           }

// ============================ MODIFICAR TIPO DE EVENTO ============================== 

  public function modificarTipoEvento($cod, $tip){
              $this->codigo=$cod;
              $this->tipo=$tip;

            try {
              
                $new=$this->con->prepare("UPDATE `tipoevento` SET `tipo`= ? WHERE `cod_tipo`= '$this->codigo' ");
                $new->bindValue(1, $this->tipo);
                $new->execute();
               }

              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

// ============================ ANULAR TIPO DE EVENTO ==============================



public function AnularTipoEvento($cod){
            $this->codigo=$cod;

            try {
              $new = $this->con->prepare("UPDATE `tipoevento` SET `status` = 'Anulado' WHERE `cod_tipo`= '$this->codigo'");
              $new->execute();
        
      }

                catch(exection $error){
                  return array("Sistema", "¡Error Sistema!");
          
         }
         

          }


//=========================== PAPELERA TIPO EVENTO ===========================

          public function papeleraTipoEvento(){
           try {
              $new = $this->con->prepare("SELECT * FROM `tipoEvento` WHERE `status`= 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }

//=========================== RESTAURAR TIPO EVENTO ===========================

public function restaurarTipoEvento($restaurarTI){

            $this->tipoEvento=$restaurarTI;

            try {
               $new=$this->con->prepare("UPDATE `tipoevento` SET `status` = 'Disponible' WHERE `cod_tipo`= '$this->tipoEvento' ");
               $new->execute();
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }


///////////////////////////////////////////////////////////////////////////////////////

//============================= EVENTOS =================================

  public function getEvento($evento, $tipoEvento, $lugares, $entradas, $fecha, $hora, $imagen){

        date_default_timezone_set("america/caracas");
		    $hoy=date("Y/m/d");

		    if (strtotime($hoy) > strtotime($fecha)) {

           return array("errorF",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> La fecha <b>'.$fecha.'</b> ya pasó, ingrese otra fecha.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
		 	
		    }

     $dias=(strtotime($hoy )-strtotime($fecha))/86400;
     $dias=abs($dias); $dias=floor($dias);
		if (30 < $dias) {

          	$this->evento=$evento;
          	$this->tipoEvento=$tipoEvento;
          	$this->lugares=$lugares;
          	$this->entradas=$entradas;
          	$this->fecha=$fecha;
          	$this->hora=$hora;
          	$this->imagen=$imagen;

          	$codigo=rand(10000,90000);
          	$this->codigo=$codigo;

          	return $this->registrarEvento();

          }
           else{
           return array("fech",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> No se puede registrar un evento antes de 30 dias</b>.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
        }

     }
//============================= REGISTRAR EVENTOS =================================

private function registrarEvento(){

     date_default_timezone_set("america/caracas");
     $hoy=date("Y/m/d");
    
     
      try{

				$new = $this->con->prepare("SELECT `codigo`  FROM `eventos` WHERE `status` = 'Disponible' and `codigo` = ?");
				$new->bindValue(1, $this->codigo);
				$new->execute();
				$data = $new->fetchAll();


				if(!isset($data[0]["codigo"])){
					$new = $this->con->prepare("SELECT `codigo` FROM `eventos` WHERE `status` = 'Disponible'and `nombre` = ?");
					$new->bindValue(1, $this->evento);
					$new->execute();
					$data = $new->fetchAll();

				if(!isset($data[0]["codigo"])){

         
           
				$new= $this->con->prepare("INSERT INTO `eventos`(`codigo`, `nombre`, `tipoEvento`, `lugar`, `entradas`, `fecha`, `hora`,`imagen`,`status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Disponible')");

				$new->bindValue(1,$this->codigo);
				$new->bindValue(2, $this->evento);
				$new->bindValue(3, $this->tipoEvento);
				$new->bindValue(4, $this->lugares);
				$new->bindValue(5, $this->entradas);
				$new->bindValue(6, $this->fecha);
				$new->bindValue(7, $this->hora);
				if ($this->imagen!="") {
					move_uploaded_file($this->imagen, "contenido/configuracion/img/".$this->imagen);
					# code...
				}
				$new->bindValue(8, $this->imagen);
				$new->execute();
				return array("Good", "Exitoso");
				}
       

      }else{

          return array("nombre",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> El nombre del Evento <b>'.$this->evento.'</b> se encuentra registrado, ingrese otro  Evento.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}

             }
               catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
			    
			 }	


          }

//============================= CONSULTAR  EVENTOS =================================

    public function consultarEvento(){
           		try {
           		$new = $this->con->prepare("SELECT * FROM `eventos`  WHERE status!='Anulado'");
           		$new->execute();
				      $data = $new->fetchAll(\PDO::FETCH_OBJ);

				return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
           }


public function mostrar(){
              try {
              $new = $this->con->prepare("SELECT * FROM `eventos`  WHERE status='Disponible' ");
              $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);

        return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }


// ============================ MODIFICAR EVENTOS ==============================


   public function modificarEvento($cod, $nom, $tip, $lug, $ent, $fec, $hor, $img){

        date_default_timezone_set("america/caracas");
        $hoy=date("Y/m/d");

        if (strtotime($hoy) > strtotime($fec)) {

           return array("errorE",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> La fecha <b>'.$fec.'</b> ya pasó, ingrese otra fecha.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
      
        }else{
          
              $this->codigo=$cod;
              $this->evento=$nom;
              $this->tipoEvento=$tip;
              $this->lugar=$lug;
              $this->entradas=$ent;
              $this->fecha=$fec;
              $this->hora=$hor;
              $this->imagen=$img;

            try {

              $dias=(strtotime($hoy )-strtotime($this->fecha))/86400;
              $dias=abs($dias); $dias=floor($dias);
              if (30 < $dias) {
                $new=$this->con->prepare("UPDATE `eventos` SET `nombre`=?,`tipoEvento`=?,`lugar`=?,`entradas`=?,`fecha`=?,`hora`=?, `imagen`=?  WHERE `codigo`= '$this->codigo' ");
                 $new->bindValue(1, $this->evento);
                 $new->bindValue(2, $this->tipoEvento);
                 $new->bindValue(3, $this->lugares);
                 $new->bindValue(4, $this->entradas);
                 $new->bindValue(5, $this->fecha);
                 $new->bindValue(6, $this->hora);
                 $new->bindValue(7, $this->imagen);
                 $new->execute();
               }
               else{
                  return array("fech",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
                   <i class=" bi bi-exclamation-triangle-fill
                   " style="font-size: 22px;"></i> No se puede registrar un evento antes de 30 dias</b>.
                   <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
               }

            }


              catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
          }
           }

 // ================================  ANULAR EVENTOS  ================================



         
		public function AnularEvento($codigo){
          	$this->codigo=$codigo;

           	try {
           		$new = $this->con->prepare("UPDATE `eventos` SET `status` ='Anulado' WHERE `codigo`= '$this->codigo'");
           		$new->execute();
				
			}

                catch(exection $error){
               		return array("Sistema", "¡Error Sistema!");
			    
			   }
         

  }




//=========================== PAPELERA EVENTOS ===========================

          public function papeleraEvento(){
           try {
              $new = $this->con->prepare("SELECT * FROM `eventos` WHERE `status`= 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }



//=========================== RESTAURAR EVENTOS ===========================

public function restaurarEvento($restaurarE){

            $this->evento=$restaurarE;

            try {

              $new=$this->con->prepare("UPDATE `eventos` SET `status` ='Disponible' WHERE `codigo`= '$this->evento' ");
              $new->execute();
            }

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }



 //----------------------------CONTROL DE  EVENTOS------------------------------

            public function controlEventos($reporte){

            $this->codigo=$reporte;

            try {

              $new=$this->con->prepare("SELECT * FROM eventos WHERE codigo= '$this->codigo' and status='Disponible'");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);

              return $data;
              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
                   
            }


           }


//____________________________________________________________________________//
            public function cantEventos(){
           try {
              $new = $this->con->prepare("SELECT COUNT(*) as evento FROM `eventos` WHERE  `status` != 'Anulado' ");
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