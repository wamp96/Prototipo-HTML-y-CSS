<?php include ("cabecera_a.php"); ?>
    <section class="container-fluid">
        <div class="contenido d-flex bg-secondary">
            <div class="contenido1 col-sm-6">
                <form action="adm_crear_C.php" method="post">
                    <div class="col-form-label d-flex justify-content-between">
                        <label># IDENTIDAD :</label>
                        <input type="text" name="identidad">
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>NOMBRE :</label>  
                        <input type="text" name="nombre">
                    </div> 
                    <div class="col-form-label d-flex justify-content-between">
                        <label>APELLIDO PARTENO :</label>  
                        <input type="text" name="apellidop">
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>APELLIDO MATERNO :</label>  
                        <input type="text" name="apellidom">
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CORREO :</label>  
                        <input type="text" name="correo">
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>TELEFONO :</label>  
                        <input type="text" name="telefono">
                    </div>
                </form>
            </div>
            <div class="contenido2 col-sm-6">
                <form action="adm_crear_C.php" method="post">
                    <div class="col-form-label d-flex justify-content-between">
                        <label>USUARIO :</label>
                        <input type="text" name="usuario">
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>ROL:</label> 
                        <select name="rol">
                            <option value="1">TECNICO</option>
                            <option value="2">ANALISTA INVENTARIO</option>
                            <option value="3">USUARIO</option>
                        </select>
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>AREA:</label>
                        <select name="area">
                            <option value="1">AUDITORIA</option>
                            <option value="2">CONTABILIDAD       </option>
                            <option value="3">OFICINA</option>
                            <option value="4">DESARROLLO</option>
                            <option value="5">TECNOLOGIA</option>
                        </select>
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CIUDAD:</label>
                        <select name="ciudad" class="col-form-label">
                            <option value="1">BOGOTA</option>
                            <option value="2">MEDELLIN</option>
                            <option value="3">CALI</option>
                            <option value="4">BARRANQUILLA</option>
                        </select>
                    </div>
                    <div class="col-form-label d-flex justify-content-between">
                        <label>CONTRASEÑA: * </label>
                        <input type="password" name="contrasena">
                    </div>
                    <input type="submit" name="registrar" value="Registrar">
                </form>
            </div>
        </div>
    </section>
<?php include ("pie.php"); ?>
