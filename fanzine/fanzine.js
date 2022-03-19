let hoja = 0;
//PDF
 var pdf;

//Básicas
let FONT_OTF;
let nImagenesTema = 12;
let temas;
let i;
let j;


let coloresEllipse = [];
let seleccionado = 0;
let segundero = 0;



//ArregloImagenes
let arregloImagenes = [];
let imagenActual = 0;
let textoNoticias;
let textoApi;
let arregloFuentes =[];
let arregloRandoms = [];
let rand1= 0;
let rand2= 0;
let rand3= 0;
let rand4= 0;
let rand5= 0;
let rand6= 0;
let rand7= 0;

let rand8= 0;
let rand9= 0;
let rand10= 0;
let rand11= 0;

let banderaCarga = 0;

let jalate;

//
var pantallaGoogle;

function preload() {
//FONT_OTF = loadFont("resource/arial.ttf");
  temas = loadStrings('php/temas.txt');


  for(i=0; i< temas.length; i++){
    coloresEllipse[i] = 0;
  }

  for(i=1;i<12;i++){
    arregloFuentes[i-1]= loadFont("resource/tip/"+i+".ttf");
  }
  arregloFuentes[12]=loadFont("resource/tip/otf1.otf");
  
  for (var i = 0; i <20; i++) {
    arregloRandoms[i] =int(random(12));
  }
  for(var k=1; k<12;k++){
    arregloImagenes[k]= loadImage('php/re/'+ k+ '.jpg');
  }
  /*
  arregloImagenes[0]= loadImage('php/re/'+ 0+ '.jpg');
  arregloImagenes[1]= loadImage('php/re/'+ 1+ '.jpg');
  arregloImagenes[2]= loadImage('php/re/'+ 2+ '.jpg');
  arregloImagenes[3]= loadImage('php/re/'+ 3+ '.jpg');
  arregloImagenes[4]= loadImage('php/re/'+ 4+ '.jpg');
  arregloImagenes[5]= loadImage('php/re/'+ 5+ '.jpg');
  arregloImagenes[6]= loadImage('php/re/'+ 6+ '.jpg');
  arregloImagenes[7]= loadImage('php/re/'+ 7+ '.jpg');
  arregloImagenes[8]= loadImage('php/re/'+ 8+ '.jpg');
  arregloImagenes[9]= loadImage('php/re/'+ 9+ '.jpg');
  arregloImagenes[10]= loadImage('php/re/'+ 10+ '.jpg');
  arregloImagenes[11]= loadImage('php/re/'+ 11+ '.jpg');
  arregloImagenes[12]= loadImage('php/re/'+ 12+ '.jpg');
  */
  
}

function setup() {
  createCanvas(1080,710,P2D);
  //createCanvas(	792 x 612,P2D)
  pdf = createPDF();
  pdf.beginRecord();

  
  seleccionado = loadStrings('php/temas.txt'); 


    
  
  textoNoticias= loadStrings('php/temporal/temporal.txt');
  textoApi= loadStrings('php/temporal/temporal.txt');
             
           
hoja+=1;
}

