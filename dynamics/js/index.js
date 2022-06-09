window.addEventListener("load", ()=>{
        
    const tipoBtn = document.getElementById("div_tipoUser");
    const contenedor = document.getElementById("contenedor");
    const hidden_input = document.getElementById("tipo_U");
    const formulario = document.getElementById("div_formAlum");
    const cunata_or_rfc = document.getElementById("cuenta_or_rfc");

    const fakeLink = document.getElementById("fakeLink");

    console.log("NoPAPU");
    let tipoBoton = 1;/*1 = alumno, 2 profesor, 3 mod, 4 admin*/
    hidden_input.value = 1;
    tipoBtn.children[0].style.border = "4px solid #eeb02d";
    if(tipoBtn.children[0].style.display == "none")
    {
        tipoBoton = 3;    
        tipoBtn.children[2].style.border = "4px solid #eeb02d";
        hidden_input.value = 3;

    }

     
    tipoBtn.addEventListener("click", (evento) =>{
        console.log(evento.target);
        if(evento.target.id == "btn_alumno")
        {
            tipoBoton = 1;            

            evento.target.parentElement.children[1].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[2].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[3].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            formulario.style.left = "0%";
            cunata_or_rfc.innerHTML = "Número de cuenta:";
        }
        else if(evento.target.id == "btn_docente")
        {
            tipoBoton = 2;

            evento.target.parentElement.children[0].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[2].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[3].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";            
            console.log(formulario);
            formulario.style.left = "60%";
            cunata_or_rfc.innerHTML = "RFC:";
            // evento.target.parentElement.children[3].style.display = "grid" <-------------------Para cuando se muestren los admins y moders
        }
        else if(evento.target.id == "btn_moder")
        {
            tipoBoton = 3;

            evento.target.parentElement.children[0].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[1].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[3].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            formulario.style.left = "0%";
            cunata_or_rfc.innerHTML = "RFC:";     
        }
        else if(evento.target.id == "btn_admin")
        {
            tipoBoton = 4;

            evento.target.parentElement.children[0].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[1].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            evento.target.parentElement.children[2].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
            formulario.style.left = "60%";
            cunata_or_rfc.innerHTML = "RFC:";
        }
        console.log(tipoBoton);
        hidden_input.value = tipoBoton;
    });

    

    const form = document.getElementById("form_user");
    const ident = document.getElementById("identIdent");
    const contra = document.getElementById("contrasena");

    form.addEventListener("reset", (evento) =>{
        evento.preventDefault();
        ident.value = "";
        contra.value = "";
        if(tipoBtn.children[2].style.display == "none")
        {
            tipoBoton = 1;
            hidden_input.value = 1;
            tipoBtn.children[0].style.border = "4px solid #eeb02d";
            tipoBtn.children[1].style.border = "none";
        }
        else if(tipoBtn.children[0].style.display == "none")
        {
            console.log("WHAT")
            tipoBoton = 3;
            hidden_input.value = 3;
            tipoBtn.children[2].style.border = "4px solid #eeb02d";
            tipoBtn.children[3].style.border = "none";
        }

        console.log(tipoBoton);
    });

    
    contenedor.addEventListener("click", (evento) =>{
                
        //console.log(hidden_input.value);
        /*
        if(evento.target.id == "reset")
        {
            if(tipoBtn.children[2].style.display == "none")
            {
                tipoBoton = 1;
                tipoBtn.children[0].style.border = "4px solid #eeb02d";
                tipoBtn.children[1].style.border = "none";
            }
            else if(tipoBtn.children[0].style.display == "none")
            {
                tipoBoton = 3;
                hidden_input.value = 3;
                tipoBtn.children[2].style.border = "4px solid #eeb02d";
                tipoBtn.children[3].style.border = "none";
            }
            console.log(tipoBoton);            
            
        }*/        
    });


    fakeLink.addEventListener("click", (evento) =>{                        
        window.location = "./registroUsuarios.php?user="+tipoBoton;        
    });









});