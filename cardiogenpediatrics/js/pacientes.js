function mostrarSeccion(idPaciente, tipoSeccion) {
    const secciones = ["consultas", "diagnostico", "tratamiento"];
    secciones.forEach(seccion => {
        const elemento = document.getElementById(`${seccion}-${idPaciente}`);
        if (seccion === tipoSeccion) {
            elemento.style.display = elemento.style.display === "none" ? "block" : "none";
        } else {
            elemento.style.display = "none";
        }
    });
}
