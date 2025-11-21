# Come creare una repository da una cartella progetto esistente

1. Aprire il terminale nella cartella progetto
2. Inizializzare la repository Git

`git init`

3. Aggiungi i file al staging area

`git add .`

4. Crea il primo commit

`git commit -m "Commit iniziale"`

5. Andare su github e creare una nuova repo vuota
6. Connetti a un repository remoto

```bash
git remote add origin https://github.com/tuoutente/nome-repository.git
git branch -M main
git push -u origin main
```