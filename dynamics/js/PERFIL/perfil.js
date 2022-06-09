window.addEventListener("load",()=>{
    const despliegue = document.getElementById("btn-despliegue"); 
    const divEditar = document.getElementById("contenedor-editar");
    const divMostrar = document.getElementById("contenedor-mostrar");
    despliegue.addEventListener("click", (evento)=>{
        divEditar.style.display = "block";
        divMostrar.style.display = "none";
      });

    //   fetch("dynamics/")
    



});


