<?php
    require_once "conection/Conection.php";

    class Cliente {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM clientes";
            $resultado = $db->query($query);
            $datos = []; //array []
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[] = [
                       'id' => $row['id'],
                       'nombres' => $row['nombres'],
                       'apellidos' => $row['apellidos'],
                       'fecha_nacimiento' => $row['fecha_nacimiento'],
                       'genero' => $row['genero']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_cliente){
            $db = new Connection();
            $query = "SELECT * FROM clientes WHERE id=$id_cliente";
            $resultado = $db->query($query);
            $datos = []; //array []
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[] = [
                       'id' => $row['id'],
                       'nombres' => $row['nombres'],
                       'apellidos' => $row['apellidos'],
                       'fecha_nacimiento' => $row['fecha_nacimiento'],
                       'genero' => $row['genero']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($nombres, $apellidos, $fecha_nacimiento, $genero){
            $db = new Connection();
            $query = "INSERT INTO clientes (nombres, apellidos, fecha_nacimiento, genero)
            VALUES('".$nombres."', '".$apellidos."', '".$fecha_nacimiento."', '".$genero."')";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_cliente, $nombres, $apellidos, $fecha_nacimiento, $genero){
            $db = new Connection();
            $query = "UPDATE clientes SET
           nombres='".$nombres."', apellidos='".$apellidos."', fecha_nacimiento='".$fecha_nacimiento."', genero='".$genero."'
           WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_cliente){
            $db = new Connection();
            $query = "DELETE FROM clientes WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end delete
    }//end class Cliente