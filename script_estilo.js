//ESTE SI ES UN MODULE

// variable usada como el clasificador
let classifier;
// URL de los modelos en Teachable Machine
let imageModelURL = 'https://teachablemachine.withgoogle.com/models/BJZ4py6Xm/';

let video;
let flippedVideo;
let label = "Espera un momento...";
let predestilo;

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

if (label == "Formal"){
    emoji = "💼";
    mensaje = "Clasificación exitosa";
} else if (label == "Casual"){
    emoji = "🌤";
    mensaje = "Clasificación exitosa";
} else if (label == "Deportivo"){
    emoji = "⚽";
    mensaje = "Clasificación exitosa";
}

textSize(128);
text(emoji, width / 2, height / 2);
textSize(24);
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
predestilo = results[0].label;
localStorage.setItem("predestilo", predestilo);
// Clasificar constantemente
classifyVideo();
}