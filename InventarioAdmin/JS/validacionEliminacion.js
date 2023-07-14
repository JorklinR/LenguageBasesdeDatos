function validaEliminacion() {
    var retorno = false;
    try {
        if (confirm("¿Está segura(o) que desea eliminar el alumno?")) {
            retorno = true;
        }
    } catch (error) {
        retorno = false;
    }
    return retorno;
}