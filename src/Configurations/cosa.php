<?php

// Pruebas logisticas

//Logica de los modelos
function probando(string $tabla, array $fields= ["id","nombre", "apellido"]){
    $conexion = new mysqli("127.0.0.1","root","","citas");
    $fields_string = "";
    $fields_return = [];
    foreach($fields as $field){
        if($field != end($fields)){
            $fields_string .= $field.", "; 
        }else{
            $fields_string .= $field; 
        }
       
    }
    
    $query = $conexion->query("select $fields_string from $tabla");

   while($row = mysqli_fetch_assoc($query)){
            array_push($fields_return, $row );
   }

   return $fields_return;

}

$valores = probando('prueba');

foreach($valores as $valor){
echo $valor["id"]." ".$valor["nombre"]."<br>";
}

// Logica de los controladores

function control (array $modelos = ["id"=>1,"nombre"=>"Juan"], $id = 1){

    foreach ($modelos as $Modelo=>$id ){

    }

}

function search ( array $modeloz=["id"=>1,"nombre"=>"eduardo"], array $fields = ["nombre"], array $values = ["eduardo"]){
    $data_filtred = [];
    $num_index_field = count($fields);
    $conter = 0;
    foreach($modeloz as $modelo){
        if($conter < $num_index_field){
            if($modelo[$conter]){

            }
        }
    }
}

