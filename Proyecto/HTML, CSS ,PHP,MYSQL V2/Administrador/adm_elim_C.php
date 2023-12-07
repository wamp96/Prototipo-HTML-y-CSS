<?php
include("../conexion.php");
$con = connection();

if (isset($_GET['Id'])) {
    $idUsuario = $_GET['Id'];

    $sqlfr = "DELETE FROM fecha_registro WHERE id_usuario = $idUsuario";
    $resultfr = $con->query($sqlfr);

    $sqlAdm = "DELETE FROM administrador WHERE id_usuario = $idUsuario";
    $resultAdm = $con->query($sqlAdm);


    $sqlUser = "DELETE FROM usuario WHERE id_usuario = $idUsuario";
    $resultUser = $con->query($sqlUser);

    

    if ($resultAdm && $resultUser && $resultfr ) {
        header("Location: adm_listar_I.php");
    } else {
        echo "Error al eliminar usuario.";
    }
} else {
    echo "ID de usuario no especificado.";
}

$con->close();
?>