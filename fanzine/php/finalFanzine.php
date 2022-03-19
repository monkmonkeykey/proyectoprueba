<!DOCTYPE html>
<html>
<head>
<title>Fanzinee</title>

</head>
<body>
<?php

$tema = $_POST['tema'];

$entrada = $_POST['tema'];


//Cambio de caracteres
$resultado = str_replace("á", "%C3%A1", $entrada);
$resultado = str_replace("é", "%C3%A9", $resultado);
$resultado = str_replace("í", "%C3%AD", $resultado);
$resultado = str_replace("ó", "%C3%B3", $resultado);
$resultado = str_replace("ú", "%C3%BA", $resultado);
$resultado = str_replace("Á", "%C3%81", $resultado);
$resultado = str_replace("É", "%C3%89", $resultado);
$resultado = str_replace("Í", "%C3%8D", $resultado);
$resultado = str_replace("Ó", "%C3%93", $resultado);
$resultado = str_replace("Ú", "%C3%9A", $resultado);
$resultado = str_replace(" ", "+", $resultado);
$resultado = str_replace(",", "", $resultado);
$resultado = str_replace(":", "", $resultado);
$resultado = str_replace(";", "", $resultado);

// key del api
//$key = "d1e4586edc97a2358f702b9664a49ccdc1936e31bc8fd004a821c33036a5161d";

//Lectura archivo JSON que da el api de Noticias
$datanoticias = file_get_contents("https://serpapi.com/search.json?engine=google&q=". $resultado ."&location=Mexico&google_domain=google.com.mx&gl=mx&hl=es&tbm=nws&api_key=d1e4586edc97a2358f702b9664a49ccdc1936e31bc8fd004a821c33036a5161d");

//$datanoticias = file_get_contents("https://serpapi.com/searches/67180c56cfcaba56/5ff1348444820437e1197814.json");

//$datanoticias = file_get_contents("https://serpapi.com/searches/1d6e13f0828d92ae/5ed0a363d47b515a0a1e77f0.json");
$noticias = json_decode($datanoticias, true);



//Lectura archivo JSON que da el api de Imagenes
$dataimagen = file_get_contents("https://serpapi.com/search.json?engine=google&q=". $resultado . "&location=Mexico&google_domain=google.com.mx&gl=mx&hl=es&ijn=0&tbm=isch&api_key=d1e4586edc97a2358f702b9664a49ccdc1936e31bc8fd004a821c33036a5161d");

//$dataimagen = file_get_contents("https://serpapi.com/searches/c19bcd425f6a56cf/5ff134851538a10481d834be.json");

//$dataimagen = file_get_contents("https://serpapi.com/searches/9760145eee0f19fa/5ed0a364d2c7d145984b2d76.json");

$imagenes = json_decode($dataimagen, true);

$micarpeta = "temporal";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}
if (!file_exists("re")) {
    mkdir("re", 0777, true);
}

$todasnoticias = ($noticias['news_results']);  
//echo "El número de noticias es:" . count($todasnoticias);
$numeroNoticias = count($todasnoticias);
// print_r($todos[2]['title']);
/*
for ($i = 1; $i <= $numeroNoticias; $i++) {
  echo $i . ":" . "\n";
  echo ($todasnoticias[$i]['snippet']. "\n");
  echo "\n";

}
*/

/*
$uno    = ($todasnoticias[0]['snippet']);
$dos    = ($todasnoticias[1]['snippet']);
$tres   = ($todasnoticias[2]['snippet']);
$cuatro = ($todasnoticias[3]['snippet']);
$cinco  = ($todasnoticias[4]['snippet']);
$seis   = ($todasnoticias[5]['snippet']);
$siete  = ($todasnoticias[6]['snippet']);
$ocho   = ($todasnoticias[7]['snippet']);
$nueve  = ($todasnoticias[8]['snippet']);
$diez   = ($todasnoticias[9]['snippet']);
*/




   $todasimagenes = ($imagenes['images_results']);  
   $numeroImagenes = count($todasimagenes);
  //echo "El número de imagenes es:" . count($todasimagenes);
