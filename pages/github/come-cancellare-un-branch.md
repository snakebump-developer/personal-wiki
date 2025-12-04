# Come cancellare un brench

1. Assicurati di non essere sul branch che vuoi cancellare
Non puoi eliminare il branch su cui stai lavorando attualmente.

Prima di cancellare `iniziamo-da-qui`, devi spostarti su un altro branch (solitamente main, master, o un altro ramo attivo).
Per cambiare branch, usa:

```bash
git checkout main
# Oppure, se il tuo ramo principale si chiama 'master':
# git checkout master
# oppure
git checkout -
```

2. Cancella il branch
Una volta che sei su main (o un altro branch), puoi eliminare iniziamo-da-qui localmente:

A. Eliminazione sicura (-d)

Usa l'opzione -d (delete) per una cancellazione "sicura". Git ti impedirà di cancellare il branch se contiene commit che non sono ancora stati uniti (merged) in nessun altro branch.

```bash
git branch -d iniziamo-da-qui
```

Cosa fare se il branch era anche su GitHub/remoto

I comandi qui sopra cancellano il branch solo sulla tua copia locale del repository. Se avevi già caricato (git push) il branch su un server remoto (come GitHub, GitLab o Bitbucket), devi inviare un comando specifico per cancellarlo anche lì:

```bash
git push origin --delete iniziamo-da-qui
```