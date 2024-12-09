document.addEventListener('DOMContentLoaded', async () => {
    const addUserSelect = document.getElementById('adduser');
    const roleInput = document.getElementById('rol');
    const addCollaboratorButton = document.getElementById('addCollaboratorButton');
    const collaboratorList = document.getElementById('collaboratorList');
    const collaboratorsField = document.getElementById('collaborators');
    const form = document.getElementById('projectForm'); // Asegúrate de que el formulario tenga el id 'projectForm'

    let collaborators = [];

    // Cargar usuarios dinámicamente
    try {
        const response = await fetch('/usuarios', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (response.ok) {
            const users = await response.json();

            // Itera sobre los usuarios y los agrega al select
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id; // Usa el ID del usuario como valor
                option.textContent = user.name; // Usa el nombre del usuario como texto
                addUserSelect.appendChild(option);
            });
        } else {
            console.error('Error al obtener los usuarios:', response.statusText);
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }

    // Agregar colaborador
    addCollaboratorButton.addEventListener('click', (e) => {
        e.preventDefault();

        const userId = addUserSelect.value;
        const userName = addUserSelect.options[addUserSelect.selectedIndex]?.text || '';
        const role = roleInput.value;

        if (!userId || !role) {
            alert('Por favor selecciona un usuario y define un rol.');
            return;
        }

        // Añadir al array de colaboradores
        collaborators.push({ user_id: userId, role });

        // Actualizar campo oculto
        collaboratorsField.value = JSON.stringify(collaborators);

        // Mostrar en la lista
        const listItem = document.createElement('li');
        listItem.textContent = `${userName} - ${role}`;
        collaboratorList.appendChild(listItem);

        // Limpiar campos
        addUserSelect.value = '';
        roleInput.value = '';
    });

    // Manejar el envío del formulario
    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Previene el envío tradicional del formulario

        // Asegurarse de que el campo 'collaborators' esté actualizado
        collaboratorsField.value = JSON.stringify(collaborators);

        // Crea un objeto FormData con los datos del formulario
        const formData = new FormData(form);

        try {
            // Envía los datos del formulario
            const response = await fetch(form.action, {
                method: form.method, // Obtiene el método (POST)
                body: formData, // Los datos del formulario
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Añadir CSRF Token para Laravel
                }
            });

            if (response.ok) {
                // Si la respuesta es exitosa, redirige a /home
                window.location.href = '/home';
            } else {
                // Si hay un error en la respuesta
                console.error('Error al guardar el proyecto');
                alert('Hubo un error al guardar el proyecto. Intenta nuevamente.');
            }
        } catch (error) {
            // Si ocurre un error en el envío
            console.error('Error al enviar el formulario:', error);
            alert('Hubo un error al enviar el formulario. Intenta nuevamente.');
        }
    });
});
