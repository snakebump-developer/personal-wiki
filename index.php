<?php
// --- CONFIGURAZIONE ---
define('BASE_URL', '/personal-wiki/');
define('PAGES_DIR', __DIR__ . '/pages/');

// Libreria per convertire Markdown in HTML (la includiamo direttamente)
// Scarica Parsedown.php da https://parsedown.org/ e mettilo nella root del progetto.
require 'Parsedown.php';
$Parsedown = new Parsedown();

// --- ROUTING ---
// Ottieni la pagina richiesta dall'URL, es. "index.php?page=javascript/array-methods"
// Se nessuna pagina è richiesta, mostra una pagina di default.
$page = $_GET['page'] ?? 'getting-started'; // 'getting-started' sarà la nostra homepage

// Sanifica il percorso per sicurezza, evitando che si possa navigare in altre cartelle
$page_path = realpath(PAGES_DIR . $page . '.md');

// --- LOGICA DI VISUALIZZAZIONE ---
$page_content = '';
if ($page_path && strpos($page_path, PAGES_DIR) === 0) {
    // Il file esiste ed è dentro la cartella /pages/
    $markdown_content = file_get_contents($page_path);
    $page_content = $Parsedown->text($markdown_content); // Converti Markdown in HTML
} else {
    // Pagina non trovata, mostra un errore 404
    http_response_code(404);
    $page_content = '<h1>Errore 404</h1><p>Pagina non trovata.</p>';
}

// --- RENDER DEL TEMPLATE ---
// Includiamo le parti della pagina per "costruire" l'HTML finale
include 'templates/header.php';
include 'templates/sidebar.php';

// Stampiamo il contenuto principale
echo '<main class="content">';
echo $page_content;
echo '</main>';

include 'templates/footer.php';
?>
