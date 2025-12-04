# Se voglio copiare il path della cartella corrente in un solo comando

Per copiare il percorso completo della directory corrente direttamente negli appunti (clipboard), puoi "concatenare" l'output del comando pwd con un comando specifico per la gestione degli appunti del sistema operativo.

Su macOS (che è il sistema che stai usando)
Puoi utilizzare il comando pbcopy:

```bash
pwd | pbcopy
```

pwd stampa il percorso corrente.

| (pipe) invia l'output di pwd come input al comando successivo.
pbcopy scrive l'input nella clipboard di sistema.

Dopo aver eseguito questo comando, il percorso completo della cartella sarà immediatamente disponibile da incollare (usando Cmd + V o tramite menu contestuale).

Su Windows (PowerShell):

```bash
Get-Location | Set-Clipboard
# oppure
pwd | clip
# (quest'ultimo se usi un terminale compatibile come Git Bash o WSL che riconosce clip come alias di sistema).
```