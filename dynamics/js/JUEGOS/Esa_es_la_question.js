window.addEventListener("load", ()=>{
    const clase = document.getElementById("clase");
    const privado = document.getElementById("privado");
    const menu = document.getElementById("menu");

    privado.addEventListener("click", ()=>{
        console.log("Funciona");
        menu.style.display = "none";
    });  
});