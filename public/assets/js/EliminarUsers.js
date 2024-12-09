// public/assets/js/users.js
document.addEventListener("DOMContentLoaded", function() {
    // Función para obtener usuarios
    function loadUsers() {
        fetch('/usuarios')  // Hacemos una solicitud GET a la ruta /usuarios
            .then(response => response.json())  // Parseamos la respuesta JSON
            .then(users => {
                let usersList = document.getElementById("users-list");
                usersList.innerHTML = '';  // Limpiamos la tabla antes de agregar los nuevos usuarios

                // Iteramos sobre los usuarios y agregamos filas a la tabla
                users.forEach(user => {
                    let row = document.createElement("tr");

                    // Columna de usuario (nombre y foto)
                    let nameCell = document.createElement("td");
                    nameCell.innerHTML = `
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">${user.name}</h6>
                            </div>
                        </div>
                    `;
                    row.appendChild(nameCell);

                    // Columna de email
                    let emailCell = document.createElement("td");
                    emailCell.innerHTML = `<p class="text-xs text-secondary mb-0">${user.email}</p>`;
                    row.appendChild(emailCell);

                    // Columna de acciones
                    let actionsCell = document.createElement("td");
                    actionsCell.classList.add("align-middle");
                    actionsCell.innerHTML = `
                        <a href="/users/edit-users" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
                          Editar
                        </a>
                        <button class="text-secondary font-weight-bold text-xs delete-btn" data-id="${user.id}" data-name="${user.name}">
                            Eliminar
                        </button>
                    `;
                    row.appendChild(actionsCell);

                    // Agregamos la fila a la tabla
                    usersList.appendChild(row);
                });

                // Agregar eventos para los botones de eliminar
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function(e) {
                        const userId = e.target.getAttribute('data-id');
                        if (confirm(`¿Estás seguro de que quieres eliminar a ${e.target.getAttribute('data-name')}?`)) {
                            // Enviar el formulario para eliminar
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/usuarios/${userId}`;

                            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            const csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = csrfToken;
                            form.appendChild(csrfInput);

                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'DELETE';
                            form.appendChild(methodInput);

                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            })
            .catch(error => {
                console.error('Error loading users:', error);
            });
    }

    // Llamamos a la función para cargar los usuarios cuando la página cargue
    loadUsers();
});
