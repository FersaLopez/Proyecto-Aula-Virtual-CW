window.addEventListener("load", ()=>{
    const inputH_id = document.getElementById("userH_id");
    const inputH_name = document.getElementById("userH_name");
    const inputH_apodo = document.getElementById("userH_apodo");
    const inputH_idTU = document.getElementById("userH_idTU");
    const inputH_tipo = document.getElementById("userH_tipo");
    const inputH_grado = document.getElementById("userH_grado");

    const inputH_idAula = document.getElementById("userH_aulaElegida");
    const userH_A_idgrado = document.getElementById("userH_A_idgrado");
    const userH_A_nombre = document.getElementById("userH_A_nombre");
    const userH_A_reun = document.getElementById("userH_A_reun");
    const userH_A_desc = document.getElementById("userH_A_desc");
    const userH_A_rutaF = document.getElementById("userH_A_rutaF");
    const userH_A_materia = document.getElementById("userH_A_materia");
    const userH_A_grupo = document.getElementById("userH_A_grupo");
    const userH_A_tipo = document.getElementById("userH_A_tipo");
    const userH_A_priv = document.getElementById("userH_A_priv");
    const userH_A_docCreador = document.getElementById("userH_A_docCreador");


    const asign_tools = document.getElementById("asign_tools");
    
    const asignaciones = document.getElementById("asignaciones");
    const sec_Form_CrearAsignacion = document.getElementById("crearAula");  
    
    const asign_Blocks = document.getElementById("asign_Blocks");

    let formCreacionAsignacion = 0;
    function buscarAsignaciones()
    {   
        
        let formU = new FormData();
        formU.append("id_U", inputH_id.value);
        formU.append("id_A", inputH_idAula.value);
        fetch("../../js_queries/AULAS/busquedaAsignaciones.php", {
            method:"POST", 
            body: formU,
        }).then((response)=>{
            return response.json();
        }).then((datosJSON) =>{
            if(datosJSON.ok == true){
                //alert("Todo bien");
                console.log(datosJSON);
                for(valor of datosJSON.info)
                {
                    asign_Blocks.innerHTML += 
                    "<div id='"+valor.idA+"' class='asignacion coincidencia' data-id='"+valor.idA+"'>"+
                        "<h3 class='titulo_asign coincidencia' data-id='"+valor.idA+"'>"+valor.titulo+"</h3>"+
                        "<span class='tipoAsign coincidencia' data-id='"+valor.idA+"'>Tipo de asignación: "+valor.tipo_asign+"</span>"+
                        "<span class='fechaEntrega coincidencia' data-id='"+valor.idA+"'>Fecha Límite: "+valor.fecha_limite+"</span>"+
                        "<span class='puntosAsign coincidencia' data-id='"+valor.idA+"'>Puntos: "+valor.puntos+"</span>"+
                    "</div>";
                }                
                // refreshValues();    
            }else{
                alert(datosJSON.texto);
            }
        })            
    }
    function refreshValues()
    {
        //sec_form_CreacionAula.innerHTML = "";
        //formAula = 0;
        //aula_Blocks.innerHTML = "";
                
        sec_Form_CrearAsignacion.style.display = "none";
        //wS_Aulas.style.display = "block";
        asignaciones.style.display = "block";
        InformacionAula.style.display = "block";        
        tituloNombreAula.style.display = "block";
        formCreacionAsignacion = 0;

        tituloNombreAula.innerHTML = userH_A_nombre.value;
                
        buscarAsignaciones();
    }

    const tituloNombreAula = document.getElementById("tituloNombreAula");
    const InformacionAula = document.getElementById("InformacionAula");
    const sect1InfoA = document.getElementById("sect1InfoA");




    tituloNombreAula.innerHTML = userH_A_nombre.value;

    InformacionAula.children[0].innerHTML = userH_A_docCreador.value;
    InformacionAula.children[1].innerHTML = "Materia: "+userH_A_materia.value;
    InformacionAula.children[3].innerHTML = "Privacidad del Aula: "+userH_A_priv.value;
    InformacionAula.children[4].innerHTML = userH_A_desc.value;


    sect1InfoA.children[0].innerHTML = "Grupo: "+userH_A_grupo.value;
    sect1InfoA.children[1].innerHTML = "Tipo de Aula: "+userH_A_tipo.value;
    sect1InfoA.children[2].innerHTML = "Grado :"+userH_A_idgrado.value+"°";    


    if(inputH_tipo != 1)
    {
        asign_tools.innerHTML = "<div id=CrearAsign>Crear Asignación</div"
    }

      
    
    
    asign_tools.addEventListener("click", (evento) =>{
        if(evento.target.id == "CrearAsign")
        {
            InformacionAula.style.display = "none";
            sec_Form_CrearAsignacion.innerHTML += "<form id='formCrearAsign'>"+
                    "<fieldset>"+                                                
                        "<div class='in_formCA'><label>Título de la Asignacion: <input name='tituloA' id='tituloA' type='text' required></label></div>"+
                        "<div class='in_formCA'><label>Puntos: <input name='puntosA' id='puntosA' type='number' required></label></div>"+
                        "<div class='in_formCA'><label>Fecha de Entrega: <input name='fechaEntrega' id='fechaEntrega' type='datetime-local'></label></div>"+
                        "<div class='in_formCA'><label>Descripción: <textarea name='txta_desc' id='txta_desc' required></textarea></label></div>"+
                        "<div class='in_formCA'><label>Tipo de Asignacion: <select name='select_tipoA' id='select_tipoA'>"+
                            "<option value='1'>Tarea</option>"+
                            "<option value='2'>Examen</option>"+
                            "<option value='3'>Pregunta</option>"+
                            "<option value='4'>Material</option>"+
                            "<option value='5'>Aviso</option>"+
                        "</select></label></div>"+
                        "<button type='submit'>Crear Asignacion</button>"
                    "</fieldset>"+
                "</form>";

            asign_Blocks.innerHTML = "";
            asignaciones.style.display = "none";
            tituloNombreAula.innerHTML = "Crear una Asignación";
            sec_Form_CrearAsignacion.style.display = "block";

            

            let tituloA = document.getElementById("tituloA");
            let puntosA = document.getElementById("puntosA");
            let fechaAsign = document.getElementById("fechaAsign");
            let txta_desc = document.getElementById("txta_desc");
            let select_tipoA = document.getElementById("select_tipoA");    
            
            
            formCreacionAsignacion = document.getElementById("formCrearAsign");

            

        }

    });
    
    
    refreshValues();    

    asign_Blocks.addEventListener("click", (evento) =>{
        if(evento.target.classList.value.includes("coincidencia"))        
        {
            let asignEspecifica = document.getElementById(evento.target.dataset.id);
            console.log(asignEspecifica);

            let tipoAula = asignEspecifica.children[0].innerHTML; //--------------------------------------------> TRUCAZO PARA EVITAR ERRORES
            
            window.location="./insideAsignacion.php?asign="+evento.target.dataset.id;

        }
    });


    sec_Form_CrearAsignacion.addEventListener("click", (evento) =>{
        
        if(evento.target.type == "submit")
        {
            evento.preventDefault();            
            console.log(evento.target);
            if(evento.target.parentElement.children[0].children[0].children[0].value == "" || evento.target.parentElement.children[1].children[0].children[0].value == "" || evento.target.parentElement.children[3].children[0].children[0].value == "" || evento.target.parentElement.children[2].firstElementChild.form[3].value == "")
            {
                alert("Ingresa todos los datos solicitados");
            }
            else
            {
                let datosForm = new FormData(formCreacionAsignacion);
                datosForm.append("id_A", inputH_idAula.value);                        
                datosForm.append("id_U", inputH_id.value);             
                fetch("../../js_queries/AULAS/crearAsignacion.php", {
                    method:"POST", 
                    body: datosForm,
                }).then((response)=>{
                    return response.json();
                }).then((datosJSON) =>{
                    if(datosJSON.ok == true){
                        //alert("Todo bien");
                        // console.log(inputH_id.value);
                        refreshValues();                        
                    }else{
                        alert(datosJSON.texto);
                    }
                })                            
                
            }
        }
    });




});