function draw() {
  background(255);
  
  /* Página 8 y 1*/

  if (hoja== 1) {
    background(255);
   
    textFont(arregloFuentes[arregloRandoms[0]]);
    textSize(50);
    text("@Google",width/7,((height/20)*9),500,300);

    textSize(24);
    text(textoApi[0],((width/7)*4),height/9,450,300);
   
    imageMode(CENTER);
    image(arregloImagenes[2],((width/8)*6),((height/8)* 4.8), 450, 450);
    
    filter(THRESHOLD);
    textSize(14);
    text("8",50,height-50,30,30);
    text("1",width-50,height-50,30,30);

  
  
      
      if (hoja== 1 && frameCount % 60 == 0 && segundero <4  ) { 
        segundero+=1;
        console.log("Segundero esta en: " + segundero);
      }

      if(segundero==3){
        pdf.nextColumn();
        hoja+=1;
        segundero=0;

      }
    }
    /* Página 2 y 7 */
    if(hoja== 2){
      background(255);
      /*
      line(0,0,0,height)
      line(0,height/2,width,height/2);
      line(width/2,0,width/2,height);
      line(width,0,width,height);
      */
      textFont(arregloFuentes[arregloRandoms[0]]);
      textSize(24);
      text(textoApi[1],((width/7)*4),height/9,400,400);
      text(textoApi[2],((width/7)*4),((height/9)*5),400,400);
      
      //translate(-105,0);
      //imageMode(CENTER);
      imageMode(CENTER);
      image(arregloImagenes[1],123,205,150,150);
      image(arregloImagenes[2],273,205,150,150);
      image(arregloImagenes[3],423,205,150,150);

      image(arregloImagenes[4],123,355,150,150);
      image(arregloImagenes[5],273,355,150,150);
      image(arregloImagenes[6],423,355,150,150);

      image(arregloImagenes[7],123,505,150,150);
      image(arregloImagenes[8],273,505,150,150);
      image(arregloImagenes[9],423,505,150,150);


      filter(THRESHOLD);

      textSize(14);
      text("2",50,height-50,30,30);
      text("7",width-50,height-50,30,30);

      /*
      for (var i = 0; i <3; i++) {
        for (var j = 0; j <3; j++) {
        image(arregloImagenes[arregloRandoms[i + (j*3)]],150 + (i*150),150 + (j*150),150,150);
        
       
        }
        
        
      }
    */
      
      if (hoja== 2 && frameCount % 60 == 0 && segundero <4  ) { 
        segundero+=1;
      }

      if(segundero==3){
        pdf.nextColumn();
        hoja+=1;
        segundero=0;
      }
   
    }
     /*Hoja 3*/

    /* Página 6 y 3 */
    if(hoja== 3){
      background(255);
      /*
      line(0,0,0,height)
      line(0,height/2,width,height/2);
      line(width/2,0,width/2,height);
      line(width,0,width,height);
*/
      image(arregloImagenes[arregloRandoms[6]], width/4, ((height/3)*2), 400, 400);
      filter(THRESHOLD);
      
      textFont(arregloFuentes[arregloRandoms[0]]);
      textSize(60);
      text(seleccionado,width/9,height/5,450,300);
      
      
      
      textFont(arregloFuentes[arregloRandoms[0]]);
      textSize(24);
      text(textoApi[3],((width/7)*4),((height/9)*2),400,400);
      text(textoApi[4],((width/7)*4),((height/9)*6),400,400);

      textSize(14);
      text("6",50,height-50,30,30);
      text("3",width-50,height-50,30,30);
     
      
      if (hoja== 3 && frameCount % 60 == 0 && segundero <4  ) { 
        segundero+=1;
      }

      if(segundero==3){
        pdf.nextColumn();
        hoja+=1;
        segundero=0;
      }
    }
    /* Página 4 y 5 */
    if(hoja== 4){

      background(255);
      /*
      line(0,0,0,height)
      line(0,height/2,width,height/2);
      line(width/2,0,width/2,height);
      line(width,0,width,height);
*/
      imageMode(CENTER);
      image(arregloImagenes[10], ((width/6)*2), ((height/5)*2), 250, 250);
      filter(THRESHOLD);
      image(arregloImagenes[11], ((width/6)*1), ((height/5)*3), 250, 250);
      filter(THRESHOLD);
    
      textFont(arregloFuentes[arregloRandoms[0]]);
      textSize(24);
      text(textoApi[5],((width/7)*4),height/9,300,300);
      text(textoApi[6],((width/7)*4),((height/9)*4),300,300);
      
      textSize(14);
      text("4",50,height-50,30,30);
      text("5",width-50,height-50,30,30);
      
      
      if (hoja== 4 && frameCount % 60 == 0 && segundero <4  ) { 
        segundero+=1;
      }

      if(segundero==3){
        pdf.endRecord();
        pdf.save();
        
      hoja+=1;
      segundero=0;
      }
    }

}
