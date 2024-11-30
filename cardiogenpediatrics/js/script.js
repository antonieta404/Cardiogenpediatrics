function playSound() {
    const sound = document.getElementById("ambulanciaSound");
    sound.currentTime = 0; // Reinicia el audio por si no terminó
    sound.play();
}

function stopSound() {
    const sound = document.getElementById("ambulanciaSound");
    sound.pause(); // Detiene el sonido
    sound.currentTime = 0; // Reinicia el audio para que empiece desde el inicio
}
