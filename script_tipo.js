//ESTE SI ES UN MODULE

// variable usada como el clasificador
let classifier;
// URL de los modelos en Teachable Machine
let imageModelURL = 'https://teachablemachine.withgoogle.com/models/w9anpys_S/';

let video;
let flippedVideo;
let label = "Espera un momento...";
let Tipo;

// Cargar los mdoelos
export function preload() {
classifier = ml5.imageClassifier(imageModelURL + 'model.json');
}

export function setup() {
createCanvas(224, 224);
// Crear el video
video = createCapture(VIDEO);
video.size(224, 224);
video.hide();

flippedVideo = ml5.flipImage(video)
// Realizar la clasificacion
classifyVideo();
}

export function draw() {
background(0);
// Imprimir el video
image(flippedVideo, 0, 0);

// Imprimir el resultado
fill(300);
textSize(24);
textAlign(CENTER);
text(label, width / 2, height - 16);

let emoji = "";
let mensaje = "";


if (label == "Abrigo"){
    emoji = "🧥";
    mensaje = "Clasificación exitosa";
} else if (label == "Bolsa"){
    emoji = "👜";
    mensaje = "Clasificación exitosa";
} else if (label == "Bota"){
    emoji = "👢";
    mensaje = "Clasificación exitosa";
} else if (label == "Camisa"){
    emoji = "👔";
    mensaje = "Clasificación exitosa";
} else if (label == "Playera"){
    emoji = "👕";
    mensaje = "Clasificación exitosa";
} else if (label == "Pantalon"){
    emoji = "👖";
    mensaje = "Clasificación exitosa";
} else if (label == "Sandalia"){
    emoji = "👡";
    mensaje = "Clasificación exitosa";
} else if (label == "Sudadera"){
    emoji = "🙍‍♂️";
    mensaje = "Clasificación exitosa";
} else if (label == "Teni"){
    emoji = "👟";
    mensaje = "Clasificación exitosa";
} else if (label == "Vestido"){
    emoji = "👗";
    mensaje = "Clasificación exitosa";
} else if (label == "Tacon"){
    emoji = "👠";
    mensaje = "Clasificación exitosa";
}
else if (label == "Blusa"){
    emoji = "👚";
    mensaje = "Clasificación exitosa";
}
else if (label == "Zapato"){
    emoji = "👞";
    mensaje = "Clasificación exitosa";
}
else if (label == "Chamarra"){
    emoji = "🧥";
    mensaje = "Clasificación exitosa";
}
else if (label == "Falda"){
    emoji = "👗";
    mensaje = "Clasificación exitosa";
}

textSize(64);
text(emoji, width / 2, height / 2);
textSize(12);
text(mensaje, width / 2, height / 1.2);
}

// Realizar la prediccion con la camara
function classifyVideo() {
flippedVideo = ml5.flipImage(video)
classifier.classify(flippedVideo, gotResult);
}

// Obtener el resultado
function gotResult(error, results) {
if (error) {
    console.error(error);
    return;
}
// Los resultados se encuentran dentro de un array
label = results[0].label;
Tipo = results[0].label;
localStorage.setItem("Tipo", Tipo);
// Clasificar constantemente
classifyVideo();
}