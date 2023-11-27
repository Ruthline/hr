<form action="home.php?pg=104" method="POST"  id="general1" class="cont-ficha">
            <h1 id='tituloGeneral1'>Ficha Antropométrica</h1>

            <div id="sup">
                <div class='div-foto'>
                    <img id='fotoPerfil' src="./img/perfil.jpg" title='fotoPerfil' alt='fotoPerfil'/>
                </div>
                <div class='div-ficha'> 
                    <div class='input-ficha'>
                        <label id='lblMasa' htmlFor='txtMasa'>Índice masa corporal</label>
                        <input type='text' id='txtMasa' name='indiceMasa' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblPeso3' htmlFor='txtPeso3'>Peso (kilos)</label>
                        <input type='text' id='txtPeso3' name='peso' readOnly/>
                    </div>
                </div>   
                <div class='div-ficha'>    
                    <div class='input-ficha'>
                        <label id='lblFCA' htmlFor='txtFCA'>Frecuencia cardiaca activa</label>
                        <input type='text' id='txtFCA' name='frecuenciaAactiva' readOnly/>
                    </div>
                    <div class='input-ficha'>

                        <label id='lblEnvergadura3' htmlFor='txtEnvergadura3'>Envergadura (metros)</label>
                        <input type='text' id='txtEnvergadura3' name='envergadura' readOnly/>
                    </div>
                </div>
                <div class='div-ficha'>
                    <div class='input-ficha'>
                        <label id='lblFCP' htmlFor='txtFCP'>Frecuencia cardiaca pasiva</label>
                        <input type='text' id='txtFCP' name='frecuenciaPasiva' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblFuerBra' htmlFor='txtFuerBra'>Fuerza en brazos</label>
                        <input type='text' id='txtFuerBra' name='fuerzaBrazos' readOnly/>
                    </div>
                </div>
            </div> 

            <div id='inf' class='diseño'>
               
                <div class='div-ficha'>
                    <div class='input-ficha'>
                        <label id='lblFuePie' htmlFor='txtFuePie'>Fuerza en piernas (centímetros)</label>
                        <input type='text' id='txtFuePie' name='fuerzaPiernas' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblBurpeT' htmlFor='txtBurpeT'>Burpe Test</label>
                        <input type='text' id='txtBurpeT' name='burpeTest'readOnly/>
                    </div>
                </div>
                <div class='div-ficha'>
                    <div class='input-ficha'>
                        <label id='lblFueAb3' htmlFor='txtFueAb3'>Fuerza en abdomen </label>
                        <input type='text' id='txtFueAb3' name='fuerzaAbdomen' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblCooperT' htmlFor='txtCooperT'>Cooper Test</label>
                        <input type='text' id='txtCooperT' name='cooperTest'readOnly/>
                    </div>
                </div>
                <div class='div-ficha'>
                    <div class='input-ficha'>
                        <label id='lblAlt' htmlFor='txtAlt'>Altura (metros) </label>
                        <input type='text' id='txtAlt' name='altura' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblCalIde' htmlFor='txtCalIde'>Calorías ideales (día)</label>
                        <input type='text' id='txtCalIde' name='caloriasIdeales'readOnly/>
                    </div>
                </div>
                <div class='div-ficha'>
                    <div class='input-ficha'>
                        <label id='lblFueLum' htmlFor='txtFueLum'>Fuerza lumbar </label>
                        <input type='text' id='txtFueLum' name='altura' readOnly/>
                    </div>
                    <div class='input-ficha'>
                        <label id='lblPeId' htmlFor='txtPeId'>Peso ideal (kilos)</label>
                        <input type='text' id='txtPeId' name='pesoIdeal'readOnly/>
                    </div>
                </div>
               
            </div>
        

            <div class='divBoton actual-button'>
                    <input type='submit' id='btnAceptarNewFicha' value="Actualizar Ficha"/>
            </div>
</form>