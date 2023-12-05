<?php include ("./template/cabecera.php");
      include("./template/aside.php"); ?>
        <div class="titulo_contenido">
            <h3>LISTADO DE USUARIO</h3>
        </div>
        <div class="contenido_listar">

        </div>

<?php
    include ("../conexion.php");

    $identidad = isset($row['identidad']) ? $row['identidad'] : "";
    $identidad = isset($row['identidad']) ? $row['identidad'] : "";
    $nombre = isset($row['nombre']) ? $row['nombre'] : "";
    $apellidop = isset($row['apellidop']) ? $row['apellidop'] : "";
    $apellidom = isset($row['apellidom']) ? $row['apellidom'] : "";
    $correo = isset($row['correo']) ? $row['correo'] : "";
    $telefono = isset($row['telefono']) ? $row['telefono'] : "";
    $usuario = isset($row['usuario']) ? $row['usuario'] : "";
    $rol = isset($row['rol']) ? $row['rol'] : "";
    $area = isset($row['area']) ? $row['area'] : "";
    $ciudad = isset($row['ciudad']) ? $row['ciudad'] : "";
    $contrasena = isset($row['contrasena']) ? $row['contrasena'] : "";



    $con = connection();

    $sql= "SELECT  
                usuario.id_usuario,
                usuario.nombre_perfil,
                usuario.contraseña,
                roles.rol,
                estado_usuario.estado_usuario,
                    
                administrador.identidad AS adm_identidad,
                administrador.nombre AS adm_nombre,
                administrador.apellidop AS adm_apellidop,
                administrador.apellidom AS adm_apellidom,
                administrador.correo AS adm_correo,
                administrador.telefono AS adm_telefono,
                (SELECT ciudad.ciudad_usuario FROM ciudad WHERE ciudad.id_ciudad = administrador.id_ciudad) AS adm_ciudad,
                (SELECT area.area_usuario FROM area WHERE area.id_area = administrador.id_area) AS adm_area,
                    
                tecnico.identidad AS tec_identidad,
                tecnico.nombre AS tec_nombre,
                tecnico.apellidop AS tec_apellidop,
                tecnico.apellidom AS tec_apellidom,
                tecnico.correo AS tec_correo,
                tecnico.telefono AS tec_telefono,
                (SELECT ciudad.ciudad_usuario FROM ciudad WHERE ciudad.id_ciudad = tecnico.id_ciudad) AS tec_ciudad,
                (SELECT area.area_usuario FROM area WHERE area.id_area = tecnico.id_area) AS tec_area,


                usuario_final.identidad AS ufin_identidad,
                usuario_final.nombre AS ufin_nombre,
                usuario_final.apellidop AS ufin_apellidop,
                usuario_final.apellidom AS ufin_apellidom,
                usuario_final.correo AS ufin_correo,
                usuario_final.telefono AS ufin_telefono,
                (SELECT ciudad.ciudad_usuario FROM ciudad WHERE ciudad.id_ciudad = usuario_final.id_ciudad) AS ufin_ciudad,
                (SELECT area.area_usuario FROM area WHERE area.id_area = usuario_final.id_area) AS ufin_area,


                analista_inventario.identidad AS ainv_identidad,
                analista_inventario.nombre AS ainv_nombre,
                analista_inventario.apellidop AS ainv_apellidop,
                analista_inventario.apellidom AS ainv_apellidom,
                analista_inventario.correo AS ainv_correo,
                analista_inventario.telefono AS ainv_telefono,
                (SELECT ciudad.ciudad_usuario FROM ciudad WHERE ciudad.id_ciudad = analista_inventario.id_ciudad) AS ainv_ciudad,
                (SELECT area.area_usuario FROM area WHERE area.id_area = analista_inventario.id_area) AS ainv_area
                
            FROM usuario 
            LEFT JOIN estado_usuario ON usuario.id_estadou = estado_usuario.id_estadou
            LEFT JOIN roles ON usuario.id_rol = roles.id_rol
            LEFT JOIN administrador ON usuario.id_usuario = administrador.id_usuario 
            LEFT JOIN tecnico  ON usuario.id_usuario = tecnico.id_usuario 
            LEFT JOIN usuario_final  ON usuario.id_usuario = usuario_final.id_usuario
            LEFT JOIN analista_inventario ON usuario.id_usuario = analista_inventario.id_usuario";
                

    $result = $con->query($sql);

    if ($result->num_rows >0){
        echo "<table class='table table-dark'>
            <caption>Usuarios</caption>
            <thead>
                    <tr>
                        <th scope='col'>ID_USUARIO</th>
                        <th scope='col'>NOMBRE_P</th>
                        <th scope='col'>IDENTIDAD</th>
                        <th scope='col'>NOMBRE COMPLETO</th>
                        <th scope='col'>CORREO</th>
                        <th scope='col'>TELEFONO</th>
                        <th scope='col'>CIUDAD</th>
                        <th scope='col'>AREA</th>
                        <th scope='col'>ROL</th>
                        <th scope='col'>ESTADO</th>
                        
                    </tr>
            </thead>";
            while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . (isset($row["id_usuario"]) ? $row["id_usuario"] : '') . "</td>
                    <td>" . (isset($row["nombre_perfil"]) ? $row["nombre_perfil"] : '') . "</td>
                    <td>" . (isset($row["adm_identidad"]) ? $row["adm_identidad"] : '') . "</td>
                    <td>" . (isset($row["adm_nombre"]) ? $row["adm_nombre"] : '') . (isset($row["tec_apellidop"]) ? $row["tec_apellidop"] : '') . (isset($row["tec_apellidom"]) ? $row["tec_apellidom"] : '') ."</td>
                    <td>" . (isset($row["adm_correo"]) ? $row["adm_correo"] : '') . "</td>
                    <td>" . (isset($row["adm_telefono"]) ? $row["adm_telefono"] : '') . "</td>
                    <td>" . (isset($row["adm_ciudad"]) ? $row["adm_ciudad"] : '') . "</td>
                    <td>" . (isset($row["adm_area"]) ? $row["adm_area"] : '') . "</td>
                    <td>" . (isset($row["rol"]) ? $row["rol"] : '') . "</td>
                    <td>" . (isset($row["estado_usuario"]) ? $row["estado_usuario"] : '') . "</td>
                </tr>
                <tr>
                    <td>" . (isset($row["id_usuario"]) ? $row["id_usuario"] : '') . "</td>
                    <td>" . (isset($row["nombre_perfil"]) ? $row["nombre_perfil"] : '') . "</td>
                    <td>" . (isset($row["tec_identidad"]) ? $row["tec_identidad"] : '') . "</td>
                    <td>" . (isset($row["tec_nombre"]) ? $row["tec_nombre"] : '') . (isset($row["adm_apellidop"]) ? $row["adm_apellidop"] : '') . (isset($row["ainv_apellidom"]) ? $row["ainv_apellidom"] : '') ."</td>
                    <td>" . (isset($row["tec_correo"]) ? $row["tec_correo"] : '') . "</td>
                    <td>" . (isset($row["tec_telefono"]) ? $row["tec_telefono"] : '') . "</td>
                    <td>" . (isset($row["tec_ciudad"]) ? $row["tec_ciudad"] : '') . "</td>
                    <td>" . (isset($row["tec_area"]) ? $row["tec_area"] : '') . "</td>
                    <td>" . (isset($row["rol"]) ? $row["rol"] : '') . "</td>
                    <td>" . (isset($row["estado_usuario"]) ? $row["estado_usuario"] : '') . "</td>
                </tr>
                <tr>
                    <td>" . (isset($row["id_usuario"]) ? $row["id_usuario"] : '') . "</td>
                    <td>" . (isset($row["nombre_perfil"]) ? $row["nombre_perfil"] : '') . "</td>
                    <td>" . (isset($row["ufin_identidad"]) ? $row["ufin_identidad"] : '') . "</td>
                    <td>" . (isset($row["ufin_nombre"]) ? $row["ufin_nombre"] : '') . (isset($row["ufin_apellidop"]) ? $row["ufin_apellidop"] : '') . (isset($row["ufin_apellidom"]) ? $row["ufin_apellidom"] : '') ."</td>
                    <td>" . (isset($row["ufin_correo"]) ? $row["ufin_correo"] : '') . "</td>
                    <td>" . (isset($row["ufin_telefono"]) ? $row["ufin_telefono"] : '') . "</td>
                    <td>" . (isset($row["ufin_ciudad"]) ? $row["ufin_ciudad"] : '') . "</td>
                    <td>" . (isset($row["ufin_area"]) ? $row["ufin_area"] : '') . "</td>
                    <td>" . (isset($row["rol"]) ? $row["rol"] : '') . "</td>
                    <td>" . (isset($row["estado_usuario"]) ? $row["estado_usuario"] : '') . "</td>
                </tr>
                <tr>
                    <td>" . (isset($row["id_usuario"]) ? $row["id_usuario"] : '') . "</td>
                    <td>" . (isset($row["nombre_perfil"]) ? $row["nombre_perfil"] : '') . "</td>
                    <td>" . (isset($row["ainv_identidad"]) ? $row["ainv_identidad"] : '') . "</td>
                    <td>" . (isset($row["ainv_nombre"]) ? $row["ainv_nombre"] : '') . (isset($row["ainv_apellidop"]) ? $row["ainv_apellidop"] : '') . (isset($row["ainv_apellidom"]) ? $row["ainv_apellidom"] : '') ."</td>
                    <td>" . (isset($row["ainv_correo"]) ? $row["ainv_correo"] : '') . "</td>
                    <td>" . (isset($row["ainv_correo"]) ? $row["ainv_correo"] : '') . "</td>
                    <td>" . (isset($row["ainv_ciudad"]) ? $row["ainv_ciudad"] : '') . "</td>
                    <td>" . (isset($row["ainv_area"]) ? $row["ainv_area"] : '') . "</td>
                    <td>" . (isset($row["rol"]) ? $row["rol"] : '') . "</td>
                    <td>" . (isset($row["estado_usuario"]) ? $row["estado_usuario"] : '') . "</td>
                </tr>
                
                ";
    }

        echo "</table>";
    }else {
        echo "No hay usuarios registrados.";
    }

    $con->close();

?>        
<?php include ("./template/pie.php"); ?> 















                




           