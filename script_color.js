// variable usada como el clasificador
let classifier;
// URL de los modelos en Teachable Machine
let imageModelURL = 'https://teachablemachine.withgoogle.com/models/V2hL3js9y/';

let video;
let flippedVideo;
let label = "Espera un momento...";
let Color;

// Cargar los mdoelos
function preload() {
classifier = ml5.imageClassifier(imageModelURL + 'model.json');
}

function setup() {
createCanvas(224, 224);
// Crear el video
video = createCapture(VIDEO);
video.size(224, 224);
video.hide();

flippedVideo = ml5.flipImage(video)
// Realizar la clasificacion
classifyVideo();
}

function draw() {
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


if (label == "Amarillo"){
    emoji = "🟡";
    mensaje = "Clasificación exitosa";
} else if (label == "Azul"){
    emoji = "🔵";
    mensaje = "Clasificación exitosa";
} else if (label == "Blanco"){
    emoji = "⚪";
    mensaje = "Clasificación exitosa";
} else if (label == "Cafe"){
    emoji = "🟤";
    mensaje = "Clasificación exitosa";
} else if (label == "Morado"){
    emoji = "🟣";
    mensaje = "Clasificación exitosa";
} else if (label == "Negro"){
    emoji = "⚫";
    mensaje = "Clasificación exitosa";
} else if (label == "Rosa"){
    emoji = "🎀";
    mensaje = "Clasificación exitosa";
} else if (label == "Verde"){
    emoji = "🟢";
    mensaje = "Clasificación exitosa";
} else if (label == "Rojo"){
    emoji = "🔴";
    mensaje = "Clasificación exitosa";
} else if (label == "Naranja"){
    emoji = "🟠";
    mensaje = "Clasificación exitosa";
} else if (label == "Gris"){
    emoji = "🔘";
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
Color = results[0].label;
localStorage.setItem("Color", Color);
// Clasificar constantemente
classifyVideo();
}