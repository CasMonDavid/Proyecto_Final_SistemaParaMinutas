document.addEventListener('DOMContentLoaded', () => {

    console.log("El DOM está listo y el script se está ejecutando");

    const form = document.getElementById('projectForm');
    const addUserButton = document.getElementById('addTopicButton');
    const collaboratorsContainer = document.createElement('div');
    form.insertBefore(collaboratorsContainer, addUserButton.parentElement);

    // Verificar si los elementos existen en el DOM
    console.log('Formulario:', form);
    console.log('Botón Agregar Usuario:', addUserButton);

    // Agregar colaborador dinámicamente
    addUserButton.addEventListener('click', (e) => {
        e.preventDefault();

        console.log("Colaborador agregado");

        const collaboratorBlock = document.createElement('div');
        collaboratorBlock.className = 'mb-3';

        const userLabel = document.createElement('label');
        userLabel.textContent = 'Agregar usuario';
        userLabel.className = 'form-label';
        const userSelect = document.createElement('select');
        userSelect.className = 'form-select';
        userSelect.required = true;
        userSelect.innerHTML = document.getElementById('adduser').innerHTML;

        const roleLabel = document.createElement('label');
        roleLabel.textContent = 'Rol';
        roleLabel.className = 'form-label';
        const roleInput = document.createElement('input');
        roleInput.type = 'text';
        roleInput.className = 'form-control';
        roleInput.placeholder = 'Rol del usuario';
        roleInput.required = true;

        const removeButton = document.createElement('button');
        removeButton.textContent = 'Eliminar';
        removeButton.className = 'btn btn-danger mt-2';
        removeButton.addEventListener('click', (e) => {
            e.preventDefault();
            collaboratorsContainer.removeChild(collaboratorBlock);
            console.log("Colaborador eliminado");
        });

        collaboratorBlock.appendChild(userLabel);
        collaboratorBlock.appendChild(userSelect);
        collaboratorBlock.appendChild(roleLabel);
        collaboratorBlock.appendChild(roleInput);
        collaboratorBlock.appendChild(removeButton);

        collaboratorsContainer.appendChild(collaboratorBlock);
    });

    // Manejar el envío del formulario
    form.addEventListener('submit', async (e) => {
        e.preventDefault();  // Prevenir envío tradicional

        console.log("Formulario enviado");  // Verificar si el formulario se está enviando

        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;
        const status = document.getElementById('options').value;
        const createdBy = document.getElementById('adduser').value;

        const collaborators = [];
        Array.from(collaboratorsContainer.children).forEach(collaboratorBlock => {
            const userId = collaboratorBlock.querySelector('select').value;
            const userRole = collaboratorBlock.querySelector('input').value;
            collaborators.push({ user_id: userId, role: userRole });
        });

        const payload = {
            name,
            description,
            status,
            created_by: createdBy,
            collaborators,
        };

        // Imprimir el payload antes de enviarlo
        console.log('Datos del formulario a enviar:', payload);

        try {
            const response = await fetch('/proyectos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(payload),
            });

            // Mostrar la respuesta en consola
            console.log('Respuesta del servidor:', response);

            if (response.ok) {
                const result = await response.json();
                alert(result.message);
                
            } else {
                const error = await response.json();
                alert(`Error: ${error.message}`);
            }
        } catch (err) {
            console.error('Error:', err);
            alert('Ocurrió un error al enviar los datos.');
        }
    });
});
