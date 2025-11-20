<button id="sidebar-toggle" class="sidebar-toggle" aria-label="Nascondi/Mostra sidebar">
    <span class="toggle-icon">«</span>
</button>
<aside class="sidebar">
    <nav>
        <ul>
            <?php
            // Funzione per scandire le cartelle e creare la navigazione
            function build_nav($dir)
            {
                $items = scandir($dir);
                foreach ($items as $item) {
                    // Ignora '.', '..' e file nascosti
                    if ($item[0] === '.') continue;

                    $path = $dir . '/' . $item;
                    $url_path = str_replace(PAGES_DIR, '', $path); // Percorso relativo per l'URL

                    if (is_dir($path)) {
                        // È una categoria (cartella)
                        echo '<li><strong>' . ucfirst(basename($item)) . '</strong>';
                        echo '<ul>';
                        build_nav($path); // Chiamata ricorsiva
                        echo '</ul></li>';
                    } else {
                        // È una pagina (file .md)
                        $page_name = pathinfo($item, PATHINFO_FILENAME);
                        $url_path = pathinfo($url_path, PATHINFO_DIRNAME) . '/' . $page_name;
                        // Rimuovi il punto iniziale se presente
                        if ($url_path[0] === '/') $url_path = substr($url_path, 1);

                        echo '<li><a href="' . BASE_URL . $url_path . '">' . ucfirst(str_replace('-', ' ', $page_name)) . '</a></li>';
                    }
                }
            }

            build_nav(PAGES_DIR);
            ?>
        </ul>
    </nav>
</aside>