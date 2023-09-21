<?php

    class Conexion{
        
        public static function conexion(){
            //Se establece la conexión con la base de datos
            try{
                $conexion = new PDO ('mysql:host=localhost; dbname=prueba_duacode', 'root', '');

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conexion->exec("SET CHARACTER SET UTF8");

            }catch(Exception $e){

                die("Error" . $e->getMessage());

                echo "Linea del error" . $e->getLine();

            }

        return $conexion;
        }
    }