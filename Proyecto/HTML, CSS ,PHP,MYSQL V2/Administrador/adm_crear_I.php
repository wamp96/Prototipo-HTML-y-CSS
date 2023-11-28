<?php include ("cabecera_a.php"); ?>
    <section class="container-fluid">
        <div class="contenido d-flex bg-secondary">
            <div class="contenido1 col-sm-6">
                <form action="adm_crear_Usuario.php" method="post">
                    <div class="col-form-label d-flex justify-content-evenly">
                        <label>DOCUMENTO IDENTIDAD :</label>
                        <input type="text" name="identidad">
                    </div>
                    <div class="col-form-label d-flex justify-content-evenly">
                        <label>NOMBRE :</label>  
                    </div>    
                    <label>APELLIDO PARTENO: <input class="col-form-label" type="text" name="apellidop"></label>
                    <label>APELLIDO MATERNO: <input class="col-form-label" type="text" name="apellidom"></label>
                    <label>CORREO: <input type="text" class="col-form-label" name="correo"></label>
                    <label>TELEFONO: <input type="text" class="col-form-label" name="telefono"></label>
                </form>
            </div>
            <div class="contenido2 col-sm-6">
                <form action="adm_crear_Usuario.php" method="post">
                    <label>USUARIO:<input type="text" class="col-form-label" name="usuario"></label>
                    <label>ROL:<select name="rol" class="col-form-label">
                            <option value="1">TECNICO</option>
                            <option value="2">ANALISTA INVENTARIO</option>
                            <option value="3">USUARIO</option>
                        </select></label>
                    <label>AREA:<select name="area" class="col-form-label">
                            <option value="1">AUDITORIA</option>
                            <option value="2">CONTABILIDAD</option>
                            <option value="3">OFICINA</option>
                            <option value="4">DESARROLLO</option>
                        </select></label>
                    <label>CIUDAD:<select name="ciudad" class="col-form-label">
                            <option value="ciudad1">BOGOTA</option>
                            <option value="ciudad2">MEDELLIN</option>
                            <option value="ciudad3">CALI</option>
                            <option value="ciudad4">BARRANQUILLA</option>
                        </select></label>
                    <label>CONTRASEÑA: <span>*</span> <input class="col-form-label" type="password" name="contrasena"></label>
                    <input type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </section>
<?php include ("pie.php"); ?>
