# Sequenza branch professionale lavorando in team

```bash
# Per ogni nuovo task:
git checkout main
git pull origin main
git checkout -b feature/nome-nuovo-task

# ... lavora sul task ...
# ... commit e push ...
# ... crea Pull Request su github ...
# ... merge e eliminazione del branch secondario ...
```

Convenzioni nomi branch

- feature/ : per nuove funzionalità
- fix/ : per bug fix
- hotfix/ : per fix urgenti in produzione
- refactor/ : per refactoring del codice
- docs : per documentazione

Esempio:

```bash
# 1. Partire sempre da main aggiornato
git checkout main
git pull origin main

# 2. Creare un nuovo branch per ogni task/feature
git checkout -b feature/nome-task
# oppure
git checkout -b fix/nome-bug
# oppure  
git checkout -b hotfix/nome-urgente
```