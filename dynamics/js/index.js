window.addEventListener("load", ()=>{
        
    const tipoBtn = document.getElementById("div_tipoUser");
    const contenedor = document.getElementById("contenedor");
    const hidden_input = document.getElementById("tipo_U");

    console.log("NoPAPU");
    let tipoBoton = 1; /*1 = alumno, 2 profesor, 3 mod, 4 admin*/
    tipoBtn.addEventListener("click", (evento) =>{
        console.log(evento.target);
        if(evento.target.id == "btn_alumno")
        {
            tipoBoton = 1;            

            evento.target.parentElement.children[1].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
        }
        else if(evento.target.id == "btn_docente")
        {
            tipoBoton = 2;

            evento.target.parentElement.children[0].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";

            // evento.target.parentElement.children[3].style.display = "grid" <-------------------Para cuando se muestren los admins y moders
        }
        else if(evento.target.id == "btn_moder")
        {
            tipoBoton = 3;

            evento.target.parentElement.children[3].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
        }
        else if(evento.target.id == "btn_admin")
        {
            tipoBoton = 4;

            evento.target.parentElement.children[2].style.border = "none";
            evento.target.style.border = "4px solid #eeb02d";
        }
        console.log(tipoBoton);
        hidden_input.value = tipoBoton;
    });

    


    contenedor.addEventListener("click", (evento) =>{
                
        console.log(hidden_input.value);

        //if(evento.target.id == "enviar_alumnos")
    });









});