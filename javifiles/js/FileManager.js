/**
 * Clase para gestionar directorios seleccionados
 * por el usuario desde el navegador.
 *
 * @class FileManager
 */
class FileManager {

    /**
     * Obtiene la información de los archivos
     * seleccionados por el usuario.
     *
     * @param {FileList} files
     * Lista de archivos obtenida desde un input HTML.
     *
     * @returns {Object[]}
     * Array con información de cada fichero.
     */
    obtenerFicheros(files) {

        return Array.from(files).map(file => ({
            nombre: file.name,
            ruta: file.webkitRelativePath,
            tamaño: file.size,
            tipo: file.type,
            ultimaModificacion: new Date(file.lastModified)
        }));
    }
}
