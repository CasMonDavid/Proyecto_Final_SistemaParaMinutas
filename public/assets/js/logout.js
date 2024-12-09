document.querySelector('#logoutForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar que se envíe el formulario inmediatamente

    const form = event.target;

    // Hacer la solicitud POST para cerrar sesión
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form), // Usamos FormData para enviar los datos del formulario
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Aseguramos que el token de CSRF se incluya correctamente
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            showCustomAlert(data.message, 'success'); // Mostrar mensaje de éxito
            setTimeout(() => {
                window.location.href = '/'; // Redirigir al login después de 2 segundos
            }, 1000);
        } else {
            showCustomAlert(data.message, 'error'); // Mostrar mensaje de error si no se pudo cerrar sesión
            setTimeout(() => {
                window.location.href = '/'; // Redirigir al login
            }, 1000);
        }
    })
    .catch(() => {
        // Si ocurre un error (como que no hay sesión activa)
        showCustomAlert('No hay sesión activa', 'error');
        setTimeout(() => {
            window.location.href = '/'; // Redirigir al login
        }, 1000);
    });
});

// Función para mostrar alertas personalizadas
function showCustomAlert(message, type) {
    const alertContainer = document.createElement('div');
    alertContainer.textContent = message;
    alertContainer.style.position = 'fixed';
    alertContainer.style.top = '20px';
    alertContainer.style.left = '50%';
    alertContainer.style.transform = 'translateX(-50%)';
    alertContainer.style.padding = '10px 20px';
    alertContainer.style.color = '#fff';
    alertContainer.style.backgroundColor = type === 'success' ? '#4caf50' : '#f44336';
    alertContainer.style.borderRadius = '5px';
    alertContainer.style.zIndex = '1000';
    alertContainer.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
    alertContainer.style.fontSize = '16px';
    document.body.appendChild(alertContainer);

    setTimeout(() => {
        alertContainer.remove(); // Elimina la alerta después de 3 segundos
    }, 2000);
}
