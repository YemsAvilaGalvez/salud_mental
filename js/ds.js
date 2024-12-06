// Archivo: total_registros.js
document.addEventListener('DOMContentLoaded', () => {
    // Función para obtener el total de registros
    const obtenerTotalRegistros = () => {
        fetch('../controller/controlador_ds.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ funcion: 'total_registros' })
        })
            .then(response => response.json())
            .then(data => {
                if (data.total_registros !== undefined) {
                    // Muestra el total de registros en el elemento con el id 'totalRegistros'
                    const totalElement = document.getElementById('totalRegistros');
                    if (totalElement) {
                        totalElement.textContent = ` ${data.total_registros}`;
                    }
                } else {
                    console.error("La respuesta no contiene el campo 'total_registros'.");
                }
            })
            .catch(error => console.error("Error al obtener el total de registros:", error));
    };

    // Llamamos a la función al cargar la página
    obtenerTotalRegistros();
});
