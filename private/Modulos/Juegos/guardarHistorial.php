<?php
    if( !empty($_POST) ){
        $id = $_POST['id'];
        $niv = $_POST['nivel'];
        $mov = $_POST['mov'];
        
        // Cambio en la conexion a la base de datos a Conexion/DB.php
        include_once('../../../Database/Conexion/DB.php');

        $check = $conexion->prepare('SELECT nivel, movimientos FROM historial_juegos WHERE id = :id AND nivel = :niv');
        $check->execute(array( ':id' => $id, ':niv' => $niv ));

        $resultado = $check->fetch(PDO::FETCH_OBJ);

        if ($resultado !== false){
            if ( $mov < $resultado->movimientos ) {
                $edit = $conexion->prepare("UPDATE historial_juegos SET movimientos = :mov WHERE id = :id AND nivel = :niv");
                $edit->execute(array( ':id' => $id, ':niv' => $niv, ':mov' => $mov ));

                #print_r($edit->errorInfo());
            }
        }
        else {
            $edit = $conexion->prepare("INSERT INTO historial_juegos (id, nivel, movimientos) VALUES (:id, :niv, :mov);");
            $edit->execute(array( ':id' => $id, ':niv' => $niv, ':mov' => $mov ));

            #print_r($edit->errorInfo());
        }
            
        $statement = $conexion->prepare('SELECT login.usuario, nivel, movimientos FROM historial_juegos INNER JOIN login ON historial_juegos.id=login.id WHERE historial_juegos.nivel = :niv ORDER BY movimientos ASC');
        
        $statement->execute(array( ':niv' => $niv ));
        #print_r($statement->errorInfo());
        
        $num = 1;
        while ($fila = $statement->fetch(PDO::FETCH_OBJ)) {
            echo '<tr><td>' . $num . '</td>';
            echo '<td>' . $fila->usuario . '</td>';
            echo '<td>' . $fila->nivel . '</td>';
            echo '<td>' . $fila->movimientos . '</td></tr>';

            $num++;
        }
    }
?>