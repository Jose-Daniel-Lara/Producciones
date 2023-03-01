<?php 
  namespace contenido\modelo;

  use contenido\configuracion\conexion\BDConexion as BDConexion;


class mesasM extends  BDConexion{
	private $nombArea;
	private $evento;
	private $precio;
	private $posiColumna;
	private $posiFila;
	private $cantPuesto;
  private $entradas;
  private $id;
	public function __construct(){
 	parent::__construct();
 }

//---------------------------------AREAS--------------------------------

 public function getArea($nombArea){

 	 $this->nombArea=$nombArea;
 	 $cod_area=rand(10000,90000);

 	 $this->cod_area=$cod_area;

 	return  $this->registrarArea();


 }

 //---------------------------------REGISTRAR AREAS--------------------------------

 private function registrarArea(){

 	
			try{

				$new = $this->con->prepare("SELECT `cod_area`  FROM `area` WHERE `status` ='Disponible' and `cod_area` = ?");
				$new->bindValue(1, $this->cod_area);
				$new->execute();
				$data = $new->fetchAll();


				if(!isset($data[0]["cod_area"])){
					$new = $this->con->prepare("SELECT `cod_area` FROM `area` WHERE `status` = 'Disponible' and `nombArea` = ?");
					$new->bindValue(1, $this->nombArea);
					$new->execute();
					$data = $new->fetchAll();

				if(!isset($data[0]["cod_area"])){

				$new= $this->con->prepare("INSERT INTO `area`(`cod_area`, `nombArea`,`status`) VALUES ( ?, ?,'Disponible')");

				$new->bindValue(1,$this->cod_area);
				$new->bindValue(2, $this->nombArea);
				$new->execute();
				}else{

						return array("area",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> El área ya esta registrado, Ingrese otra área.
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
				}
			    }

             }
               catch(\PDOexection $error){
                return array("Sistema", "¡Error Sistema!");
			    
			 }	

 	
         }

//---------------------------------CONSULTAR AREAS--------------------------------    

        public function consultarArea(){
           try {
              $new = $this->con->prepare("SELECT * FROM `area` WHERE  `status` = 'Disponible' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }
                catch(exection $error){
                return $error;
          
         }
           }
 //---------------------------------MODIFICAR AREAS--------------------------------


            public function modificarArea($id, $nombre){

             $this->codigo=$id;
            	$this->nombArea=$nombre;

           	try {
           		
           		 	$new=$this->con->prepare("UPDATE `area` SET `nombArea`=? WHERE `cod_area`= '$this->codigo' ");
                  $new->bindValue(1, $this->nombArea);
           	    	$new->execute();
           		 }

            	catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
           		
           	}
           }

//---------------------------------ELIMINAR AREAS--------------------------------

            public function eliminarArea($cod){

           	$this->codigo=$cod;
           	try {

           		$new=$this->con->prepare("UPDATE `area` SET `status`='Anulado' WHERE `cod_area`= '$this->codigo' ");
           		$new->execute();


           		
           	} 

           	catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
           		
           	}
           }
 //------------------------------PAPELERA AREAS-----------------------------

       public function papeleraArea(){
           try {
              $new = $this->con->prepare("SELECT * FROM `area` WHERE  `status` = 'Anulado' ");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }
//------------------------------RESTAURAR AREAS----------------------------

           public function restaurarArea( $nombre){

            $this->cod_area=$nombre;

            try {
                 $new=$this->con->prepare("UPDATE `area` SET `status`='Disponible' WHERE `cod_area`= '$this->cod_area'  ");
                $new->execute();
              }

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

//--------------------------------- MESAS --------------------------------
          

          
    public function getMesas($evento, $area, $precio, $posiColumna, $posiFila, $cantPuesto){
 	  $this->evento=$evento;
    $this->nombArea=$area;
    $this->precio=$precio;
    $this->posiColumna=$posiColumna;
    $this->posiFila=$posiFila;
    $this->cantPuesto=$cantPuesto;
    
    return $this->registrarMesa();


 }

//-----------------------------REGISTRAR MESAS------------------------------
 private function registrarMesa(){

    try{

        $puestos = $this->con->prepare("SELECT SUM(cantPuesto) as puestos FROM mesas WHERE `status` = 'Disponible' and evento = ?");
        $puestos->bindValue(1, $this->evento);
        $puestos->execute();
        $suma = $puestos->fetchAll();

        $evento = $this->con->prepare("SELECT entradas FROM eventos WHERE `status` = 'Disponible' and nombre = ?");
        $evento->bindValue(1, $this->evento);
        $evento->execute();
        $entradas = $evento->fetchAll();

        if ($entradas[0]['entradas'] <= $suma[0]['puestos']) {
         $ocultar = $this->con->prepare("UPDATE `eventos` SET `status`='Ocupado' WHERE `nombre` = ? ");
          $ocultar->bindValue(1, $this->evento);
          $ocultar->execute();

          return array("evento",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> El Evento <b>'.$this->evento.'</b> no esta disponible para las mesas
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
        }else{
        
        $cal= ($entradas[0]['entradas'])-($suma[0]['puestos']);

        if( $this->cantPuesto <= $cal){

        $new = $this->con->prepare("SELECT posiColumna, posiFila FROM mesas WHERE `status` = 'Disponible' and posiColumna = ? and posiFila = ? ");
        $new->bindValue(1, $this->posiColumna);
        $new->bindValue(2, $this->posiFila);
        $new->execute();
        $data = $new->fetchAll();

        if(!isset($data[0]["posiColumna"]) && !isset($data[0]["posiColumna"])){

        $new= $this->con->prepare("INSERT INTO `mesas`(`evento`,`area`,`precio`,`posiColumna`, `posiFila`,`cantPuesto`,`status`) VALUES (?, ?, ?, ?, ?, ?, 'Disponible')");
        $new->bindValue(1, $this->evento);
        $new->bindValue(2, $this->nombArea);
        $new->bindValue(3, $this->precio);
        $new->bindValue(4, $this->posiColumna);
        $new->bindValue(5, $this->posiFila);
        $new->bindValue(6, $this->cantPuesto);
        $new->execute();
        $id=$this->con->lastInsertId();
        $num_elementos=0;
        $sw=true;

      while ($num_elementos < $this->cantPuesto) {

        echo $this->registrarEntradas($id) or $sw=false;

        $num_elementos=$num_elementos+1;
         
       }
        return $sw;
      }
        else{
            return array("posicion",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> La Posicion <b>C'.$data[0]["posiColumna"]."-F".$data[0]["posiFila"].'</b> ya está registrado, ingrese otra posición
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
        
        }
      }else{
        return array("entradas",'<div class="alert alert-dismissible alerta col-md-7 fade show mt-3 shadow " role="alert">
              <i class=" bi bi-exclamation-triangle-fill
              " style="font-size: 22px;"></i> solamente quedan <b>'.$cal.'</b> entradas disponibles para las mesas
              <button type="button" class="btn-close X" data-bs-dismiss="alert" aria-label="Close"></button </div>');
      }
      }
    }
          catch(\PDOexection $error){
                return array("Sistema", "¡Error Sistema!");
			 }	
           
 }


//-----------------------------REGISTRAR ENTRADAS------------------------------
 public function registrarEntradas($id){

  $this->id=$id;
  $codigo=rand(10000,90000);
  $this->codigo=$codigo;
    try{

        $new= $this->con->prepare("INSERT INTO `entradas`(`codigo`,`numMesa`,`status`) VALUES (?, ?, 'Disponible')");
        $new->bindValue(1,$this->codigo);
        $new->bindValue(2, $this->id);
        $new->execute();
         
      }
               catch(\PDOexection $error){
                return array("Sistema", "¡Error Sistema!");
       }  
           
 }


 //------------------------CONSULTAR  MESAS------------------------------

           public function consultarMesa(){
           		try {
           		$new = $this->con->prepare("SELECT * FROM mesas m  INNER JOIN eventos e ON m.evento=e.nombre WHERE m.status= 'Disponible'");
           		$new->execute();
			      	$data = $new->fetchAll(\PDO::FETCH_OBJ);

				      return $data;
			}

                catch(exection $error){
                return $error;
			    
			   }
           }

//---------------------------MODIFICAR  MESAS--------------------------------

            
           public function modificarMesa($cod, $event, $ar, $pre, $pColumna, $pFila, $cPuesto){ 
            $this->codigo=$cod;
            $this->evento=$event;
            $this->nombArea=$ar;
            $this->precio=$pre;
            $this->posiColumna=$pColumna;
            $this->posiFila=$pFila;
            $this->cantPuesto=$cPuesto;

            try {

               $consultar=$this->con->prepare("SELECT * FROM mesas m INNER JOIN entradas e ON m.id_mesa=e.numMesa WHERE m.id_mesa=' $this->codigo'");
               $consultar->execute();
               $data=$consultar->fetchAll();

             if (isset($data[0]['id_mesa'])) {

                  $eliminar=$this->con->prepare("DELETE FROM entradas WHERE numMesa='$this->codigo'");
                  $eliminar->execute();


              $new=$this->con->prepare("UPDATE `mesas` SET `evento`= ?, `area`= ?, `precio`=?, `posiColumna`=?, `posiFila`= ? , cantPuesto= ? WHERE `id_mesa`= '$this->codigo' ");
              $new->bindValue(1, $this->evento);
              $new->bindValue(2, $this->nombArea);
              $new->bindValue(3, $this->precio);
              $new->bindValue(4, $this->posiColumna);
              $new->bindValue(5, $this->posiFila);
              $new->bindValue(6, $this->cantPuesto);
              $new->execute();
              $id=$this->codigo;
              $num_elementos=0;
              $sw=true;

              while ($num_elementos < $this->cantPuesto) {

                  echo $this->registrarEntradas($id) or $sw=false;

                  $num_elementos=$num_elementos+1;
         
              }

              return $sw;


              }
              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }

           }



 //----------------------------ELIMINAR  MESAS------------------------------

            
           public function eliminarMesa($codigo){

           	$this->codigo=$codigo;

           	try {

           		$new=$this->con->prepare("UPDATE `mesas` SET `status`='Anulado' WHERE `id_mesa`= '$this->codigo' ");
           		$new->execute();

              $new2=$this->con->prepare("UPDATE `entradas` SET `status`='Anulado' WHERE `numMesa`= '$this->codigo' ");
              $new2->execute();
           		
           	} 

           	catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
           		
           	}


           }
//--------------------------PAPELERA MESAS-------------------------------

       public function papeleraMesas(){
           try {
              $new = $this->con->prepare("SELECT * FROM `mesas` WHERE  `status` ='Anulado'");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);
              return $data;
      }

                catch(exection $error){
                return $error;
          
         }
           }
//--------------------------RESTAURAR MESAS-----------------------------
           public function restaurarMesas($restaurarME){

            $this->codigo=$restaurarME;

            try {

              $new=$this->con->prepare("UPDATE `mesas` SET `status`='Disponible' WHERE `id_mesa`= '$this->codigo' ");
              $new->execute();

              $new=$this->con->prepare("UPDATE `entradas` SET `status`='Disponible' WHERE `numMesa`= '$this->codigo' ");
              $new->execute();
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
              
            }
           }

 //----------------------------CONTROL  MESAS------------------------------

            public function controlMesa($reporte){

            $this->codigo=$reporte;

            try {

              $new=$this->con->prepare("SELECT * FROM eventos e INNER JOIN mesas m  ON e.nombre=m.evento WHERE e.nombre= '$this->codigo'");
              $new->execute();
              $data = $new->fetchAll(\PDO::FETCH_OBJ);

              return $data;
              
            } 

            catch(exection $error){
                return array("Sistema", "¡Error Sistema!");
                   
            }


           }

//----------------------------REPORTAR  PDF------------------------------
}

?>
