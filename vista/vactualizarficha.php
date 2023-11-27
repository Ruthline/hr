
<form action="home.php?pg=101" method="POST" class="cont-ficha">
<div id='cuadroExteriorActFicha'>
                <h1 id='tituloActFicha'>Ingresa los datos a actualizar en la Ficha Antropométrica</h1>
               

                <div id='divGeneral'>

                    <div class='campoBlanco'>
                        <div class='update-one-div izq'>
                            <div class='campito label-two-version'>
                                <label id='label-actualizar' htmlFor='txtIndiceMasa'> Índice de masa corporal</label>
                                <input type='text' id='input-actualizar' name='indiceMasa'/>
                            </div>
                            <div class='campito label-two-version'>
                                <label id='label-actualizar' htmlFor='txtFrecuenciaCardiacaActiva'> Frecuencia cardiaca activa</label>
                                <input type='text' id='input-actualizar' name='frecuenciaCardiacaActiva'/>
                            </div>
                        </div>


                        <div class='update-one-div der'>

                            <div class='campito label-two-version '>
                                <label id="label-actualizar" htmlFor='txtFrecuenciaPasiva'>Frecuencia cardiaca pasiva</label>
                                <input type="text" id="input-actualizar" name="frecuenciaPasiva"/>
                            </div>

                            <div class='campito label-two-version'>
                                <label id="label-actualizar" htmlFor='txtPeso2'>Peso (kilos)</label>
                                <input type="text" id="input-actualizar" name="peso"/> 
                             </div>
        
                        </div>
                    </div>


                    <div class='campoBlanco'>
                        <div class='update-one-div  izq-two'>
                            <div class='campito label-different'>
                                    <label id='label-actualizar ' htmlFor='txtFuerzaEnBrazos'>Fuerza en brazos</label>
                                    <input type='text' id='input-actualizar ' name='fuerzaEnBrazos'/>
                            </div>
                        </div>

                        <div class='update-one-div der-two'>
                            <div class='campito label-two-version'>                            
                                <label id="label-actualizar" htmlFor='txtFuerzaPier'>Fuerza en Piernas</label>
                                <input type='text' id="input-actualizar" name="fuerzaPiernas"/>
                            </div>

                            <div class='campito label-two-version'>
                                <label id="label-actualizar" htmlFor='txtFuerzaAb2'>Fuerza en abdomen</label>
                                <input type="text" id="input-actualizar" name="fuerzaAbdomen"/>

                            </div>
                        
                        </div> 
                    </div>



                    <div class='campoBlanco'>
                        <div class='update-one-div center-div-update corners-up'>
                                <div class='campito label-two-version'>
                                    <label id='label-actualizar ' htmlFor='txtFuerzaLumb2'>Fuerza lumbar</label>
                                    <input type='text' id='input-actualizar' name="fuerzaLumbar"/>
                                </div>


                                <div class='campito label-two-version'>
                            
                                    <label id='label-actualizar' htmlFor='txtBurpeTest2'>Burpe Test</label>
                                    <input type='text' id='input-actualizar' name='burpeTest'/>                  
                                </div>

                        </div>
                    </div> 
                    
                    <div class='campoBlanco'>
                        <div class='update-one-div center-div-update corners-down'>


                            <div class="campito label-two-version">
                                <label id='label-actualizar' htmlFor='txtCooperTest2'>Cooper Test</label>
                                <input type='text' id='input-actualizar' name='cooperTest'/>
                            </div>



                        <div class="campito label-two-version">

                            <label id='label-actualizar' htmlFor='txtCooperTest2'>Actividad fisica</label>


                            <div id='divFuncion'> <Funcion_tooltip/> </div>
                            <div id='campoListaAct'>
                                <select id='listaActFisica' name="actFisica">
                                    <option value="seleccionaUnaOpcion">Selecciona una opción</option>
                                    <option value={1.2}>Sedentario</option>
                                    <option value={1.375}>Una vez por semana</option>
                                    <option value={1.55}> 3 a 4 veces por semana</option>
                                    <option value={1.725}> 5 veces por semana</option>
                                    <option value={1.90}> Alto rendimiento</option>
                                </select>
                            </div>
                        </div>
                
                        



                    </div>
                </div>        
                

                    
                    
                </div>



               
             </div> 


             <div class="divBoton buttons-update">
                  
                 <input type='submit' class="" value="Cancelar" id="cancelButton"/></a>
                 <input type='submit' id='okButton' value="Aceptar"/></a>
                  
               </div>
            </form>
        </div>