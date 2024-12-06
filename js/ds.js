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
                console.log('Total Registros:', data); // Agregado para depurar
                if (data.total_registros !== undefined) {
                    const totalElement = document.getElementById('totalRegistros');
                    if (totalElement) {
                        totalElement.textContent = `Total Registros: ${data.total_registros}`;
                    }
                } else {
                    console.error("La respuesta no contiene el campo 'total_registros'.");
                }
            })
            .catch(error => console.error("Error al obtener el total de registros:", error));
    };

    // Función para obtener el total de pacientes únicos
    const obtenerTotalPacientesUnicos = () => {
        fetch('../controller/controlador_ds.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ funcion: 'total_pacientes_unicos' })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Total Pacientes Unicos:', data); // Agregado para depurar
                if (data.total_pacientes_unicos !== undefined) {
                    const totalPacientesElement = document.getElementById('totalPacientesUnicos');
                    if (totalPacientesElement) {
                        totalPacientesElement.textContent = `Total Pacientes : ${data.total_pacientes_unicos}`;
                    }
                } else {
                    console.error("La respuesta no contiene el campo 'total_pacientes_unicos'.");
                }
            })
            .catch(error => console.error("Error al obtener el total de pacientes :", error));
    };

    // Función para obtener los pacientes de intervención y el total
    const obtenerTotalPacientesIntervencion = () => {
        fetch('../controller/controlador_ds.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ funcion: 'total_pacientes_intervencion' })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Pacientes de Intervención:', data); // Agregado para depurar
                if (data.pacientes_intervencion !== undefined) {
                    const tablaPacientesElement = document.getElementById('tablaPacientesIntervencion');
                    if (tablaPacientesElement) {
                        tablaPacientesElement.innerHTML = ''; // Limpiar tabla

                        // Crear filas para cada paciente
                        data.pacientes_intervencion.forEach(paciente => {
                            const fila = document.createElement('tr');
                            const columnaIdCita = document.createElement('td');
                            columnaIdCita.textContent = paciente.id_cita;
                            fila.appendChild(columnaIdCita);

                            const columnaNombre = document.createElement('td');
                            columnaNombre.textContent = paciente.Nombre_Paciente;
                            fila.appendChild(columnaNombre);

                            const columnaDNI = document.createElement('td');
                            columnaDNI.textContent = paciente.Numero_Documento_Paciente;
                            fila.appendChild(columnaDNI);

                            tablaPacientesElement.appendChild(fila);
                        });
                    }
                } else {
                    console.error("La respuesta no contiene el campo 'pacientes_intervencion'.");
                }

                if (data.total_intervencion !== undefined) {
                    const totalIntervencionElement = document.getElementById('totalIntervencion');
                    if (totalIntervencionElement) {
                        totalIntervencionElement.textContent = `Total de pacientes de intervención: ${data.total_intervencion}`;
                    }
                }
            })
            .catch(error => console.error("Error al obtener los pacientes de intervención:", error));
    };


    // Llamamos a las funciones al cargar la página
    obtenerTotalRegistros();
    obtenerTotalPacientesUnicos();
    obtenerTotalPacientesIntervencion();
});
