<?php include ("cabecera_a.php"); ?>
<?php        
      include ("../function.php");

      if(isset($_POST['registrar'])){
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

        crearUsuario($id,$identidad,$nombre,$apellidop,$apellidom,$correo,$telefono,$usuario,$rol,$area,$ciudad,$contrasena);
      }

?>
        <div class="titulo_contenido">
            <h3>CREACION DE USUARIO</h3>
        </div>
        <form method="post">
        <div class="contenido d-flex bg-secondary justify-content-evenly">        
            <div class="contenido1 col-sm-5">                
                    <div class="col-form-label d-flex justify-content-between">
                        <label># IDENTIDAD :</label>
                        <input type="text" name="identidad">
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>NOMBRE :</label>  
                        <input type="text" name="nombre">
                    </div><br> 
                    <div class="col-form-label d-flex justify-content-between">
                        <label>APELLIDO PARTENO :</label>  
                        <input type="text" name="apellidop">
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>APELLIDO MATERNO :</label>  
                        <input type="text" name="apellidom">
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CORREO :</label>  
                        <input type="text" name="correo">
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>TELEFONO :</label>  
                        <input type="text" name="telefono">
                    </div><br>
            </div>
            <div class="contenido2 col-sm-5">
                    <div class="col-form-label d-flex justify-content-between">
                        <label>USUARIO :</label>
                        <input type="text" name="usuario">
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>ROL:</label> 
                        <select name="rol">
                            <option value="1">TECNICO</option>
                            <option value="2">ANALISTA INVENTARIO</option>
                            <option value="3">USUARIO</option>
                            <option value="4">ADMINISTRADOR</option>
                        </select>
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>AREA:</label>
                        <select name="area">
                            <option value="1">AUDITORIA</option>
                            <option value="2">CONTABILIDAD</option>
                            <option value="3">OFICINA</option>
                            <option value="4">DESARROLLO</option>
                            <option value="5">TECNOLOGIA</option>
                        </select>
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CIUDAD:</label>
                        <select name="ciudad" class="col-form-label">
                            <option value="1">BOGOTA</option>
                            <option value="2">MEDELLIN</option>
                            <option value="3">CALI</option>
                            <option value="4">BARRANQUILLA</option>
                        </select>
                    </div><br>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CONTRASEÑA: * </label>
                        <input type="password" name="contrasena">
                    </div><br><br>
                    <input type="submit" name="registrar" value="Registrar">                
                </div>
            </div>
        </form>
        
<?php include ("pie.php"); ?>
