document.addEventListener("DOMContentLoaded", () => {
  const DEBUG = true;
  const sidebar = document.getElementById("sidebarMenu");
  const toggle = document.getElementById("toggleSidebar");
  const links = document.querySelectorAll(".sidebar .nav-link");
  const mainContent = document.getElementById("mainContent");
  const modal = new bootstrap.Modal(document.getElementById("globalModal"));
  const modalTitle = document.getElementById("modalTitle");
  const modalBody = document.getElementById("modalBody");

  toggle?.addEventListener("click", () => sidebar.classList.toggle("show"));

  links.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      links.forEach((l) => l.classList.remove("active"));
      link.classList.add("active");
      const section = link.dataset.section;
      loadSection(section);
      if (window.innerWidth < 992) sidebar.classList.remove("show");
    });
  });

  // Carga de secciones dinámicas
  async function loadSection(section) {
    mainContent.innerHTML = `<div class="text-center p-5 text-secondary">Cargando ${section}...</div>`;
    const url = `getters/get_${section}.php`;

    try {
      const res = await fetch(url);
      const text = await res.text();
      

      const data = JSON.parse(text);
      if (!data.success) throw new Error(data.message);
      renderTable(section, data.data);
    } catch (err) {
      console.error("🔥 Error al cargar sección:", err);
      mainContent.innerHTML = `
        <div class="alert alert-danger m-4">
          <strong>Error al cargar ${section}:</strong><br>${err.message}
        </div>`;
    }
  }

  // Renderizar tabla con botón de agregar
  function renderTable(section, rows) {
    if (!rows.length) {
      mainContent.innerHTML = `<p class="text-center text-muted mt-5">No hay datos en ${section}.</p>`;
      return;
    }

    const headers = Object.keys(rows[0]);
    const tableHTML = `<br><br>
      <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 text-capitalize">${section}</h5>
          <button class="btn btn-primary btn-sm btn-add" data-section="${section}">
            <i class="bi bi-plus-lg me-1"></i>Agregar
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped align-middle mb-0">
            <thead class="table-light">
              <tr>${headers
                .map((h) => `<th>${h}</th>`)
                .join("")}<th>Acciones</th></tr>
            </thead>
            <tbody>
              ${rows
                .map(
                  (row) => `
                <tr>${headers.map((h) => `<td>${row[h]}</td>`).join("")}
                  <td class="text-nowrap">
                    <button class="btn btn-sm btn-outline-primary me-1 btn-edit" data-id="${
                      row.id
                    }" data-section="${section}"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger btn-delete" data-id="${
                      row.id
                    }" data-section="${section}"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>`
                )
                .join("")}
            </tbody>
          </table>
        </div>
      </div>`;

    mainContent.innerHTML = tableHTML;

    // Listeners
    // ✅ Forma segura: usar closest() para obtener el botón padre
    document.querySelectorAll(".btn-add").forEach((btn) =>
      btn.addEventListener("click", (e) => {
        const button = e.target.closest(".btn-add");
        openModal(button.dataset.section, "add");
      })
    );

    document.querySelectorAll(".btn-edit").forEach((btn) =>
      btn.addEventListener("click", (e) => {
        const button = e.target.closest(".btn-edit");
        openModal(button.dataset.section, "edit", button.dataset.id);
      })
    );
  }

  // Abrir modal y cargar formulario correspondiente
  async function openModal(section, mode, id = null) {
    modalTitle.textContent =
      (mode === "add" ? "Agregar " : "Editar ") + section;
    modalBody.innerHTML = `<p class='text-center text-muted'>Cargando formulario...</p>`;
    console.log("Section Seleccionada:", section);

    if (!section) {
      console.error("❌ openModal() sin sección válida.");
      modalBody.innerHTML = `<div class="alert alert-danger">Error: sección indefinida.</div>`;
      modal.show();
      return;
    }

    const url = `modals/modal_${section}.php?mode=${mode}${ id ? `&id=${id}` : "" }`;
    if (DEBUG) console.log(`🧩 Cargando modal desde: ${url}`);

    if (DEBUG) {
      console.log("🧠 openModal() params =>", { section, mode, id });
    }

    if (DEBUG) console.log(`🧩 Cargando modal desde: ${url}`);


    try {
      const res = await fetch(url);
      const html = await res.text();
      modalBody.innerHTML = html;
      modal.show();
    } catch (err) {
      console.error("❌ Error al cargar modal:", err);
      modalBody.innerHTML = `<div class="alert alert-danger">Error al cargar el formulario: ${err.message}</div>`;
    }
  }
});
