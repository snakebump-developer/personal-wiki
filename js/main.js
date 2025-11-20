// Toggle Dark/Light Mode
document.addEventListener('DOMContentLoaded', function () {
  const themeToggle = document.getElementById('theme-toggle');
  const body = document.body;

  // Carica la preferenza salvata
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    body.classList.add('dark-mode');
  }

  // Gestisci il click sul toggle
  themeToggle.addEventListener('click', function () {
    body.classList.toggle('dark-mode');

    // Salva la preferenza
    if (body.classList.contains('dark-mode')) {
      localStorage.setItem('theme', 'dark');
    } else {
      localStorage.setItem('theme', 'light');
    }
  });

  // Toggle Sidebar
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebar = document.querySelector('.sidebar');

  // Carica la preferenza salvata per la sidebar (di default è aperta)
  const sidebarState = localStorage.getItem('sidebar');
  if (sidebarState === 'collapsed') {
    sidebar.classList.add('collapsed');
    sidebarToggle.classList.add('collapsed');
  } else {
    // Assicurati che sia aperta di default
    sidebar.classList.remove('collapsed');
    sidebarToggle.classList.remove('collapsed');
    localStorage.setItem('sidebar', 'open');
  }

  // Gestisci il click sul toggle della sidebar
  sidebarToggle.addEventListener('click', function () {
    sidebar.classList.toggle('collapsed');
    sidebarToggle.classList.toggle('collapsed');

    // Salva la preferenza
    if (sidebar.classList.contains('collapsed')) {
      localStorage.setItem('sidebar', 'collapsed');
    } else {
      localStorage.setItem('sidebar', 'open');
    }
  });

  // Code Tabs
  document.querySelectorAll('.code-tab-button').forEach((button) => {
    button.addEventListener('click', function () {
      const tabGroup = this.closest('.code-tabs');
      const tabName = this.dataset.tab;

      // Rimuovi active da tutti i bottoni e contenuti del gruppo
      tabGroup
        .querySelectorAll('.code-tab-button')
        .forEach((btn) => btn.classList.remove('active'));
      tabGroup
        .querySelectorAll('.code-tab-content')
        .forEach((content) => content.classList.remove('active'));

      // Aggiungi active al bottone cliccato e al contenuto corrispondente
      this.classList.add('active');
      tabGroup
        .querySelector(`.code-tab-content[data-tab="${tabName}"]`)
        .classList.add('active');

      // Riapplica Prism al nuovo contenuto visibile
      Prism.highlightAllUnder(tabGroup);
    });
  });
});
