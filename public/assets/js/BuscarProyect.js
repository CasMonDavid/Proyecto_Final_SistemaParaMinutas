document.addEventListener("DOMContentLoaded", () => {
    // Obtener el ID del proyecto desde la URL
    const projectId = window.location.pathname.split('/').pop();

    // Función para obtener los datos del proyecto
    const fetchProjectDetails = async (projectId) => {
      try {
        // Realizamos la solicitud GET a la API para obtener el proyecto usando su ID
        const response = await fetch(`/proyectos/${projectId}`);
        if (response.ok) {
          const data = await response.json();
          const project = data.project;

          // Actualizar el DOM con los datos del proyecto
          document.getElementById("project-name").textContent = project.name || "Nombre del proyecto";
          document.getElementById("project-creator").textContent = await fetchCreatorName(project.created_by);
          document.getElementById("project-date").textContent = project.created_at ? new Date(project.created_at).toLocaleDateString("es-ES") : "Fecha de creación";
        }
      } catch (error) {
        console.error("Error al obtener los detalles del proyecto:", error);
      }
    };

    // Función para obtener el nombre del creador (basado en el ID del creador)
    const fetchCreatorName = async (userId) => {
      if (!userId) return "Autor desconocido";

      try {
        const response = await fetch(`/usuarios/${userId}`);
        if (response.ok) {
          const user = await response.json();
          return user.name || "Autor desconocido";
        }
      } catch (error) {
        console.error(`Error al obtener el creador ${userId}:`, error);
      }
      return "Autor desconocido";
    };

    // Obtener los detalles del proyecto con el ID obtenido
    fetchProjectDetails(projectId);
  });