/*
   for ($i = 1; $i <= $numeroImagenes; $i++) {
    echo $i . ":" . "\n";
    echo ($todasimagenes[$i]['original']. "\n");
    echo "\n";
  
  }
  */
  // print_r($todasimagenes[2]['title']);
  /*
  $imguno       = ($todasimagenes[0]['original']);
  $imgdos       = ($todasimagenes[1]['original']);
  $imgtres      = ($todasimagenes[2]['original']);
  $imgcuatro    = ($todasimagenes[3]['original']);
  $imgcinco     = ($todasimagenes[4]['original']);
  $imgseis      = ($todasimagenes[5]['original']);
  $imgsiete     = ($todasimagenes[6]['original']);
  $imgocho      = ($todasimagenes[7]['original']);
  $imgnueve     = ($todasimagenes[8]['original']);
  $imgdiez      = ($todasimagenes[9]['original']);
  */
  for ($iImg = 0; $iImg <= 20; $iImg++) {
    unlink ('temporal/'. $iImg .'.jpg');
    }
    for ($iImg = 0; $iImg <= 20; $iImg++) {
        unlink ('re/'. $iImg .'.jpg');
        }

  for ($iImg = 0; $iImg <= 20; $iImg++) {
    copy(($todasimagenes[$iImg]['original']), 'temporal/'. $iImg .'.jpg');
  
  }
  $numero = 1;
  $uno =0;
  $resta =0;
  
  
  for ($actual =0; $actual <= 20; $actual++) {
   
  
      if (file_exists('temporal/'.$actual.'.jpg')) {
          $uno++;
          rename('temporal/'.$actual. '.jpg','re/'.$uno.'.jpg');
        } 
        else {
          // echo "la imagen que no existe es: " . $actual;
           $nuevo = $actual;
           $nuevo - 1;
        }
      
      
      }


  //    echo $imguno; 
  
 /*

    $ext = end(explode(".",($todasimagenes[0]['original']));
    
    $nombre = uniqid().'.'.$ext;
    echo $nombre;
    copy($imguno, "imagenes/".$nombre);
*/


//Crea el archivo de texto y lo rellena
$fi = fopen ("temporal/temporal.txt", "w")


or die("problemas al crear archivo temporal");
fwrite($fi,$_POST['tema']);
fwrite($fi,"\n");
fwrite($fi,"\n");

$file = fopen ("temas.txt", "w")


or die("problemas al crear archivo temas");
fwrite($file,$_POST['tema']);
fclose($file);



//Recorre todas las noticias y las va escribiendo en el txt
for ($i = 1; $i <= $numeroNoticias; $i++) {

$noticiaActual = ($todasnoticias[$i]['snippet']);
$longitudnoticia = strlen($noticiaActual);
if ($longitudnoticia > 1) {
  $sinpuntos = str_replace("...", "", $noticiaActual);
  $sinsalto = str_replace("\n", "", $sinpuntos);
  //fwrite($fi, ($sinpuntos. "." . "\n"));
  fwrite($fi, ($sinsalto. "." . "\n"));
  
} else {
  //echo "no existe la noticia" . $i;
}
//echo ($todasnoticias[$i]['snippet']. "\n");

}
sleep(10);
$directorio = "http://lynnettecampos.com/fanzine/fanzine.html";
?>

<script type="text/javascript">

var opcionesImagenes = "width= 400 ,height=400,scrollbars=NO, left=1200, top=100";
var opcionesNoticias = "width= 400,height=400,scrollbars=NO, left=1200, top= 800" ;
var tema = '<?php echo $resultado;?>';
var direccion = '<?php echo $directorio?>';
var ventanaNoticias;
var ventanaImagenes;
var ancho =window.screen.height;

ventanaNoticias = window.open("https://news.google.com/search?q=" + tema + "&hl=es-419&gl=MX&ceid=MX%3Aes-419","Noticias Google", opcionesNoticias);
ventanaImagenes = window.open("https://www.google.com/search?q=" + tema + "&source=lnms&tbm=isch&sa=X&ved=2ahUKEwj5j-69gNHpAhUJPK0KHQKDBEwQ_AUoAXoECBMQAw&biw=2064&bih=1152","Imagenes Googles", opcionesImagenes);
window.location.replace(direccion);

</script>

</body>
</html>