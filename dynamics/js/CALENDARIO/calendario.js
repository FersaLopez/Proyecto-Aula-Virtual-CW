window.addEventListener("load", ()=>{

    //obtener datos de la fecha por php
    let diaMes = document.getElementById("3")
    let diaSem = document.getElementById("4")
    let mes = document.getElementById("5")
    let year = document.getElementById("6")
    let aBisiesto = document.getElementById("abis")
    
    //variables para probar funcionamiento
    // diaMes.value = 29
    // diaSem.value = 8
    // mes.value= 2
    //     year.value = 2024
    //     // aBisiesto = year
    // aBisiesto.value = 2024
    
    
    //obtener elementos html
    const calendario = document.getElementById("calendario")
    const textFecha = document.getElementById("textFecha")
    let gridCalen = document.getElementById("gridCalen")
    let fila6 = document.getElementById("fila6")
    const eventosMes = document.getElementById("eventosMes")
    const eventosMesRang = document.getElementById("eventosMesRang");
    
    
    
//Peticiones fetch

    //eventos de un dia
    fetch("../../../php/pageGates/CALENDARIO/eventos.php")
    .then((response)=>{
        return response.json();
    })
    .then((datosJson)=>{
        console.log(datosJson)
        if(datosJson == 0)
        {
            eventosMes.innerHTML += "<div class='textoEvento'>no hay eventos</div>"
        }
        else
        {
            for(valor of datosJson)
            {
                 eventosMes.innerHTML += "<div class='textoEvento'>"+valor.dia+" : " + valor.titulo+"</div>"
            }
        }         
                
                
    })

    //eventos rangos
    fetch("../../../php/pageGates/CALENDARIO/eventos_rang.php")
    .then((response)=>{
        return response.json();
    })
    .then((datosJson)=>{
        console.log(datosJson)
        if(datosJson == 0)
        {
            eventosMesRang.innerHTML += "<div class='textoEvento'>no hay eventos</div>"
        }
        else
        {
            for(valor of datosJson)
            {
                eventosMesRang.innerHTML += "<div class='textoEvento'>"+valor.dia_inicio+" : " + valor.titulo+"</div>"
            }
        }        
                
                
    })
    
    
    
    
    
    
    
    
    // const agregarEvento = document.getElementById("agregarEvento")
    
    dibujarCalendario();
    
    
    function dibujarCalendario(){
        // console.log(mes.value)
    
        //ver si se puede optimizar con la base de datos 
        if(mes.value){    
            //ver si se puede optimizar con la base de datos 
            if(mes.value == 1)
            {
                textFecha.innerHTML = "<div>Enero de "+ year.value+"</div>";
            }
            else if (mes.value == 2)
            {
                textFecha.innerHTML = "<div>Febrero de "+ year.value+"</div>";
            }
            else if (mes.value == 3)
            {
                textFecha.innerHTML = "<div>Marzo de "+ year.value+"</div>";
            }
            else if (mes.value == 4)
            {
                textFecha.innerHTML = "<div>Abril de "+ year.value+"</div>";
            }
            else if (mes.value == 5)
            {
                textFecha.innerHTML = "<div>Mayo de "+ year.value+"</div>";
            }
            else if (mes.value == 6)
            {
                textFecha.innerHTML = "<div>Junio de "+ year.value+"</div>";
            }
            else if (mes.value == 7)
            {
                textFecha.innerHTML == "<div>Julio de "+ year.value+"</div>";
            }
            else if (mes.value == 8)
            {
                textFecha.innerHTML == "<div>Agosto de "+ year.value+"</div>";
            }
            else if (mes.value == 9)
            {
                textFecha.innerHTML == "<div>Septiembre de "+ year.value+"</div>";
            }
            else if (mes.value == 10)
            {
                textFecha.innerHTML == "<div>Octubre de "+ year.value+"</div>";
            }
            else if (mes.value == 11)
            {
                textFecha.innerHTML == "<div>Noviembre de "+ year.value+"</div>";
            }
            else if (mes.value == 12)
            {
                textFecha.innerHTML == "<div>Diciembre de "+ year.value+"</div>";
            }
            
        }
        
    // function inicioSemana()
    // {
        let diaInicio 
        if(diaMes.value == diaSem.value)
        {
            diaInicio = diaMes.value
        }
        // else if(diaMes == 7)
        // {
        //     diaInicio = 1
        // }
        else{
            let contG =0;
            let contDiaMes = diaMes.value;
            if(diaSem)
            {
                let contDiaSem = diaSem.value        
                do
                {
                    //va recorriendo los dias hasta llegar al dia 1 sentido contratio
                    contDiaSem--;
                    //cada que llega al lunes 
                    if(contDiaSem==0){
                        //regresa al domingo
                        contDiaSem = 8
                        //se suma el contador para saber cuantas veces se reinició la cuenta
                        contG += 1;
                    }
                    contDiaMes--
                    // contG--
                }while(contDiaMes >0)
                 diaInicio = contDiaSem - contG +1
                if(diaInicio == 8)
                {
                    diaInicio=1
                }
                if(diaInicio == 0)
                diaInicio=7
            }
            // console.log("dia inicio"+diaInicio)
        }
    // }
    
    
    
    
    // function numeroDias(){
        let numeroDiasMes = 0;
        // console.log(mes.value)
        //si el mes es par
        if(mes.value == 4 || mes.value == 6 || mes.value == 9 || mes.value == 11)
        {
            numeroDiasMes = 30
            // console.log("tiene 30 dias" +  numeroDiasMes)
        }
        //si el mes febrero
        else if(mes.value == 2)
        {
            //si el año es bisiesto
            if((aBisiesto.value % 4) == 0)
            {
                numeroDiasMes = 29
                // console.log("bisiesto" + numeroDiasMes)
            }
            //si el año no es bisiesto
            else
            {
                numeroDiasMes = 28
                // console.log("no bisiesto"+  numeroDiasMes)
            }
        }
            //si el mes es par pero no es febrero
        else{
            numeroDiasMes = 31
                
        }
        
        
        //saber cuantos dias hay antes de iniciar el mes en el calendario
        let diasAntes
        let diasAn= 7 - diaInicio + 1;
        diasAntes = 7 - diasAn
        
    
    
        //variables para comprobar
        // console.log("Inicio mes"+diaInicio)
        // console.log("mes"+mes.value)
        // console.log("Dia mes actual"+diaMes.value)
        // console.log("Dia semana actual"+diaSem.value)
        // console.log("numero de dias del mes"+numeroDiasMes)
        // console.log("dias antes"+diasAntes)
    
    
        let contDiasAntes
        let ponerDiasFilas
        let ponerID = 1
        // if(diasAntes){
        //     console.log(100)
            contDiasAntes = diasAntes;
            //dibuja los dias antes de que empiece el mes
            if(diasAntes != 0)
            {
            do
            {
                if(diasAntes)
                fila6.innerHTML +="<div class='diasNulos'></div>";
                contDiasAntes--
            }while(contDiasAntes)
        }
            //dibuja los primeros dias del mes de la primer fila
            contDiasAntes= 7 - diaInicio + 1
            do
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }
                contDiasAntes--
                ponerID++
            }while(contDiasAntes!=0)
            //para poner la segunda fila
            ponerDiasFilas=7
            do
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }            
                ponerDiasFilas--
                ponerID++ 
            }while(ponerDiasFilas!=0)
                // console.log("id cont"+ponerID)
            //para poner la tercera fila
            ponerDiasFilas=7
            do
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }            
                ponerDiasFilas--
                ponerID++ 
            }while(ponerDiasFilas!=0)
            // console.log("id cont"+ponerID)
            //para poner la cuarta fila
            ponerDiasFilas=7
            do
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }            
                ponerDiasFilas--
                ponerID++ 
            }while(ponerDiasFilas!=0)
            //verificar si la fila 5 es la ultima
            ponerDiasFilas=7
            do
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }
                ponerDiasFilas--
                ponerID++ 
    
                //si los dias se acabaron entonces se termina en esa fila
                if(ponerID>numeroDiasMes)
                {
                    ponerDiasFilas=0
                }
                else{
                    ultimaFila = numeroDiasMes - ponerID
                }
               
            }while(ponerDiasFilas!=0)
            //si todavia hay dias que agregar
            if(ponerID - 1 <=  numeroDiasMes)
            {        
            while(ponerID<=numeroDiasMes)
            {
                if(ponerID==diaMes.value)
                {
                    fila6.innerHTML += "<div id='"+ponerID +"' class='hoy'>"+ponerID+"</div>";
                }
                else{
                    fila6.innerHTML += "<div id='"+ponerID +"' class='dias'>"+ponerID+"</div>";
                }
                ponerID++ 
            }
        }
     
    
    }
    
    });
    
    
    