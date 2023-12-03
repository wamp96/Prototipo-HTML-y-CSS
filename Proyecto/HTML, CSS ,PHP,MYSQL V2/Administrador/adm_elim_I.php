<?php include ("cabecera_a.php"); ?>
        <div class="titulo_contenido">
            <h3>ELIMINAR USUARIO</h3>
        </div>
        <div class="container_mod">
            <div class="seccion_eliminar_usuario">
            <label for="usuarios_el"><b>Selecciona los usuarios por eliminar</b></label><br>
            <select multiple name="usuarios_el" id="usuarios_el">
            <option>8372473</option>
            <option>1023281237</option>
            <option>1013812388</option>
            <option>7712738</option>
            <option>9112028</option>
            <option>1019223818</option>           
            </select>
            <div class="usuarios_elim_general">
            <label for="mensaje"><b>Usuarios Ingresados</b></label>
            <textarea name="mensaje" for="mensaje" placeholder="Agrege las Cedulas por Eliminar" maxlength="300"></textarea>
            </div>
            <div class="boton_eliminar" >
                <button class="btn btn-light border border-dark">ELIMINAR</button>
                <button role="link" class="btn btn-light border border-dark" onclick="window.location='adm-perfil.html'">VOLVER</button>
            </div>          
            </div>               
        </div>           
<?php include ("pie.php"); ?>