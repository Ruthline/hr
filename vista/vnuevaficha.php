<form  action="home.php?pg=101" method="POST"  class='cont-newf'>           
              <h1>Nueva Ficha Antropométrica</h1>  

           <div class="cont-sup-newf">  


                <div class="cont-izq-newf">

                    <div class="cont-intern-newf">
                        <div class="label-newf">
                            <label id="lblIndice" htmlFor='txtIndice'>Índice de masa corporal</label>
                            <input type="text" id="txtIndice" name="indice"/>
                        </div>

                        <div class="label-newf">
                            <label id="lblEnvergadura" htmlFor='txtEnvergadura'>Envergadura (metros)</label>
                            <input type="text" id="txtEnvergadura" name="envergadura"/>
                        </div>
                    </div>
                    
                    <div class="cont-intern-newf">
                        <div class="label-newf">
                            <label id="lblFrecuenciaAct" htmlFor='txtFrecuenciaAct'>Frecuencia cardiaca activa</label>
                            <input type="text" id="txtFrecuenciaAct" name="frecuenciaAct"/>
                        </div>

                        <div class="label-newf">
                            <label id="lblFuerzaBra" htmlFor='txtFuerzaBra'>Fuerza en brazos</label>
                            <input type="text" id="txtFuerzaBra" name="fuerzaBra"/>
                        </div>
                    </div>
                    
                </div> 


                <div class="cont-der-newf">
                    <div class="cont-intern-newf">
                        <div class="label-newf">
                            <label id="lblFrecuenciaPas" htmlFor='txtFrecuenciaPas'>Frecuencia cardiaca pasiva</label>
                            <input type="text" id="txtFrecuenciaPas" name="frecuenciaPas"/>
                        </div>

                        <div class="label-newf">
                            <label id="lblPeso" htmlFor='txtPeso'>Peso (kilos)</label>
                            <input type="text" id="txtPeso" name="peso"/> 
                        </div>
                    </div>

                    
                    <div class="cont-intern-newf">
                        <div class="label-newf">
                            <label id="lblFuerzaPiernas" htmlFor='txtFuerzaPiernas'>Fuerza en Piernas</label>
                            <input type='text' id="txtFuerzaPiernas" name="fuerzaPiernas"/>
                        </div>

                        <div class="label-newf">
                            <label id="lblFuerzaAb" htmlFor='txtFuerzaAb'>Fuerza en abdomen</label>
                            <input type="text" id="txtFuerzaAb" name="fuerzaAbdomen"/>

                        </div>
                    </div>
                    


                </div>
            </div>

            <div class="cont-inf-newf">

                <div class="cont-intern-newf">

                    <div class="label-inf-newf">
                        <label id='lblAltura' htmlFor='txtAltura'>Altura (metros)</label>
                        <input type='text' id='txtAltura' name='altura'/>
                    </div>

                    <div class="label-inf-newf">
                        <label id='lblFuerzaLumb' htmlFor='txtFuerzaLumb'>Fuerza lumbar</label>
                        <input type='text' id='txtFuerzaLumb' name="fuerzaLumbar"/>
                    </div>

                    <div class="label-inf-newf">
                        <label id='lblBurpeTest' htmlFor='txtBurpeTest'>Burpe Test</label>
                        <input type='text' id='txtBurpeTest' name='burpeTest'/>                  
                    </div>
                </div>

                <div class="cont-intern-newf">

                    <div class="label-inf-newf">
                        <label id='lblCooperTest' htmlFor='txtCooperTest'>Cooper Test</label>
                        <input type='text' id='txtCooperTest' name='cooperTest'/>
                     </div>


                     <div class="label-inf-newf">
                        <label id='lblCooperTest' htmlFor='txtCooperTest'>Actividad Física  <i class="fa-solid fa-question" id="activar">
                            <p class="fisAct-text">Se refiere a la cantidad de ejercicio que haces en tu día a día, si no haces ejercicio por favor selecciona sedentario</p>
                        </i></label>
                        <select  name="actFisica">
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


            <div class="buttons-newf"> 
                  <input type='submit' id="btn-cancel" value="Cancelar"/>
                  <input type='submit' id="btn-confirm" value="Aceptar"/>
            </div>



</form >
                  
                  
                  
                