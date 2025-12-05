# Comprendere lo stato dei branch aperti

```bash
# Vedere tutti i branch locali e remoti
git branch -a

# Vedere lo status attuale
git status

# Vedere i branch remoti
git remote -v

# Vedere l'ultimo commit di ogni branch
git branch -v

# Verificare se ci sono differenze tra il tuo branch e il remoto
git log --oneline --graph --decorate --all -10
```