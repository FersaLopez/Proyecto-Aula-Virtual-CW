window.addEventListener("load", ()=>{
    const inputH_id = document.getElementById("userH_id");
    const inputH_name = document.getElementById("userH_name");
    const inputH_apodo = document.getElementById("userH_apodo");
    const inputH_idTU = document.getElementById("userH_idTU");
    const inputH_tipo = document.getElementById("userH_tipo");
    const inputH_grado = document.getElementById("userH_grado");



    const userH_As_asign = document.getElementById("userH_As_asign");

    const userH_As_titulo = document.getElementById("userH_As_titulo");
    const userH_As_indicaciones = document.getElementById("userH_As_indicaciones");
    const userH_As_puntos = document.getElementById("userH_As_puntos");

    const userH_As_fecha_limite = document.getElementById("userH_As_fecha_limite");
    const userH_As_tipo_asign = document.getElementById("userH_As_tipo_asign");
    const userH_As_materias = document.getElementById("userH_As_materias");
    const userH_As_grupo = document.getElementById("userH_As_grupo");
    const userH_As_ID_GRADO = document.getElementById("userH_As_ID_GRADO");
    const userH_As_id_edo_entrega = document.getElementById("userH_As_id_edo_entrega");
    const userH_As_fecha_entrega = document.getElementById("userH_As_fecha_entrega");
    const userH_As_calificacion = document.getElementById("userH_As_calificacion");
    const userH_As_texto_tarea = document.getElementById("userH_As_texto_tarea");


    const tituloNombreAsign = document.getElementById("tituloNombreAsign");
    const infoAsign = document.getElementById("infoAsign");    
    const tuEntrega = document.getElementById("tuEntrega");

    let boolEntregada = false;

    tituloNombreAsign.innerHTML = userH_As_titulo.value;

    infoAsign.children[0].innerHTML = userH_As_tipo_asign.value;
    infoAsign.children[1].innerHTML = "Puntos: "+userH_As_puntos.value;
    infoAsign.children[2].innerHTML = "Indicaciones: "+userH_As_indicaciones.value;
    infoAsign.children[3].innerHTML = "Fecha de entrega: "+userH_As_fecha_limite.value;
    infoAsign.children[4].children[0].innerHTML = "Materia: "+userH_As_materias.value;
    infoAsign.children[4].children[1].innerHTML = "Grupo: "+userH_As_grupo.value;
    infoAsign.children[4].children[2].innerHTML = "Grado: "+userH_As_ID_GRADO.value+"°";    


    const formEnvioArchivo = document.getElementById("formEnvioArchivo");
    const btnEnvioAsign = document.getElementById("btnEnvioAsign");

    /*if(userH_As_id_edo_entrega.value != "No entregado")
    {
        formEnvioArchivo.style.display = "none";
        btnEnvioAsign.style.backgroundColor = "black";
        btnEnvioAsign.style.color = "white";
        btnEnvioAsign.innerHTML = "Completada";
        btnEnvioAsign.style.border = "none";
        btnEnvioAsign.style.borderColor = "white";

    }*/

    function refreshValues()
    {
        tuEntrega.children[2].innerHTML = userH_As_id_edo_entrega.value;
        tuEntrega.children[3].innerHTML = userH_As_calificacion.value;
        tuEntrega.children[4].innerHTML = userH_As_fecha_entrega.value;
        tuEntrega.children[5].innerHTML = userH_As_texto_tarea.value;
        if(userH_As_id_edo_entrega.value != "No entregado")//Si la asignacion esta entregada de cualquier forma
        {
            formEnvioArchivo.style.display = "none";
            btnEnvioAsign.style.backgroundColor = "black";
            btnEnvioAsign.style.color = "white";
            btnEnvioAsign.innerHTML = "Completada";
            btnEnvioAsign.style.border = "none";
            btnEnvioAsign.style.borderColor = "white";
            boolEntregada = true;    
        }           
        /*
        if(userH_As_id_edo_entrega.value != "No entregado")     
        {

        }
        console.log(userH_As_id_edo_entrega.value);*/
            
        
        //sec_form_CreacionAula.innerHTML = "";

        //formAula = 0;
        //aula_Blocks.innerHTML = "";

        /*
        sec_Form_CrearAsignacion.style.display = "none";
        //wS_Aulas.style.display = "block";
        asignaciones.style.display = "block";
        InformacionAula.style.display = "block";        
        tituloNombreAula.style.display = "block";
        formCreacionAsignacion = 0;
*/
        //tituloNombreAula.innerHTML = userH_A_nombre.value;
                
        //buscarAsignaciones();
    }
    
    refreshValues();

    btnEnvioAsign.addEventListener("click", (evento) =>{
        if(boolEntregada == true)
        {
            let infoUsuario = new FormData();
            infoUsuario.append("id_U", inputH_id.value);        
            infoUsuario.append("id_Asign", userH_As_asign.value);                     
            infoUsuario.append("btnEnvioAsign", boolEntregada); 
            infoUsuario.append("BOOL", boolEntregada);          
            
            fetch("../../js_queries/AULAS/realizarEnvio.php", {
                method:"POST", 
                body: infoUsuario,
            }).then((response)=>{            
                return response.json();            
            }).then((datosJSON) =>{
    
                console.log(datosJSON);
                if(datosJSON.ok == true)
                {
                    alert(datosJSON.texto);
                    refreshValues();
                }
                else
                {
                    alert(datosJSON.texto);
                }
                
            })            
        }
        else
        {
            let infoUsuario = new FormData();
            infoUsuario.append("id_U", inputH_id.value);        
            infoUsuario.append("id_Asign", userH_As_asign.value);        
            infoUsuario.append("btnEnvioAsign", boolEntregada);               
            fetch("../../js_queries/AULAS/realizarEnvio.php", {
                method:"POST", 
                body: infoUsuario,
            }).then((response)=>{            
                return response.json();            
            }).then((datosJSON) =>{
    
                console.log(datosJSON);
                if(datosJSON.ok == true)
                {
                    alert(datosJSON.texto);
                    refreshValues();
                }
                else
                {
                    alert(datosJSON.texto);
                }
                
            })            
        }
    });





        



});