// Asegurarse de que el DOM esté completamente cargado
window.addEventListener("DOMContentLoaded", () => {
    const projectId = window.location.pathname.split('/').pop(); // Obtener el ID del proyecto desde la URL

    // Función para cargar los participantes del proyecto
    const fetchParticipants = async (projectId) => {
        try {
            const response = await fetch(`/user_project/getByProject/${projectId}`); // Llamada al endpoint correspondiente
            if (response.ok) {
                const participants = await response.json(); // Obtener los datos en formato JSON
                updateParticipantsTable(participants); // Llenar la tabla con los datos obtenidos
            } else {
                console.error("Error al obtener los participantes del proyecto");
            }
        } catch (error) {
            console.error("Error en la solicitud de participantes:", error);
        }
    };

    // Función para actualizar la tabla de participantes
    const updateParticipantsTable = (participants) => {
        const userList = document.getElementById("user-list");
        userList.innerHTML = ""; // Limpiar cualquier contenido previo

        participants.forEach(participant => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">${participant.name || "Desconocido"}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs text-secondary mb-0">${participant.email || "Correo desconocido"}</p>
                </td>
                <td>
                    <span class="text-xs font-weight-bold">${participant.role || "Rol no especificado"}</span>
                </td>
            `;
            userList.appendChild(row); // Agregar la fila a la tabla
        });
    };

    // Llamada inicial para cargar los participantes
    fetchParticipants(projectId);

    // Agregar un nuevo participante
    const addUserBtn = document.getElementById("add-user-btn");
    const addUserSelect = document.getElementById("adduser");
    const userRoleInput = document.getElementById("user-role");

    addUserBtn.addEventListener("click", async () => {
        const selectedUserId = addUserSelect.value;
        const role = userRoleInput.value;

        if (!selectedUserId || !role) {
            alert("Selecciona un usuario y define un rol");
            return;
        }

        try {
            const response = await fetch(`/user_project/add`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    project_id: projectId,
                    user_id: selectedUserId,
                    role: role,
                }),
            });

            if (response.ok) {
                alert("Usuario agregado con éxito");
                fetchParticipants(projectId); // Actualizar la tabla
            } else {
                console.error("Error al agregar usuario");
            }
        } catch (error) {
            console.error("Error en la solicitud para agregar usuario:", error);
        }
    });
});
