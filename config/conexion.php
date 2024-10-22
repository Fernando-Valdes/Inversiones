<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                //Local
				$conectar = $this->dbh = new PDO("mysql:host=162.241.203.101;dbname=ewsanali_proyecto_admin","ewsanali_admin",'KrHbJR2$hKe&');
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        } 
        public function set_names(){
            return $this->dbh->query("SET NAMES'utf8mb4'");
        }

        public function ruta(){
            return "http://localhost/Inversiones/";
        }

    }
?>