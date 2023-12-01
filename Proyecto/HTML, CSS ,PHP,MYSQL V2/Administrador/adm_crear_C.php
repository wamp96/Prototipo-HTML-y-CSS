<html>
<head><title>Creacion de usuario</title></head>



<?php 
    include ("conexion.php");

    $con = connection();

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
            VALUES(
                '$usuario',
                '$contrasena',
                '$rol'     
            )";
     mysqli_query($con, $sql_usuario); 
    
     
    if (mysqli_error($con)) {            
        die("Error en la consulta de usuario: " . mysqli_error($con));
            }
        
            $id_usuario = mysqli_insert_id($con); 
            
    if (!empty($id_usuario)) {       

        $nom = $nombre;
        $apep = $apellidop;
        $apem = $apellidom;
        $email = $correo;
        $tel = $telefono;


        if($rol == 1){
             
            $sql = "INSERT INTO tecnico (id_tecnico,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES(
                '$identidad',
                '$nom',
                '$apep',
                '$apem',
                '$email',
                '$tel',
                '$ciudad',
                '$id_usuario',
                '$area'
                )";
            
           
        }elseif($rol == 2){
            $sql = "INSERT INTO analista_inventario (id_analista_invetario,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES(
                '$identidad',
                '$nombre',
                '$apellidop',
                '$apellidom',
                '$correo',
                '$telefono',
                '$ciudad',
                '$id_usuario',
                '$area'
                )"; 
                    
        }elseif($rol == 3){
            $sql = "INSERT INTO usuario_final (id_usuario_final,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES(
                '$identidad',
                '$nombre',
                '$apellidop',
                '$apellidom',
                '$correo',
                '$telefono',
                '$ciudad',
                '$id_usuario',
                '$area'
                )";    
        }
        elseif($rol == 4){
            $sql = "INSERT INTO administrador (id_administrador,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) 
            VALUES(
                '$identidad',
                '$nombre',
                '$apellidop',
                '$apellidom',
                '$correo',
                '$telefono',
                '$ciudad',
                '$id_usuario',
                '$area'
                )";    
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
        
?>




    <?php
    /*
        //Se generar variable conexion a la cual se le asigna la conexion a MYSQL a la base de datos Conexion1
        $conexion = mysqli_connect(
            //SERVIDOR DE CONEXION
            "localhost",
            //USUARIO CONEXION
            "root",
            //CONTRASEÑA CONEXION 
            "",
            //BASE DE DATOS CONEXION
            "proyecto") 
            or die("Problemas de la conexión");
        
        /*Se realiza una consulta sobre la variable conexion,se insertan datos en la tabla alumnos, en caso que no se conecte correctamente a la base de datos arroja error*
        mysqli_query($conexion, "insert into usuario(nombre_perfil,contraseña,id_rol) values 
                    ($_REQUEST[usuario],'$_REQUEST[contrasena]','$_REQUEST[rol]')") or 
                    die ("Problemas en el select" . mysqli_error($conexion));

        if($rol == 1){
            mysqli_query($conexion, "insert into tecnico(id_tecnico,nombre,apellidop,apellidom,correo,telefono,id_ciudad,id_usuario,id_area) values 
            ($_REQUEST[identidad],'$_REQUEST[nombre]','$_REQUEST[apellidop]','$_REQUEST[apellidom],'$_REQUEST[correo]',$_REQUEST[telefono],$_REQUEST[ciudad],'$_REQUEST[usuario]',$_REQUEST[area])") or 
            die ("Problemas en el select" . mysqli_error($conexion));

        }
                    


        /*Se cierra la conexion a la base de datos $conexion abierta previamente *
        mysqli_close($conexion);
        //Imprimir mensaje al cerrar la conexion a la base de datos
        echo"El usuario fue ingresado correctamente";

        */
    ?>
