<?php
include("./template/cabecera.php");
include("./template/aside.php");
include("../conexion.php");

$con = connection();
?>

<div class="titulo_contenido">
    <h3>LISTADO DE USUARIO</h3>
</div>

<table class='table table-dark overflow-auto'>
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>NOMBRE_P</th>
            <th scope='col'>CONTRASEÑA</th>
            <th scope='col'>IDENTIDAD</th>
            <th scope='col'>NOMBRE COMPLETO</th>
            <th scope='col'>CORREO</th>
            <th scope='col'>TELEFONO</th>
            <th scope='col'>CIUDAD</th>
            <th scope='col'>AREA</th>
            <th scope='col'>ROL</th>
            <th scope='col'>ESTADO</th>
            <th scope='col'>ACCIONES</th>
        </tr>
    </thead>

<?php

function printUserTableRow($row) {
    echo "<tr>";
    echo "<td>{$row['id_usuario']}</td>";
    echo "<td>{$row['nombre_perfil']}</td>";
    echo "<td>{$row['contraseña']}</td>";
    echo "<td>{$row['adm_identidad']}</td>";
    echo "<td>{$row['adm_nombre']} {$row['adm_apellidop']} {$row['adm_apellidom']}</td>";
    echo "<td>{$row['adm_correo']}</td>";
    echo "<td>{$row['adm_telefono']}</td>";
    echo "<td>{$row['adm_ciudad']}</td>";
    echo "<td>{$row['adm_area']}</td>";
    echo "<td>{$row['rol']}</td>";
    echo "<td>{$row['estado_usuario']}</td>";
    echo "<td>
            <a href='adm_modif_I.php?Id={$row['id_usuario']}' class='btn btn-warning'>Editar</a>
            <a href='./adm_elim_C.php?Id=" . $row['id_usuario'] . "' class='btn btn-success'>Eliminar</a>
          </td>";
    echo "</tr>";
}

$sql = "SELECT  
        usuario.id_usuario,
        usuario.nombre_perfil,
        usuario.contraseña,
        estado_usuario.estado_usuario,
        roles.rol,
        administrador.identidad AS adm_identidad,
        administrador.nombre AS adm_nombre,
        administrador.apellidop AS adm_apellidop,
        administrador.apellidom AS adm_apellidom,
        administrador.correo AS adm_correo,
        administrador.telefono AS adm_telefono,
        ciudad.ciudad_usuario AS adm_ciudad,
        area.area_usuario AS adm_area
    FROM usuario 
    LEFT JOIN estado_usuario ON usuario.id_estadou = estado_usuario.id_estadou
    LEFT JOIN roles ON roles.id_rol = usuario.id_rol
    LEFT JOIN administrador ON usuario.id_usuario = administrador.id_usuario 
    LEFT JOIN ciudad ON administrador.id_ciudad = ciudad.id_ciudad
    LEFT JOIN area ON administrador.id_area = area.id_area
    WHERE administrador.id_usuario";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        printUserTableRow($row);
    }
} 

function printUser2TableRow($row) {
    echo "<tr>";
    echo "<td>{$row['id_usuario']}</td>";
    echo "<td>{$row['nombre_perfil']}</td>";
    echo "<td>{$row['contraseña']}</td>";
    echo "<td>" . (isset($row["tec_identidad"]) ? $row["tec_identidad"] : '') . "</td>";
    echo "<td>" . (isset($row["tec_nombre"]) ? $row["tec_nombre"] : '') ." ". (isset($row["tec_apellidop"]) ? $row["tec_apellidop"] : '') ." ". (isset($row["tec_apellidom"]) ? $row["tec_apellidom"] : '') ."</td>";
    echo "<td>". (isset($row["tec_correo"]) ? $row["tec_correo"] : '') . "</td>";
    echo "<td>" . (isset($row["tec_telefono"]) ? $row["tec_telefono"] : '') ."</td>";
    echo "<td>" . (isset($row["tec_ciudad"]) ? $row["tec_ciudad"] : '') . "</td>";
    echo "<td>" . (isset($row["tec_area"]) ? $row["tec_area"] : '') . "</td>";
    echo "<td>{$row['rol']}</td>";
    echo "<td>{$row['estado_usuario']}</td>";
    echo "<td>
            <a href='adm_modif_I.php?Id={$row['id_usuario']}' class='btn btn-warning'>Editar</a>
            <a href='adm_elim_T.php?Id={$row['id_usuario']}' class='btn btn-success'>Eliminar</a>
          </td>";
    echo "</tr>";
}

$sql = "SELECT  
        usuario.id_usuario,
        usuario.nombre_perfil,
        usuario.contraseña,
        estado_usuario.estado_usuario,
        roles.rol,
        tecnico.identidad AS tec_identidad,
        tecnico.nombre AS tec_nombre,
        tecnico.apellidop AS tec_apellidop,
        tecnico.apellidom AS tec_apellidom,
        tecnico.correo AS tec_correo,
        tecnico.telefono AS tec_telefono,
        ciudad.ciudad_usuario AS tec_ciudad,
        area.area_usuario AS tec_area
    FROM usuario 
    LEFT JOIN estado_usuario ON usuario.id_estadou = estado_usuario.id_estadou
    LEFT JOIN roles ON roles.id_rol = usuario.id_rol
    LEFT JOIN tecnico ON usuario.id_usuario = tecnico.id_usuario 
    LEFT JOIN ciudad ON tecnico.id_ciudad = ciudad.id_ciudad
    LEFT JOIN area ON tecnico.id_area = area.id_area
    WHERE tecnico.id_usuario";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        printUser2TableRow($row);
    }
}

