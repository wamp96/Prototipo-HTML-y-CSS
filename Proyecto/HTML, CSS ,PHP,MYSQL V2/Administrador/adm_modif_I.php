<?php
include ("../function.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id']; 
    $identidad = $_POST['identidad'];
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    $area = $_POST['area'];
    $ciudad = $_POST['ciudad'];
    $contrasena = $_POST['contrasena'];

    editarUsuario($id, $identidad, $nombre, $apellidop, $apellidom, $correo, $telefono, $usuario, $rol, $area, $ciudad, $contrasena);
}
?>


<?php include ("./template/cabecera.php");
      include("./template/aside.php"); ?>
        <div class="titulo_contenido">
            <h3>MODIFICAR USUARIO</h3>
        </div>
        <div class="contenido_mod bg-secondary">
        <div class="cont_mod_form" >
        <form method="POST" action="../function.php">
            <label for="id">User ID:</label>
            <input type="text" name="id" value="<?=$id?>">

            <label for="identidad">Identidad:</label>
            <input type="text" name="identidad" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellidop">Apellido Paterno:</label>
            <input type="text" name="apellidop" required>

            <label for="apellidom">Apellido Materno:</label>
            <input type="text" name="apellidom" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" >

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="rol">Rol:</label>
            <select name="rol" required>
                <option value="1">Técnico</option>
                <option value="2">Analista de Inventario</option>
                <option value="3">Usuario Final</option>
                <option value="4">Administrador</option>
            </select>

            <label for="area">Área:</label>
            <input type="text" name="area" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <input type="submit" value="Guardar Cambios">
        </form>


        </div>
        </div>
<?php include ("./template/pie.php"); ?>