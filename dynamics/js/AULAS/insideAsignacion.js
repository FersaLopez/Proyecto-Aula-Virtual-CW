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
    const sec_Calificaciones = document.getElementById("sec_Calificaciones");

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
        if(inputH_idTU.value == 2)
        {
            tuEntrega.style.display = "none";    
            sec_Calificaciones.style.display = "flex";
            console.log("aaa");
            let infoUsuario = new FormData();
            infoUsuario.append("id_U", inputH_id.value);
            infoUsuario.append("id_Asign", userH_As_asign.value);
            fetch("../../js_queries/AULAS/busquedaEntregasAlumnos.php", {
                method:"POST", 
                body: infoUsuario,
            }).then((response)=>{            
                return response.json();            
            }).then((datosJSON) =>{
                console.log(datosJSON);
                if(datosJSON.ok == true)
                {
                    console.log(datosJSON);
                    //alert(datosJSON.texto);   /* 
                    for(valor of datosJSON.datos)
                    {                                        
                        let doc = 0;
                        if(valor.ARCH == null)
                            doc = "<h2>Sin archivos adjuntos</h2>";
                        else
                            doc =                             
                                "<a class='infoArchDesc' download href='"+valor.ARCH.ruta_archivo+"'>"+
                                    "<h4 class='infoArchnombre'>"+valor.ARCH.nombre+"</h4>"+
                                    "<iframe src='"+valor.ARCH.ruta_archivo+"'>"+
                                    "</iframe>"+
                                    "<div class='infoArchext'>"+"<u>Archivo: "+valor.ARCH.tipo_extension+"</u></div>"+
                                "</a>";                        
                        opciones = 
                                "<form class='formCalif' method='post'>"+
                                    "<label>Calificación: "+
                                        "<input id='calificacion' name='calificacion' class='calif' type='number' required></input>"+
                                    "</label>"+
                                    "<button class='btncalif' type='submit'>Calificar</button>"+
                                "</form>";                    
                        opciones2 = 
                                "<div>Calificación: <strong>"+valor.UHA_related.calificacion+"</strong></div>";
                        
                        if(valor.UHA_related.calificacion == null)                    
                            opcion = opciones;                    
                        else
                            opcion = opciones2;                        
                        sec_Calificaciones.innerHTML += 
                        "<div class='archivosSubidos'>"+
                            "<h2>Entrega de:</h2>"+
                            "<div class='infoAlumno' data-id='"+valor.UHA_related.ID_UHA+"'>"+
                                "<h3 class='infoAnombre'>"+valor.UHA_related.apellido_paterno+" "+valor.UHA_related.apellido_materno+" "+" "+valor.UHA_related.nombre+"</h3>"+
                                "<h4 class='infoAclave'>"+valor.UHA_related.num_identificador+"</h4>"+
                                "<span class='infoAcorreo'>"+"Correo del alumno: "+valor.UHA_related.correo+"</span>"+
                                "<h3 class='infoAEedo'>"+valor.UHA_related.estado+"</h3>"+
                                "<div class='infoAEfecha'>"+"Entregado el: "+valor.UHA_related.fecha_entrega+"</div>"+
                            "</div>"+
                            "<div class='contenedorArchivos'>"+
                                doc+
                                // "<a class='infoArchDesc' download href='"+valor.ARCH.ruta_archivo+"'>"+
                                //     "<h4 class='infoArchnombre'>"+valor.ARCH.nombre+"</h4>"+
                                //     "<iframe src='"+valor.ARCH.ruta_archivo+"'>"+
                                //     "</iframe>"+
                                //     "<div class='infoArchext'>"+"<u>Archivo: "+valor.ARCH.tipo_extension+"</u></div>"+
                                // "</a>"+
                            "</div>"+
                            "<div class='AreaCalificacion'>"+
                                opcion+
                            /*
                                "<form class='formCalif' action='' method='post'>"+
                                    "<label>Calificación: "+
                                        "<input class='calif' type='number' required></input>"+
                                    "</label>"+
                                    "<button class='btncalif' type='submit'>Calificar</button>"+
                                "</form>"+*/
                            "</div>"+
                        "</div>";
                    }                

                }
                else
                {
                    alert(datosJSON.texto);
                }
                
            })                    
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
            console.log("Ya la habias entregado");
            let infoUsuario = new FormData();
            infoUsuario.append("id_U", inputH_id.value);        
            infoUsuario.append("id_Asign", userH_As_asign.value);                     
            infoUsuario.append("btnEnvioAsign", boolEntregada); 
            infoUsuario.append("BOOL", boolEntregada);     
            
            if(confirm("Esta a punto de marcar su tarea como NO COMPLETADA, ¿desea continuar?"))
            {
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
                        //refreshValues();
                        window.location="./insideAsignacion.php?asign="+userH_As_asign.value;
                    }
                    else
                    {
                        alert(datosJSON.texto);
                    }                    
                })            
            }
            
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
                    //refreshValues();
                    window.location="./insideAsignacion.php?asign="+userH_As_asign.value;
                }
                else
                {
                    alert(datosJSON.texto);
                }
                
            })            
        }
    });

    
    // if(inputH_idTU.value == 2)
    // {
    //     tuEntrega.style.display = "none";    
    //     sec_Calificaciones.style.display = "flex";
    //     console.log("aaa");
    //     let infoUsuario = new FormData();
    //     infoUsuario.append("id_U", inputH_id.value);
    //     infoUsuario.append("id_Asign", userH_As_asign.value);
    //     fetch("../../js_queries/AULAS/busquedaEntregasAlumnos.php", {
    //         method:"POST", 
    //         body: infoUsuario,
    //     }).then((response)=>{            
    //         return response.json();            
    //     }).then((datosJSON) =>{
    //         console.log(datosJSON);
    //         if(datosJSON.ok == true)
    //         {
    //             console.log(datosJSON);
    //             //alert(datosJSON.texto);   /* 
    //             for(valor of datosJSON.datos)
    //             {                                        
    //                 opciones = 
    //                         "<form class='formCalif' method='post'>"+
    //                             "<label>Calificación: "+
    //                                 "<input id='calificacion' name='calificacion' class='calif' type='number' required></input>"+
    //                             "</label>"+
    //                             "<button class='btncalif' type='submit'>Calificar</button>"+
    //                         "</form>";                    
    //                 opciones2 = 
    //                         "<div>Calificación: <strong>"+valor.calificacion+"</strong></div>";
                    
    //                 if(valor.calificacion == null)                    
    //                     opcion = opciones;                    
    //                 else
    //                     opcion = opciones2;
    //                 sec_Calificaciones.innerHTML += 
    //                 "<div class='archivosSubidos'>"+
    //                     "<h2>Entrega de:</h2>"+
    //                     "<div class='infoAlumno' data-id='"+valor.UHA_related.ID_UHA+"'>"+
    //                         "<h3 class='infoAnombre'>"+valor.UHA_related.apellido_paterno+" "+valor.UHA_related.apellido_materno+" "+" "+valor.UHA_related.nombre+"</h3>"+
    //                         "<h4 class='infoAclave'>"+valor.UHA_related.num_identificador+"</h4>"+
    //                         "<span class='infoAcorreo'>"+"Correo del alumno: "+valor.UHA_related.correo+"</span>"+
    //                         "<h3 class='infoAEedo'>"+valor.UHA_related.estado+"</h3>"+
    //                         "<div class='infoAEfecha'>"+"Entregado el: "+valor.UHA_related.fecha_entrega+"</div>"+
    //                     "</div>"+
    //                     "<div class='contenedorArchivos'>"+
    //                         "<a class='infoArchDesc' download href='"+valor.ARCH.ruta_archivo+"'>"+
    //                             "<h4 class='infoArchnombre'>"+valor.ARCH.nombre+"</h4>"+
    //                             "<iframe src='"+valor.ARCH.ruta_archivo+"'>"+
    //                             "</iframe>"+
    //                             "<div class='infoArchext'>"+"<u>Archivo: "+valor.ARCH.tipo_extension+"</u></div>"+
    //                         "</a>"+
    //                     "</div>"+
    //                     "<div class='AreaCalificacion'>"+
    //                         opcion+
    //                     /*
    //                         "<form class='formCalif' action='' method='post'>"+
    //                             "<label>Calificación: "+
    //                                 "<input class='calif' type='number' required></input>"+
    //                             "</label>"+
    //                             "<button class='btncalif' type='submit'>Calificar</button>"+
    //                         "</form>"+*/
    //                     "</div>"+
    //                 "</div>";
    //             }                

    //         }
    //         else
    //         {
    //             alert(datosJSON.texto);
    //         }
            
    //     })                    
    // }
    sec_Calificaciones.addEventListener("click", (evento) =>{
        if(evento.target.className == "btncalif")
        {
            evento.preventDefault();
            if(evento.target.parentElement[0].value != "")
            {
                console.log(evento.target);
                console.log(evento.target.form.parentElement.parentElement.children[1].dataset.id);                    
                let formCalif = evento.target.form;
                let id_UHA = evento.target.form.parentElement.parentElement.children[1].dataset.id;
                let infoUsuario = new FormData(formCalif);
                infoUsuario.append("id_UHA", id_UHA);
                //infoUsuario.append("bool", );
                
                fetch("../../js_queries/AULAS/asignarCalificacion.php", {
                    method:"POST", 
                    body: infoUsuario,
                }).then((response)=>{            
                    return response.json();            
                }).then((datosJSON) =>{
        
                    console.log(datosJSON);
                    if(datosJSON.ok == true)
                    {
                        alert("Se ha asignado una calificación");
                        //refreshValues();
                        //window.location="./insideAsignacion.php?asign="+userH_As_asign.value;
                    }
                    else
                    {
                        alert(datosJSON.texto);
                        refreshValues();
                    }
                    
                })            


            }
            else
                alert("Ingresa una calificacion a la entrega");

        }
    });







        



});