window.addEventListener("load", ()=>{
    const inputH_id = document.getElementById("userH_id");
    const inputH_name = document.getElementById("userH_name");
    const inputH_apodo = document.getElementById("userH_apodo");
    const inputH_idTU = document.getElementById("userH_idTU");
    const inputH_tipo = document.getElementById("userH_tipo");
    const inputH_grado = document.getElementById("userH_grado");
    

    const sec_Materiales = document.getElementById("sec_Materiales");



    // const tituloNombreAsign = document.getElementById("tituloNombreAsign");
    // const infoAsign = document.getElementById("infoAsign");    
    // const tuEntrega = document.getElementById("tuEntrega");
    // const sec_Calificaciones = document.getElementById("sec_Calificaciones");

    let boolEntregada = false;    

    
    const btnCrear = document.getElementById("botonCrear");
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
        //if(inputH_idTU =)
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
    btnCrear.addEventListener("click", =>{

    });










        



});