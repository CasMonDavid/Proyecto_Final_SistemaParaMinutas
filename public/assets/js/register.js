document.getElementById('registerForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita el envío predeterminado del formulario

    const form = event.target;
    const formData = new FormData(form);

    // Capturar y validar los campos
    let email = formData.get('email');
    const password = formData.get('password');
    const confirmPassword = formData.get('confirm_password');
    const name = formData.get('name').trim();
    const birthday = formData.get('birthday');

    // Validación del email: Mayúsculas
    if (/[A-Z]/.test(email)) {
        showCustomAlert('El correo electrónico no puede contener mayúsculas.', 'error');
        return;
    }

    // Convertir el email a minúsculas
    email = email.toLowerCase();

    // Validación del email: Dominio gmail.com
    if (!email.endsWith('@gmail.com')) {
        showCustomAlert('El correo electrónico debe pertenecer al dominio gmail.com.', 'error');
        return;
    }

    // Validación de la contraseña
    if (password.length < 5) {
        showCustomAlert('La contraseña debe tener al menos 5 caracteres.', 'error');
        return;
    }

    if (password !== confirmPassword) {
        showCustomAlert('Las contraseñas no coinciden.', 'error');
        return;
    }

    // Validación de la edad
    const birthDate = new Date(birthday);
    const today = new Date();
    const age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();

    // Ajustar la edad si el mes o día aún no ha llegado
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age < 18) {
        showCustomAlert('Debes ser mayor de 18 años para registrarte.', 'error');
        return;
    }

    // Crear el payload
    const payload = {
        name,
        email,
        password,
        birthday,
    };

    try {
        // Enviar la solicitud
        const response = await fetch('usuarios', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: JSON.stringify(payload),
        });

        const data = await response.json();

        if (response.ok) {
            showCustomAlert(data.message || 'Usuario registrado con éxito', 'success');
            window.location.href = '/'; // Redirección en caso de éxito
        } else {
            console.error(data.errors);
            showCustomAlert(data.message || 'Error al registrar el usuario', 'error');
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        showCustomAlert('Ocurrió un error. Inténtalo de nuevo.', 'error');
    }
});

// Función para mostrar alertas personalizadas
function showCustomAlert(message, type) {
    const alertContainer = document.createElement('div');
    alertContainer.textContent = message;
    alertContainer.style.position = 'fixed';
    alertContainer.style.top = '160px';
    alertContainer.style.left = '50%';
    alertContainer.style.transform = 'translateX(-50%)';
    alertContainer.style.padding = '10px 20px';
    alertContainer.style.color = '#fff';
    alertContainer.style.backgroundColor = type === 'success' ? '#4caf50' : '#f44336';
    alertContainer.style.borderRadius = '5px';
    alertContainer.style.zIndex = '1000';
    alertContainer.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
    document.body.appendChild(alertContainer);

    setTimeout(() => {
        alertContainer.remove(); // Elimina la alerta después de 3 segundos
    }, 2000);
}
