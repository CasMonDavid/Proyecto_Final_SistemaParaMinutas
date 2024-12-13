document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del formulario

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                showCustomAlert(data.message, "success"); // Mensaje de éxito
                window.location.href = "/home.post";
            } else {
                showCustomAlert(data.message, "error"); // Mensaje de error
            }
        })
        .catch(() => {
            showCustomAlert("El correo o contraseña son incorrectos", "error"); // Error genérico
        });
});

// Función para mostrar alertas personalizadas
function showCustomAlert(message, type) {
    const alertContainer = document.createElement("div");
    alertContainer.textContent = message;
    alertContainer.style.position = "fixed";
    alertContainer.style.top = "80px";
    alertContainer.style.left = "50%";
    alertContainer.style.transform = "translateX(-50%)";
    alertContainer.style.padding = "10px 20px";
    alertContainer.style.color = "#fff";
    alertContainer.style.backgroundColor =
        type === "success" ? "#4caf50" : "#f44336";
    alertContainer.style.borderRadius = "5px";
    alertContainer.style.zIndex = "1000";
    alertContainer.style.boxShadow = "0 2px 5px rgba(0,0,0,0.2)";
    document.body.appendChild(alertContainer);

    setTimeout(() => {
        alertContainer.remove(); // Elimina la alerta después de 3 segundos
    }, 3000);
}
