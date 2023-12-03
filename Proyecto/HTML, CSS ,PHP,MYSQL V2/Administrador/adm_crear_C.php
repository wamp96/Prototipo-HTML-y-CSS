<?php 
    include ("conexion.php");

    $con = connection();
    $id = null;
    $identidad = isset($_POST['identidad']) ? $_POST['identidad'] : "";
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellidop = isset($_POST['apellidop']) ? $_POST['apellidop'] : "";
    $apellidom = isset($_POST['apellidom']) ? $_POST['apellidom'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
    $area = isset($_POST['area']) ? $_POST['area'] : "";
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : "";
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";



    $sql_usuario = "INSERT INTO usuario (nombre_perfil,contraseña,id_rol) 
            VALUES('$usuario','$contrasena','$rol')";

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

                $sql = "INSERT INTO analista_inventario (id_analista_invetario,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')"; 

                break;
            case 3:
                
                $sql = "INSERT INTO usuario_final (id_usuario_final,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    

                break;
            case 4:

                $sql = "INSERT INTO administrador (id_administrador,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
                VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    

                break;
        }        

        /*
        if($rol == 1){ 
            $sql = "INSERT INTO tecnico (id_tecnico,identidad,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";
        }elseif($rol == 2){
            $sql = "INSERT INTO analista_inventario (id_analista_invetario,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')"; 
                    
        }elseif($rol == 3){
            $sql = "INSERT INTO usuario_final (id_usuario_final,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    
        }
        elseif($rol == 4){
            $sql = "INSERT INTO administrador (id_administrador,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES('$id','$identidad','$nombre','$apellidop','$apellidom','$correo','$telefono','$ciudad','$id_usuario','$area')";    
        }*/
    }
        mysqli_query($con, $sql); 
        
    
    if (mysqli_error($con)) {
        die("Error en la consulta: " . mysqli_error($con));
    }
    /*Se cierra la conexion a la base de datos $conexion abierta previamente */
    mysqli_close($con);
    //Imprimir mensaje al cerrar la conexion a la base de datos
    echo"El usuario fue ingresado correctamente";
        
?>
