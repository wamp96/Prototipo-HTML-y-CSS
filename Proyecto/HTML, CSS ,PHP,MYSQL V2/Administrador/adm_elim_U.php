<?php
include("../conexion.php");
$con = connection();

if (isset($_GET['Id'])) {
    $idUsuario = $_GET['Id'];

    $sqlfr = "DELETE FROM fecha_registro WHERE id_usuario = $idUsuario";
    $resultfr = $con->query($sqlfr);

    $sqlUf = "DELETE FROM usuario_final WHERE id_usuario = $idUsuario";
    $resultUf = $con->query($sqlUf);


    $sqlUser = "DELETE FROM usuario WHERE id_usuario = $idUsuario";
    $resultUser = $con->query($sqlUser);

    if ($resultUf && $resultUser && $resultfr) {
        header("Location: adm_listar_I.php");
    } else {
        echo "Error al eliminar usuario.";
    }
} else {
    echo "ID de usuario no especificado.";
}

$con->close();
?>