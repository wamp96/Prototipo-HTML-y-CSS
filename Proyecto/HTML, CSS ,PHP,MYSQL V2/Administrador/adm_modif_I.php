<?php include ("cabecera_a.php"); ?>
        <div class="titulo_contenido">
            <h3>MODIFICAR USUARIO</h3>
        </div>
        <div class="contenido_mod bg-secondary">
        <div class="cont_mod_form" >
            <form action="">
                    <div class="col-2">
                        <label class="form-label" ># IDENTIDAD :</label>
                        <input type="text" class="form-control" name="identidad">
                    </div>
                
                <div class="con_mod_form1 d-flex align-items-center justify-content-around">
                    <div class="col-3">
                        <label class="form-label" ># IDENTIDAD :</label>
                        <input type="text" class="form-control" name="identidad">
                    </div>
                    <div class="col-3">
                        <label class="form-label">NOMBRE :</label>  
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="col-3">
                        <label class="form-label">APELLIDO PARTENO :</label>  
                        <input type="text" class="form-control" name="apellidop">
                    </div>
                </div>
                
                <div class="con_mod_form2 d-flex justify-content-around">
                    <div class="col-3">
                        <label class="form-label">CORREO :</label>  
                        <input type="text" class="form-control" name="correo">
                    </div>
                    <div class="col-3">
                        <label class="form-label">TELEFONO :</label>  
                        <input type="text" class="form-control" name="telefono">
                    </div>
                    <form action="adm_crear_C.php" method="post">
                    <div class="col-3">
                        <label class="form-label">USUARIO :</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                </div>   

                <div class="con_mod_form3 d-flex justify-content-around">
                    <div class="col-2">
                        <label class="form-label">ROL:</label> 
                        <select name="rol" class="form-select">
                            <option value="1">TECNICO</option>
                            <option value="2">ANALISTA INVENTARIO</option>
                            <option value="3">USUARIO</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="form-label" >AREA:</label>
                        <select name="area" class="form-select">
                            <option value="1">AUDITORIA</option>
                            <option value="2">CONTABILIDAD       </option>
                            <option value="3">OFICINA</option>
                            <option value="4">DESARROLLO</option>
                            <option value="5">TECNOLOGIA</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="form-label" >CIUDAD:</label>
                        <select name="ciudad" class="form-select"">
                            <option value="1">BOGOTA</option>
                            <option value="2">MEDELLIN</option>
                            <option value="3">CALI</option>
                            <option value="4">BARRANQUILLA</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label">CONTRASEÑA: * </label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                </div>   
                <div class="con_mod_boton d-flex justify-content-evenly">
                    <input type="submit" class="btn btn-dark" name="guardar" value="GUARDAR">
                    <input type="submit" class="btn btn-dark" name="volver" value="VOLVER">
                </div>
            </form>

        </div>
        </div>
<?php include ("pie.php"); ?>