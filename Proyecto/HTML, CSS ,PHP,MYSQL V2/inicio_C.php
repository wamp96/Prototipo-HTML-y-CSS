<?php 

    include ("./Administrador/conexion.php");

    $con = connection();
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
    session_start();
    $_SESSION['usuario'] = $usuario;

    $inicio = "SELECT*FROM usuario where nombre_perfil='$usuario' and contraseña='$contrasena'";
    $inicio_res = mysqli_query($con,$inicio);

               
    if(mysqli_num_rows($inicio_res) > 0){        
        $filas=mysqli_fetch_array($inicio_res);
        if (isset($filas['id_rol'])){
            if($filas['id_rol']==1){

                header("location: ./Tecnico/index.php");

            }elseif($filas['id_rol']==2){

                header("location: ./Analista Inventario/index.php");

            }elseif($filas['id_rol']==3){

                header("location: ./Usuario Final/index.php");

            }elseif($filas['id_rol']==4){

                header("location: ./Administrador/index.php");

        }else {
            echo "No se encontraron resultados en la consulta: Rol no conocido";
        }
     
        }
    }else{
    } 



















?>