// Asegurarse de que el DOM esté completamente cargado
window.addEventListener("DOMContentLoaded", () => {
    const projectId = window.location.pathname.split('/').pop(); // Obtener el ID del proyecto desde la URL

    // Función para cargar los participantes del proyecto
    const fetchParticipants = async (projectId) => {
        try {
            const response = await fetch(`/user_project/getByProject/${projectId}`); // Llamada al endpoint correspondiente
            if (response.ok) {
                const participants = await response.json(); // Obtener los datos en formato JSON
                const enrichedParticipants = await enrichParticipantsData(participants); // Enriquecer datos de participantes
                updateParticipantsTable(enrichedParticipants); // Llenar la tabla con los datos obtenidos
            } else {
                console.error("Error al obtener los participantes del proyecto");
            }
        } catch (error) {
            console.error("Error en la solicitud de participantes:", error);
        }
    };

    // Función para enriquecer los datos de los participantes obteniendo nombre y correo
    const enrichParticipantsData = async (participants) => {
        const enrichedData = await Promise.all(participants.map(async (participant) => {
            try {
                const userResponse = await fetch(`/usuarios/${participant.user_id}`); // Obtener datos del usuario por ID
                if (userResponse.ok) {
                    const userData = await userResponse.json();
                    return {
                        ...participant,
                        user_name: userData.name || "Desconocido",
                        user_email: userData.email || "Correo desconocido",
                    };
                }
            } catch (error) {
                console.error(`Error al obtener los datos del usuario con ID ${participant.user_id}:`, error);
            }
            return {
                ...participant,
                user_name: "Desconocido",
                user_email: "Correo desconocido",
            };
        }));
        return enrichedData;
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
                            <h6 class="mb-0 text-sm">${participant.user_name || "Desconocido"}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs text-secondary mb-0">${participant.user_email || "Correo desconocido"}</p>
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