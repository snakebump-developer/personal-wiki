<?php
// --- CONFIGURAZIONE ---
define('BASE_URL', '/personal-wiki/');
define('PAGES_DIR', __DIR__ . '/pages/');

// Libreria per convertire Markdown in HTML (la includiamo direttamente)
// Scarica Parsedown.php da https://parsedown.org/ e mettilo nella root del progetto.
require 'Parsedown.php';

// Estendi Parsedown per aggiungere classi Prism ai blocchi di codice
class ParsedownWithPrism extends Parsedown
{
    protected function blockFencedCodeComplete($Block)
    {
        // Chiama il metodo parent
        $Block = parent::blockFencedCodeComplete($Block);
        
        // Aggiungi la classe language-* per Prism
        if (isset($Block['element']['text']['attributes']['class'])) {
            $class = $Block['element']['text']['attributes']['class'];
            // Prism usa il formato "language-xxx"
            if (strpos($class, 'language-') === false) {
                $Block['element']['text']['attributes']['class'] = 'language-' . $class;
            }
        }
        
        return $Block;
    }
}

$Parsedown = new ParsedownWithPrism();
$Parsedown->setSafeMode(false); // Permetti HTML inline per le anteprime

// --- ROUTING ---
// Ottieni la pagina richiesta dall'URL
$page = '';

// Prova prima con il parametro GET
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    // Altrimenti prova a estrarre dall'URL
    $request_uri = $_SERVER['REQUEST_URI'];
    $script_name = dirname($_SERVER['SCRIPT_NAME']);
    
    // Rimuovi la base URL
    $page = str_replace($script_name, '', $request_uri);
    $page = trim($page, '/');
    
    // Rimuovi eventuali query string
    if (strpos($page, '?') !== false) {
        $page = substr($page, 0, strpos($page, '?'));
    }
}

// Se ancora vuoto, usa la pagina di default
if (empty($page)) {
    $page = 'javascript/array-methods';
}

// Sanifica il percorso per sicurezza, evitando che si possa navigare in altre cartelle
$page_path = realpath(PAGES_DIR . $page . '.md');

// --- LOGICA DI VISUALIZZAZIONE ---
$page_content = '';
if ($page_path && strpos($page_path, realpath(PAGES_DIR)) === 0) {
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
