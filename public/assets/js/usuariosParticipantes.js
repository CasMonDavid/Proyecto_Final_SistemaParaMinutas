// Asegurarse de que el DOM esté completamente cargado
window.addEventListener("DOMContentLoaded", () => {
    const projectId = window.location.pathname.split("/").pop(); // Obtener el ID del proyecto desde la URL

    // Función para cargar usuarios no asignados al proyecto
    const fetchAvailableUsers = async (projectParticipants) => {
        try {
            const response = await fetch(`/usuarios`); // Endpoint para obtener todos los usuarios
            if (response.ok) {
                const allUsers = await response.json();
                // Filtrar usuarios que no están en el proyecto
                const availableUsers = allUsers.filter(
                    (user) =>
                        !projectParticipants.some(
                            (participant) => participant.user_id === user.id
                        )
                );
                updateUserDropdown(availableUsers); // Actualizar el dropdown
            } else {
                console.error(
                    "Error al obtener la lista de usuarios disponibles"
                );
            }
        } catch (error) {
            console.error("Error en la solicitud de usuarios:", error);
        }
    };

    // Función para cargar los participantes del proyecto
    const fetchParticipants = async (projectId) => {
        try {
            const response = await fetch(
                `/user_project/getByProject/${projectId}`
            ); // Llamada al endpoint correspondiente
            if (response.ok) {
                const participants = await response.json();
                const enrichedParticipants = await enrichParticipantsData(
                    participants
                ); // Enriquecer datos de participantes
                updateParticipantsTable(enrichedParticipants); // Llenar la tabla con los datos obtenidos
                fetchAvailableUsers(enrichedParticipants); // Cargar usuarios no asignados
            } else {
                console.error(
                    "Error al obtener los participantes del proyecto"
                );
            }
        } catch (error) {
            console.error("Error en la solicitud de participantes:", error);
        }
    };

    // Función para enriquecer los datos de los participantes obteniendo nombre y correo
    const enrichParticipantsData = async (participants) => {
        const enrichedData = await Promise.all(
            participants.map(async (participant) => {
                try {
                    const userResponse = await fetch(
                        `/usuarios/${participant.user_id}`
                    ); // Obtener datos del usuario por ID
                    if (userResponse.ok) {
                        const userData = await userResponse.json();
                        return {
                            ...participant,
                            user_name: userData.name || "Desconocido",
                            user_email: userData.email || "Correo desconocido",
                        };
                    }
                } catch (error) {
                    console.error(
                        `Error al obtener los datos del usuario con ID ${participant.user_id}:`,
                        error
                    );
                }
                return {
                    ...participant,
                    user_name: "Desconocido",
                    user_email: "Correo desconocido",
                };
            })
        );
        return enrichedData;
    };

    // Función para actualizar la tabla de participantes
    const updateParticipantsTable = (participants) => {
        const userList = document.getElementById("user-list");
        userList.innerHTML = ""; // Limpiar cualquier contenido previo

        participants.forEach((participant) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">${
                                participant.user_name || "Desconocido"
                            }</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs text-secondary mb-0">${
                        participant.user_email || "Correo desconocido"
                    }</p>
                </td>
                <td>
                    <span class="text-xs font-weight-bold">${
                        participant.role || "Rol no especificado"
                    }</span>
                </td>
            `;
            userList.appendChild(row); // Agregar la fila a la tabla
        });
    };

    // Función para actualizar el dropdown de usuarios disponibles
    const updateUserDropdown = (availableUsers) => {
        const addUserSelect = document.getElementById("adduser");
        addUserSelect.innerHTML =
            '<option value="" disabled selected>Agregar usuario</option>'; // Resetear el dropdown

        availableUsers.forEach((user) => {
            const option = document.createElement("option");
            option.value = user.id;
            option.textContent = user.name || "Usuario desconocido";
            addUserSelect.appendChild(option); // Agregar opción al dropdown
        });
    };

    // Llamada inicial para cargar los participantes y los usuarios disponibles
    fetchParticipants(projectId);

    // Agregar un nuevo participante
    const addUserBtn = document.getElementById("add-user-btn");
    const addUserSelect = document.getElementById("adduser");
    const userRoleInput = document.getElementById("user-role");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    addUserBtn.addEventListener("click", async () => {
        const selectedUserId = addUserSelect.value;
        const role = userRoleInput.value;

        if (!selectedUserId || !role) {
            alert("Selecciona un usuario y define un rol");
            return;
        }

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"); // Obtener el CSRF token

        try {
            const response = await fetch(`/user_project`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken, // Incluir el token CSRF
                },
                body: JSON.stringify({
                    project_id: projectId,
                    user_id: selectedUserId,
                    role: role,
                }),
            });

            const responseData = await response.json(); // Parsear la respuesta JSON

            if (response.ok) {
                //alert("Usuario agregado con éxito");
                fetchParticipants(projectId); // Actualizar la tabla
            } else {
                console.error(
                    "Error al agregar usuario:",
                    responseData.message || "No se pudo agregar el usuario"
                );
                alert(responseData.message || "Error al agregar el usuario");
            }
        } catch (error) {
            console.error("Error en la solicitud para agregar usuario:", error);
            alert("Error en la solicitud: " + error.message); // Mensaje de error detallado
        }
    });
});
