<?php 
    include ("conexion.php");


    function crearUsuario($id,$identidad,$nombre,$apellidop,$apellidom,$correo,$telefono,$usuario,$rol,$area,$ciudad,$contrasena){
            $con = connection();
        
        $sql_usuario = "INSERT INTO usuario (nombre_perfil,contraseña,id_rol,id_estadou) 
        VALUES('$usuario','$contrasena','$rol',1)";

         mysqli_query($con, $sql_usuario); 

    
        if (mysqli_error($con)) {            
            die("Error en la consulta de usuario: " . mysqli_error($con));
                }
            
        $id_usuario = mysqli_insert_id($con); 
                
        if (!empty($id_usuario)) {   
            switch ($rol){
                case 1:

                    $sql = "INSERT INTO tecnico (id_tecnico,identidad,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                    VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";

                    break;
                case 2:

                    $sql = "INSERT INTO analista_inventario (id_analista_invetario,identidad,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                    VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')"; 

                    break;
                case 3:
                    
                    $sql = "INSERT INTO usuario_final (id_usuario_final,identidad,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                    VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    

                    break;
                case 4:

                    $sql = "INSERT INTO administrador (id_administrador,identidad,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                    VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    

                    break;
            }        
        }
            mysqli_query($con, $sql); 
            

        if (mysqli_error($con)) {
            die("Error en la consulta: " . mysqli_error($con));
        }
        /*Se cierra la conexion a la base de datos $conexion abierta previamente */
        mysqli_close($con);
        //Imprimir mensaje al cerrar la conexion a la base de datos
        echo"El usuario fue ingresado correctamente";
    }
