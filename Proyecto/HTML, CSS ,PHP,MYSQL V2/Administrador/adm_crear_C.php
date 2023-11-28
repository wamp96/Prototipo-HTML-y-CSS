<html>
<head><title>Creacion de usuario</title></head>
<body>
    <?php
        /*Se generar variable conexion a la cual se le asigna la conexion a MYSQL a la base de datos Conexion1*/
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
        
        /*Se realiza una consulta sobre la variable conexion,se insertan datos en la tabla alumnos, en caso que no se conecte correctamente a la base de datos arroja error*/
        mysqli_query($conexion, "insert into usuario(nombre_perfil,contraseña,id_rol) values 
                    ($_REQUEST[usuario],'$_REQUEST[contrasena]','$_REQUEST[rol]')") or 
                    die ("Problemas en el select" . mysqli_error($conexion));

        if($rol == 1){
            mysqli_query($conexion, "insert into tecnico(nombre,apellidop,apellidom,correo,telefono,id_ciudad) values 
            ($_REQUEST[usuario],'$_REQUEST[contrasena]','$_REQUEST[rol]')") or 
            die ("Problemas en el select" . mysqli_error($conexion));

        }
                    


        /*Se cierra la conexion a la base de datos $conexion abierta previamente */
        mysqli_close($conexion);
        //Imprimir mensaje al cerrar la conexion a la base de datos
        echo"El usuario fue ingresado correctamente";
    ?>
</body>
<footer></footer>
</html>