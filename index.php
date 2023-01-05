<?php
    require_once "models/Cliente.php";

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])){
                echo json_encode(Cliente::getWhere($_GET['id']));                
            }//end if
            else{            
                echo json_encode(Cliente::getAll());
            }//end else
            break;

        case 'POST':                
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL){
                if(Cliente::insert($datos->nombres, $datos->apellidos, $datos->fecha_nacimiento, $datos->genero)){
                    http_response_code(200);
                    echo "La inserción ha sido exitosa.";
                }//end if
                else{
                    http_response_code(400);
                    echo "Error 400. La acción no se puede ejecutar.";
                }//end else
            }//end if
            else{
                http_response_code(405);
                echo "Error 405. Método no permitido.";
            }//end else
            break;

        case 'PUT':                
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL){
                if(Cliente::update($datos->id, $datos->nombres, $datos->apellidos, $datos->fecha_nacimiento, $datos->genero)){
                    http_response_code(200);
                    echo "La actualización ha sido exitosa.";
                }//end if
                else{
                    http_response_code(400);
                    echo "Error 400. La acción no se puede ejecutar.";
                }//end else
            }//end if
            else{
                http_response_code(405);
                echo "Error 405. Método no permitido.";
            }//end else
            break;

        case 'DELETE':
            if(isset($_GET['id'])){
                if(Cliente::delete($_GET['id'])){
                    http_response_code(200);
                    echo "La eliminación del registro ha sido exitosa.";
                }//end if
                else{
                    http_response_code(400);
                    echo "Error 400. La acción no se puede ejecutar.";
                }//end else
            }//end if
            else{
                http_response_code(405);
                echo "Error 405. Método no permitido.";
            }//end else
            break;

        default:
            break;
    }