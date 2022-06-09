window.addEventListener("load", ()=>{
    const inputH_id = document.getElementById("userH_id");
    const inputH_name = document.getElementById("userH_name");
    const inputH_apodo = document.getElementById("userH_apodo");
    const inputH_idTU = document.getElementById("userH_idTU");
    const inputH_tipo = document.getElementById("userH_tipo");
    const inputH_grado = document.getElementById("userH_grado");

    const wS_Aulas = document.getElementById("wS_Aulas");
    const sec_form_CreacionAula = document.getElementById("sec_form_CreacionAula");
    
        
    const aulaTools = document.getElementById("aula_tools");
    const aula_Blocks = document.getElementById("aula_Blocks");            
    
    // console.log("idU = "+inputH_id.value);
    // console.log(inputH_name.value);
    // console.log(inputH_apodo.value);
    // console.log("idTU = "+inputH_idTU.value);
    // console.log(inputH_tipo.value);
    // console.log(inputH_grado.value);    

    let formAula = 0;        

    function buscarRegistrosClases()
    {
        let infoUsuario = new FormData();
        infoUsuario.append("id_U", inputH_id.value);        

        fetch("../../js_queries/AULAS/busquedaRegistroAulas.php", {
            method:"POST", 
            body: infoUsuario,
        }).then((response)=>{            
            return response.json();            
        }).then((datosJSON) =>{

            console.log(datosJSON);
            for(aula of datosJSON.datos)
            {
                let div = document.createElement("div")
                div.classList = "AulaBlock coincidencia"
                div.id = aula.idAula;
                div.dataset.id = aula.idAula;
                div.innerHTML = "<h4 data-id='"+aula.idAula+"' class='coincidencia AulaBlock_tipo'>"+aula.tipoAula+"</h4>";
                div.innerHTML += "<h3 data-id='"+aula.idAula+"' class='coincidencia AulaBlock_nombre'>"+aula.nombreAula+"</h3>";
                let grado = "";
                if(aula.id_grado != null)
                {
                    grado = aula.id_grado;
                }                

                div.innerHTML += "<div data-id='"+aula.idAula+"' class='coincidencia AulaBlock_footer'>"+
                "<span data-id='"+aula.idAula+"' class='coincidencia AulaBlock_profesor'>"+aula.nombreDocente+
                "</span>"+"<span data-id='"+aula.idAula+"' class='coincidencia AulaBlock_grado'>"+grado+"</span>"+
                "</div>";

                aula_Blocks.appendChild(div);
            }                        
        })            
    }            
    function refreshValues()
    {
        sec_form_CreacionAula.innerHTML = "";
        sec_Unirse_Aula.innerHTML = "";

        sec_Unirse_Aula.style.display = "none";        
        
        formAula = 0;
        aula_Blocks.innerHTML = "";
        
        wS_Aulas.style.display = "block";
        
        buscarRegistrosClases();        
    }

    

    function crearAula()
    {        
        wS_Aulas.style.display = "none";
        
        sec_form_CreacionAula.innerHTML = "<h2>Creación de Aulas</h2>";
        sec_form_CreacionAula.innerHTML += "<form id='formCrearAula'>"+"<fieldset>"+"<div class='in_formCA' ><label>Nombre: <input type='text' name='inp_nombre' id='inp_nombre' required></label></div>"+"<div class='in_formCA' ><label>Materia: <select name='select_materia' id='select_materia'></select></label></div>"+"<div class='in_formCA' ><label>Grupo: <select name='select_grupo' id='select_grupo'></select></label></div>"+"<div class='in_formCA' ><label><textarea name='txta_desc' id='txta_desc' required></textarea></label></div>"+        "<div class='in_formCA' ><label>Tipo de Aula: <select name='select_tipoA' id='select_tipoA'></select></label></div>"+"<div class='in_formCA' ><label>Privacidad que tendrá el Aula: <input id='inp_privacidad_auto' name='inp_privacidad_auto' disabled> </label></div>"+"<button id='enviar' type='submit'>Crear Aula</button>"+"<button type='reset'>Eliminar Datos</button>"+"</fieldset>"+"</form>";

        // sec_form_CreacionAula.innerHTML += "<form id='formCrearAula'>"+
        // sec_form_CreacionAula.innerHTML += "<fieldset>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Nombre: <input type='text' name='inp_nombre' id='inp_nombre' required></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Materia: <select name='select_materia' id='select_materia'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Grupo: <select name='select_grupo' id='select_grupo'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label><textarea name='txta_desc' id='txta_desc' required></textarea></label></div>"+        
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Tipo de Aula: <select name='select_tipoA' id='select_tipoA'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Privacidad que tendrá el Aula: <input id='inp_privacidad_auto' name='inp_privacidad_auto' disabled> </label></div>"+
        // sec_form_CreacionAula.innerHTML += "<button id='enviar' type='submit'>Crear Aula</button>"+
        // sec_form_CreacionAula.innerHTML += "<button type='reset'>Eliminar Datos</button>"+
        // sec_form_CreacionAula.innerHTML += "</fieldset>"+
        // sec_form_CreacionAula.innerHTML += "</form>";


        let selectMaterias = document.getElementById("select_materia");
        let selectGrupo = document.getElementById("select_grupo");
        let select_tipoA = document.getElementById("select_tipoA");
        let inp_privacidad_auto = document.getElementById("inp_privacidad_auto");

        formAula = document.getElementById("formCrearAula");
        //console.log(formAula);
        

        fetch("../../js_queries/AULAS/askToFillmaterias.php")//se ponen automaticamente los tipos en el "form"
        .then((response)=>{
        //console.log(response);
            return response.json();      
        })
        .then((datosJSON)=>{
            //console.log(datosJSON);
            
            
            for(tipo of datosJSON){
                selectMaterias.innerHTML+="<option value='"+tipo.id+"' style='color: #14002a'>"+tipo.materia+"</option>";                
            }
        });

        fetch("../../js_queries/AULAS/askToFillgrupos.php")//se ponen automaticamente los tipos en el "form"
        .then((response)=>{
        //console.log(response);
            return response.json();      
        })
        .then((datosJSON)=>{
            //console.log(datosJSON);
                        
            for(tipo of datosJSON){
                selectGrupo.innerHTML+="<option value='"+tipo.id_grupo+"' style='color: #14002a'>"+tipo.grupo+"</option>";
            }
        });

        fetch("../../js_queries/AULAS/askToFilltipoAulas.php")//se ponen automaticamente los tipos en el "form"
        .then((response)=>{
        //console.log(response);
            return response.json();      
        })
        .then((datosJSON)=>{
            console.log(datosJSON[0].privacidad);
                        
            for(tipo of datosJSON){
                select_tipoA.innerHTML+="<option value='"+tipo.ID_TIPO_AULA+"' style='color: #14002a'>"+tipo.tipo+"</option>";
            }
            inp_privacidad_auto.value = datosJSON[0].privacidad;
        });

    }        



    sec_form_CreacionAula.addEventListener("change", (evento) =>{
        //console.log(evento);
        if(evento.target.id == "select_tipoA")
        {
            $id = evento.target.value;
            fetch("../../js_queries/AULAS/askToFillprivacidad.php?tipo="+$id)//se ponen automaticamente los tipos en el "form"
            .then((response)=>{
            //console.log(response);
                return response.json();      
            })
            .then((datosJSON)=>{
                console.log(datosJSON);
                inp_privacidad_auto.value = datosJSON.priv;
    //            inp_privacidad_auto.value = tipo.privacidad;
            });
        }                
    });

    sec_form_CreacionAula.addEventListener("click", (evento) =>{
        evento.preventDefault();
        if(evento.target.id == "enviar")
        {    
            //console.log(evento.target);
            if(evento.target.parentElement.children[0].children[0].children[0].value == "" || evento.target.parentElement.children[3].children[0].children[0].value == "")
            {
                alert("Ingresa todos los datos solicitados");
            }
            else
            {
                let datosForm = new FormData(formAula);
                fetch("../../js_queries/AULAS/crearAula.php", {
                    method:"POST", 
                    body: datosForm,
                }).then((response)=>{
                    return response.json();
                }).then((datosJSON) =>{
                    if(datosJSON.ok == true){
                        //alert("Todo bien");
                        // console.log(inputH_id.value);
                        // console.log(datosJSON.idAula);
                        let relacionUsuarioAula = new FormData();
                        relacionUsuarioAula.append("id_U", inputH_id.value);
                        relacionUsuarioAula.append("idAula", datosJSON.idAula);
    
                        fetch("../../js_queries/AULAS/crearAula.php", {
                            method:"POST", 
                            body: relacionUsuarioAula,
                        }).then((response)=>{
                            return response.json();
                        }).then((datosJSON) =>{
                            if(datosJSON.ok == true){
                                alert("Todo bien");
                                refreshValues();    
                            }else{
                                alert(datosJSON.texto);
                            }
                        })            
                    }else{
                        alert(datosJSON.texto);
                    }
                })                            
            }
        }
    });

    if(inputH_idTU.value == 1){ //----------------------------------------------> Modificar condicional
        console.log(aulaTools);
        aulaTools.innerHTML = "<div id='btnf_añadirAula'>+</div><div id='btnf_EliminarAula'>-</div>";     
    }
    else
    {
        aulaTools.innerHTML = "<div id='btnf_añadirAula'>+</div><div id='btnf_CrearAula'>++</div><div id='btnf_EliminarAula'>-</div>";     
    }

    const sec_Unirse_Aula = document.getElementById("sec_Unirse_Aula");
    sec_Unirse_Aula.style.display = "none";

    let formUnirmeA = 0;
    function unirseAula()
    {        
        sec_Unirse_Aula.style.display = "block";
        sec_form_CreacionAula.style.display = "none";
        wS_Aulas.style.display = "none";
        
        sec_Unirse_Aula.innerHTML = ""+
    
        "<h2>Unirme a un Aula</h2>"+
        "<form id='formUnirmeA'>"+        
            "<div id='divUnirmeA'>"+
                "<label>Ingresa el Código del Aula"+
                    "<input id='inpUnirmeA' name='inpUnirmeA' type='text'>"+
                "</label>"+
            "</div>"+
            "<button id='btn_UnirmeA' type='submit'>Inscribirme al Aula</button>"+
        "</form>";

            


        formUnirmeA = document.getElementById("formUnirmeA");
        let inpUnirmeA = document.getElementById("inpUnirmeA");
        let divUnirmeA = document.getElementById("divUnirmeA");        
        let btn_UnirmeA = document.getElementById("btn_UnirmeA");                
        //console.log(formAula);                                                     
    }


    sec_Unirse_Aula.addEventListener("click", (evento) =>{
        console.log(evento);
        evento.preventDefault();
        if(evento.target.id == "btn_UnirmeA")
        {
            //if(evento.target.parentElement.children[0].children[0].children[0].value == "")
            console.log(evento.target);
            if(evento.target.parentElement[0].value != "")
            {
            
                let form_UnirmeA = new FormData(formUnirmeA);
                form_UnirmeA.append("id_U", inputH_id.value); 
                fetch("../../js_queries/AULAS/unirseAula.php", {
                    method:"POST", 
                    body: form_UnirmeA,        
                }).then((response)=>{
                //console.log(response);
                    return response.json();      
                })
                .then((datosJSON)=>{
                    //console.log(datosJSON);
                    if(datosJSON.ok == true)
                    {
                        alert(datosJSON.texto);
                        refreshValues();
                    }
                    else
                    {
                        alert(datosJSON.texto);
                    }
                });            
                }
            else
            {
                alert("Ingresa un codigo");
            }
        }

    });
    





    aulaTools.addEventListener("click", (evento) =>{
        if(evento.target.id == "btnf_añadirAula")
        {
            console.log("AÑADIR");
            unirseAula();
        }
        else if(evento.target.id == "btnf_CrearAula")
        {
            console.log("CREAR");
            crearAula();
        }
        else if(evento.target.id == "btnf_EliminarAula")
        {
            console.log("ELIMINAR");
        }
    });

    aula_Blocks.addEventListener("click", (evento) =>{
        console.log(evento.target);
        //console.log(evento.target.classList);
        if(evento.target.classList.value.includes("coincidencia"))        
        {
            
            
            let bloqueAulaEspecifico = document.getElementById(evento.target.dataset.id);
            console.log(bloqueAulaEspecifico);

            let tipoAula = bloqueAulaEspecifico.children[0].innerHTML; //--------------------------------------------> TRUCAZO PARA EVITAR ERRORES
            // let nombreAula = bloqueAulaEspecifico.children[1].innerHTML;
            // let nombreProfesor = bloqueAulaEspecifico.children[2].children[0].innerHTML;
            // let grado = bloqueAulaEspecifico.children[2].children[1].innerHTML;
            //window.location="./insideAula.php?aula="+evento.target.dataset.id+"&nombre="+nombreAula+"&tipo="+tipoAula+"&profesor="+nombreProfesor+"&grado="+grado;
            window.location="./insideAula.php?aula="+evento.target.dataset.id;
            
            //console.log("lol")


        }
    });


    buscarRegistrosClases();

});