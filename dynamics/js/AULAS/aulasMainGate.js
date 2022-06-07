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
    
    console.log("idU = "+inputH_id.value);
    console.log(inputH_name.value);
    console.log(inputH_apodo.value);
    console.log("idTU = "+inputH_idTU.value);
    console.log(inputH_tipo.value);
    console.log(inputH_grado.value);    


    
    
    function refreshValues()
    {
        sec_form_CreacionAula.innerHTML = "";
        
        wS_Aulas.style.display = "block";


        

    }





    function crearAula()
    {        
        wS_Aulas.style.display = "none";
        
        sec_form_CreacionAula.innerHTML = "<h2>Creación de Aulas</h2>";
        sec_form_CreacionAula.innerHTML += "<form>"+"<fieldset>"+"<div class='in_formCA' ><label>Nombre: <input type='text' name='inp_nombre' id='inp_nombre' required></label></div>"+"<div class='in_formCA' ><label>Materia: <select name='select_materia' id='select_materia'></select></label></div>"+"<div class='in_formCA' ><label>Grupo: <select name='select_grupo' id='select_grupo'></select></label></div>"+"<div class='in_formCA' ><label><textarea name='txta_desc' id='txta_desc' required></textarea></label></div>"+        "<div class='in_formCA' ><label>Tipo de Aula: <select name='select_tipoA' id='select_tipoA'></select></label></div>"+"<div class='in_formCA' ><label>Privacidad que tendrá el Aula: <input id='inp_privacidad_auto' disabled> </label></div>"+"<button type='submit'>Crear Aula</button>"+"<button type='reset'>Eliminar Datos</button>"+"</fieldset>"+"</form>";

        // sec_form_CreacionAula.innerHTML += "<form>"+
        // sec_form_CreacionAula.innerHTML += "<fieldset>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Nombre: <input type='text' name='inp_nombre' id='inp_nombre' required></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Materia: <select name='select_materia' id='select_materia'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Grupo: <select name='select_grupo' id='select_grupo'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label><textarea name='txta_desc' id='txta_desc' required></textarea></label></div>"+        
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Tipo de Aula: <select name='select_tipoA' id='select_tipoA'></select></label></div>"+
        // sec_form_CreacionAula.innerHTML += "<div class='in_formCA' ><label>Privacidad que tendrá el Aula: <input id='inp_privacidad_auto' disabled> </label></div>"+
        // sec_form_CreacionAula.innerHTML += "<button type='submit'>Crear Aula</button>"+
        // sec_form_CreacionAula.innerHTML += "<button type='reset'>Eliminar Datos</button>"+
        // sec_form_CreacionAula.innerHTML += "</fieldset>"+
        // sec_form_CreacionAula.innerHTML += "</form>";


        let selectMaterias = document.getElementById("select_materia");
        let selectGrupo = document.getElementById("select_grupo");
        let select_tipoA = document.getElementById("select_tipoA");
        let inp_privacidad_auto = document.getElementById("inp_privacidad_auto");
        

        fetch("../../js_queries/AULAS/askToFillmaterias.php")//se ponen automaticamente los tipos en el "form"
        .then((response)=>{
        //console.log(response);
            return response.json();      
        })
        .then((datosJSON)=>{
            console.log(datosJSON);
            
            
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
            console.log(datosJSON);
                        
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
            console.log(datosJSON);
                        
            for(tipo of datosJSON){
                select_tipoA.innerHTML+="<option value='"+tipo.ID_TIPO_AULA+"' style='color: #14002a'>"+tipo.tipo+"</option>";
            }
//            inp_privacidad_auto.value = tipo.privacidad;
        });

    }


    sec_form_CreacionAula.addEventListener("change", (evento) =>{
        console.log(evento);
        if(evento.target.id == "select_tipoA")
        {
            // evento.target.
        }
    });

    if(inputH_idTU.value != 1){ //----------------------------------------------> Modificar condicional
        console.log(aulaTools);
        aulaTools.innerHTML = "<div id='btnf_añadirAula'>+</div><div id='btnf_EliminarAula'>-</div>";     
    }
    else
    {
        aulaTools.innerHTML = "<div id='btnf_añadirAula'>+</div><div id='btnf_CrearAula'>++</div><div id='btnf_EliminarAula'>-</div>";     
    }



    aulaTools.addEventListener("click", (evento) =>{
        if(evento.target.id == "btnf_añadirAula")
        {
            console.log("AÑADIR");
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




});