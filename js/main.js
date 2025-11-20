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
});
