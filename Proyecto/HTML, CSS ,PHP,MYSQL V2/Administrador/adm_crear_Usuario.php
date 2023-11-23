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
        mysqli_query($conexion, "insert into alumnos(identidad,nombre,apellidop,apellidom,correo,telefono,usuario,rol,area,ciudad,contrasena) values 
                    ($_REQUEST[identidad],'$_REQUEST[nombre]','$_REQUEST[apellidop]','$_REQUEST[apellidom]','$_REQUEST[correo]',$_REQUEST[telefono],'$_REQUEST[usuario]',$_REQUEST[rol],$_REQUEST[area],$_REQUEST[ciudad],'$_REQUEST[contrasena]')") or 
                    die ("Problemas en el select" . mysqli_error($conexion));

        /*Se cierra la conexion a la base de datos $conexion abierta previamente */
        mysqli_close($conexion);
        //Imprimir mensaje al cerrar la conexion a la base de datos
        echo"El usuario fue ingresado correctamente";
    ?>
</body>
<footer></footer>
</html>