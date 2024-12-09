document.addEventListener('DOMContentLoaded', async () => {
    const userSelect = document.getElementById('adduser');

    try {
        // Realiza la solicitud para obtener los usuarios
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
                userSelect.appendChild(option);
            });
        } else {
            console.error('Error al obtener los usuarios:', response.statusText);
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
});
