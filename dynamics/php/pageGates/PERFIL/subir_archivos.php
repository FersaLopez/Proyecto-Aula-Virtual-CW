
<?php
session_id("sesion-act");
session_name("AULA_CW");


session_start();
echo " 
        <form action='./subir_archivos.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <label>Nombre</label>
                <input type='text' name='nombre'><br/>
                <input type='file' name='archivo'><br/>
                <input type='submit' Value='Subir'>
                <input type='reset'>

            </fieldset>
        </form>
        ";
        if(isset($_FILES['archivo'])){
            $nombre = $_POST['nombre']; 
            $name = $_FILES['archivo']['name']; 
            $ext = pathinfo($name, PATHINFO_EXTENSION); //imprimiendo la extensión del archivo
            echo $name;
            $arch=$_FILES['archivo']['tmp_name'];
            //Para seleccionar un archivo y enviarlo a la carpeta que deseamos, en este caso es statics
            rename($arch, "../pageGates../php../dynamics../Proyecto-Aula-Virtual-CW./statics/img/$nombre.$ext"); 
            
        }
        else{
            $carpeta=opendir("../pageGates../php../dynamics../Proyecto-Aula-Virtual-CW./statics/img"); 
            $archivos=[]; //Arreglo vacío para añadirle cosas
            $hay_archivos=true; 
            $i=0; 
            while($hay_archivos){
                $archivo1 = readdir($carpeta); 
                if($archivo1!=false){ 
                    $i++; 
                    array_push($archivos, $archivo1);
                }
                else{ 
                    $hay_archivos=false; 
                }
            }
            print_r($archivos);
            if($i>=3){
                echo "<h1>Estos son mis archivos</h1>"; 
                foreach($archivos as $llave => $value){
                    if($value!='.' && $value!='..'){
                    echo "<img src='../pageGates../php../dynamics../Proyecto-Aula-Virtual-CW./statics/img/$value'>"; 
                    }
                }
            }
            else{
                echo "no tienes imágenes"; 
            }
            closedir($carpeta);
        }

        // C:\xampp\htdocs\Aula_virtual\Proyecto-Aula-Virtual-CW\statics\img
?>
    
