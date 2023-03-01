<?php

	namespace contenido\help;

	trait traitsImagen{

		
		private $rutaDelete = "";
		private $rutaAdd = "";
		private $nombreImagen = "";


		public function deleteImagen($ruta){
			try{
				if(unlink($ruta)){
					return true;
				}else{
					return false;
				}
			}catch(Exception $e){
				return true;
			}

		}

		public function loadImg($file_, $ruta){
			$this->rutaAdd = $ruta;
			$names = array();
			$i = 0;
			foreach ($file_ as $key => $value) {
				$date = date('m/d/Yh:i:sa', time());
				$rand=rand(10000,99999);
				$encname=$date.$rand;
				$bannername=md5($encname).'.png';
		        if(move_uploaded_file($value["tmp_name"], $this->rutaAdd.$bannername)){
		            $names[$i] = $this->rutaAdd.$bannername;
		            $i++;
		        }
			}
			return $names;
		}

	}


?>
              
				