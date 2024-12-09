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
                        <a href="/users/edit-users/${user.id}" class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip" data-original-title="Edit user">
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
                        const userName = e.target.getAttribute('data-name');

                        // Crear el modal de confirmación dinámicamente
                        const modal = document.createElement('div');
                        modal.classList.add('modal', 'fade');
                        modal.id = 'deleteModal';
                        modal.tabIndex = '-1';
                        modal.setAttribute('aria-labelledby', 'deleteModalLabel');
                        modal.setAttribute('aria-hidden', 'true');

                        modal.innerHTML = `
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estás seguro de que quieres eliminar a ${userName}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.body.appendChild(modal);

                        // Inicializar el modal con Bootstrap
                        const deleteModal = new bootstrap.Modal(modal);
                        deleteModal.show();

                        // Agregar evento para el botón de confirmación
                        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
                            // Enviar la solicitud DELETE usando fetch
                            fetch(`/usuarios/${userId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error al eliminar el usuario');
                                }
                                return response.json();
                            })
                            .then(data => {
                                // Verificar si la eliminación fue exitosa
                                if (data.status) {
                                    // Eliminar la fila de la tabla
                                    e.target.closest('tr').remove();
                                    alert('Usuario eliminado con éxito');
                                } else {
                                    alert('Error al eliminar el usuario');
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting user:', error);
                                alert('No se pudo eliminar el usuario. Intenta nuevamente');
                            });

                            // Cerrar el modal después de enviar la solicitud
                            deleteModal.hide();

                            // Eliminar el modal del DOM después de usarlo
                            modal.remove();
                        });
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