function printUser3TableRow($row) {
    echo "<tr>";
    echo "<td>{$row['id_usuario']}</td>";
    echo "<td>{$row['nombre_perfil']}</td>";
    echo "<td>{$row['contraseña']}</td>";
    echo "<td>" . (isset($row["ainv_identidad"]) ? $row["ainv_identidad"] : '') . "</td>";
    echo "<td>" . (isset($row["ainv_nombre"]) ? $row["ainv_nombre"] : '') ." ". (isset($row["ainv_apellidop"]) ? $row["ainv_apellidop"] : '') ." ". (isset($row["ainv_apellidom"]) ? $row["ainv_apellidom"] : '') ."</td>";
    echo "<td>". (isset($row["ainv_correo"]) ? $row["ainv_correo"] : '') . "</td>";
    echo "<td>" . (isset($row["ainv_telefono"]) ? $row["ainv_telefono"] : '') ."</td>";
    echo "<td>" . (isset($row["ainv_ciudad"]) ? $row["ainv_ciudad"] : '') . "</td>";
    echo "<td>" . (isset($row["ainv_area"]) ? $row["ainv_area"] : '') . "</td>";
    echo "<td>{$row['rol']}</td>";
    echo "<td>{$row['estado_usuario']}</td>";
    echo "<td>
            <a href='adm_modif_I.php?Id={$row['id_usuario']}' class='btn btn-warning'>Editar</a>
            <a href='adm_elim_A.php?Id={$row['id_usuario']}' class='btn btn-success'>Eliminar</a>
          </td>";
    echo "</tr>";
}

$sql = "SELECT  
        usuario.id_usuario,
        usuario.nombre_perfil,
        usuario.contraseña,
        estado_usuario.estado_usuario,
        roles.rol,
        analista_inventario.identidad AS ainv_identidad,
        analista_inventario.nombre AS ainv_nombre,
        analista_inventario.apellidop AS ainv_apellidop,
        analista_inventario.apellidom AS ainv_apellidom,
        analista_inventario.correo AS ainv_correo,
        analista_inventario.telefono AS ainv_telefono,
        ciudad.ciudad_usuario AS ainv_ciudad,
        area.area_usuario AS ainv_area
    FROM usuario 
    LEFT JOIN estado_usuario ON usuario.id_estadou = estado_usuario.id_estadou
    LEFT JOIN roles ON roles.id_rol = usuario.id_rol
    LEFT JOIN analista_inventario ON usuario.id_usuario = analista_inventario.id_usuario 
    LEFT JOIN ciudad ON analista_inventario.id_ciudad = ciudad.id_ciudad
    LEFT JOIN area ON analista_inventario.id_area = area.id_area
    WHERE analista_inventario.id_usuario";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        printUser3TableRow($row);
    }
}

function printUser4TableRow($row) {
    echo "<tr>";
    echo "<td>{$row['id_usuario']}</td>";
    echo "<td>{$row['nombre_perfil']}</td>";
    echo "<td>{$row['contraseña']}</td>";
    echo "<td>" . (isset($row["ufin_identidad"]) ? $row["ufin_identidad"] : '') . "</td>";
    echo "<td>" . (isset($row["ufin_nombre"]) ? $row["ufin_nombre"] : '') ." ". (isset($row["ufin_apellidop"]) ? $row["ufin_apellidop"] : '') ." ". (isset($row["ufin_apellidom"]) ? $row["ufin_apellidom"] : '') ."</td>";
    echo "<td>". (isset($row["ufin_correo"]) ? $row["ufin_correo"] : '') . "</td>";
    echo "<td>" . (isset($row["ufin_telefono"]) ? $row["ufin_telefono"] : '') ."</td>";
    echo "<td>" . (isset($row["ufin_ciudad"]) ? $row["ufin_ciudad"] : '') . "</td>";
    echo "<td>" . (isset($row["ufin_area"]) ? $row["ufin_area"] : '') . "</td>";
    echo "<td>{$row['rol']}</td>";
    echo "<td>{$row['estado_usuario']}</td>";
    echo "<td>
            <a href='adm_modif_I.php?Id={$row['id_usuario']}' class='btn btn-warning'>Editar</a>
            <a href='adm_elim_U.php?Id={$row['id_usuario']}' class='btn btn-success'>Eliminar</a>
          </td>";
    echo "</tr>";
}

$sql = "SELECT  
        usuario.id_usuario,
        usuario.nombre_perfil,
        usuario.contraseña,
        estado_usuario.estado_usuario,
        roles.rol,
        usuario_final.identidad AS ufin_identidad,
        usuario_final.nombre AS ufin_nombre,
        usuario_final.apellidop AS ufin_apellidop,
        usuario_final.apellidom AS ufin_apellidom,
        usuario_final.correo AS ufin_correo,
        usuario_final.telefono AS ufin_telefono,
        ciudad.ciudad_usuario AS ufin_ciudad,
        area.area_usuario AS ufin_area
    FROM usuario 
    LEFT JOIN estado_usuario ON usuario.id_estadou = estado_usuario.id_estadou
    LEFT JOIN roles ON roles.id_rol = usuario.id_rol
    LEFT JOIN usuario_final ON usuario.id_usuario = usuario_final.id_usuario 
    LEFT JOIN ciudad ON usuario_final.id_ciudad = ciudad.id_ciudad
    LEFT JOIN area ON usuario_final.id_area = area.id_area
    WHERE usuario_final.id_usuario";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        printUser4TableRow($row);
    }
}
$con->close();
?>

<?php include("./template/pie.php"); ?>