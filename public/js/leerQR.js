

//crea elemento
const video = document.createElement("video");

//nuestro camvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

//div donde llegara nuestro canvas
const btnScanQR = document.getElementById("btn-scan-qr");

//lectura desactivada
let scanning = false;

//funcion para encender la camara
// function encenderCamara() {
const encenderCamara = () => {
    navigator.permissions
        .query({ name: "camera" })
        .then((permissionObj) => {
            console.log(permissionObj.state);
            navigator.mediaDevices
                .getUserMedia({ video: { facingMode: "environment" } })
                .then(function (stream) {
                    scanning = true;
                    btnScanQR.hidden = true;
                    canvasElement.hidden = false;
                    video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
                    video.srcObject = stream;
                    video.play();
                    tick();
                    scan();
                });
        })
        .catch((error) => {
            console.log("Got error :", error);
        });
};

//funciones para levantar las funiones de encendido de la camara
function tick() {
    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

    scanning && requestAnimationFrame(tick);
}

function scan() {
    try {
        qrcode.decode();
    } catch (e) {
        setTimeout(scan, 300);
    }
}

//apagara la camara
const cerrarCamara = () => {
    video.srcObject.getTracks().forEach((track) => {
        track.stop();
    });
    canvasElement.hidden = true;
    btnScanQR.hidden = false;
};

//callback cuando termina de leer el codigo QR
qrcode.callback = (respuesta) => {
    if (respuesta) {
        // console.log(respuesta);
        // Swal.fire(respuesta + "holis")
        var ficha_id = document.getElementById(
            "ficha_id"
        ).value;

        var ambiente_id = document.getElementById("ambiente_id").value;
        var descripcion = document.getElementById("descripcion").value;
        var evento = document.getElementById("evento").value;

        // Swal.fire(respuesta + ficha_caracerizacion_id)
        if (evento == 1) {
            // Swal.fire("nos vamos a crear el registro")
            window.location.href =
                "crearEntradaSalida/" +
                ficha_caracerizacion_id +
                "/" +
                respuesta +
                "/" + ambiente_id + "/" + descripcion
                ;
        } else {
            window.location.href = "editarEntradaSalida/" + respuesta;
        }
        // activarSonido();
        // encenderCamara();
        cerrarCamara();
        encenderCamara();
    }
};
//evento para mostrar la camara sin el boton
window.addEventListener("load", (e) => {
    encenderCamara();
});

// https://www.youtube.com/watch?v=w81QJIvwOQw&ab_channel=C%C3%B3digoalinstante
