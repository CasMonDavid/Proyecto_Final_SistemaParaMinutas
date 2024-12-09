document.addEventListener("DOMContentLoaded", function() {
    // Función para obtener usuarios
    function loadUsers() {
        fetch('/usuarios') // Solicitud GET para obtener la lista de usuarios
            .then(response => response.json())
            .then(users => {
                let usersList = document.getElementById("users-list");
                usersList.innerHTML = ''; // Limpiar la tabla

                // Iterar sobre los usuarios y crear filas
                users.forEach(user => {
                    let row = document.createElement("tr");

                    // Columna de usuario
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

                    usersList.appendChild(row);
                });

                // Agregar eventos a los botones de eliminar
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function(e) {
                        
                        const userId = e.target.getAttribute('data-id');
                        const userName = e.target.getAttribute('data-name');

                        // Crear y mostrar el modal
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

                        const deleteModal = new bootstrap.Modal(modal);
                        deleteModal.show();

                        // Evento de confirmación
                        modal.querySelector('#confirmDeleteBtn').addEventListener('click', function() {
                            fetch(`/usuarios/${userId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status) {
                                        alert('Usuario eliminado con éxito');
                                        e.target.closest('tr').remove();
                                    } else {
                                        alert('Error al eliminar el usuario');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('No se pudo eliminar el usuario.');
                                })
                                .finally(() => {
                                    deleteModal.hide();
                                    modal.addEventListener('hidden.bs.modal', () => modal.remove());
                                });
                        });

                        // Eliminar el modal del DOM al cerrarlo
                        modal.addEventListener('hidden.bs.modal', () => modal.remove());
                    });
                });
            })
            .catch(error => console.error('Error loading users:', error));
    }

    // Cargar usuarios al cargar la página
    loadUsers();
});
