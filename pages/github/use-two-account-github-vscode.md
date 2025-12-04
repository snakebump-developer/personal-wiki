# Come usare due account Github su Vs code

1. Genera una Nuova Chiave SSH per Ogni Account
Se hai già una chiave SSH per un account, devi crearne una nuova per il secondo. Apri un terminale (puoi usare quello integrato in VS Code: Ctrl+ o Cmd+ `) e lancia questo comando, sostituendo l'email del tuo secondo account GitHub.

```bash
ssh-keygen -t ed25519 -C "tua-email-lavoro@example.com"
```

2. Quando ti chiede dove salvare la chiave, non accettare il percorso di default `(/c/Users/TuoUtente/.ssh/id_ed25519)`. Assegnagli un nome specifico, per esempio:

```bash
Enter file in which to save the key (/c/Users/TuoUtente/.ssh/id_ed25519): Users/TuoUtente/.ssh/id_ed25519_work
```

Fai lo stesso per l'account personale se non hai già una chiave, nominandola id_ed25519_personal.

Alla fine avrai due coppie di chiavi nella tua cartella .ssh:

`id_ed25519_work (chiave privata) e id_ed25519_work.pub (chiave pubblica)`
`id_ed25519_personal (chiave privata) e id_ed25519_personal.pub (chiave pubblica)`

3. Aggiungi le Chiavi Pubbliche ai Tuoi Account GitHub
Ora devi associare ogni chiave pubblica all'account GitHub corrispondente.

Copia il contenuto della chiave pubblica. Ad esempio, per quella di lavoro:

```bash
# Su Windows (Git Bash)
cat ~/.ssh/id_ed25519_work.pub | clip

# Su macOS/Linux
pbcopy < ~/.ssh/id_ed25519_work.pub

```

- Vai su GitHub.com e accedi con il tuo account di lavoro.
- Vai su Settings > SSH and GPG keys.
- Clicca su New SSH key, dagli un titolo (es. "PC Lavoro VS Code") e incolla la chiave.
- Ripeti la procedura per l'account personale usando la chiave id_ed25519_personal.pub.

4. Configura l'Host SSH (il Passaggio Chiave!)
Questo è il passaggio che "insegna" al tuo computer quale chiave usare per quale host. Crea o modifica il file config dentro la tua cartella `.ssh (~/.ssh/config)`.

Aggiungi una configurazione simile a questa:

```
# Account Personale (host di default)
Host github.com
   HostName github.com
   User git
   IdentityFile ~/.ssh/id_ed25519_personal
   IdentitiesOnly yes

# Account Lavoro (host alias)
Host github.com-work
   HostName github.com
   User git
   IdentityFile ~/.ssh/id_ed25519_work
   IdentitiesOnly yes

```

Cosa fa questo file?

Quando usi github.com, userà la chiave personale.
Quando usi l'alias github.com-work, userà la chiave di lavoro.

5. Clona o Aggiorna i Repository Usando l'Host Corretto

Ora, quando lavori con i repository, devi usare l'URL SSH corretto.

Per un repository personale: Usa l'URL SSH standard che trovi su GitHub.

```bash
git clone git@github.com:utente-personale/progetto-personale.git
```

Per un repository di lavoro: Devi modificare l'URL del remote, sostituendo github.com con l'alias che hai creato (github.com-work).

```bash
# Se stai clonando un nuovo repo
git clone git@github.com-work:organizzazione-lavoro/progetto-lavoro.git

# Se hai già un repo clonato e vuoi aggiornare il remote
cd percorso/progetto-lavoro
git remote set-url origin git@github.com-work:organizzazione-lavoro/progetto-lavoro.git

```

6. Configura l'Utente Git per Ogni Progetto
Git ha bisogno di sapere anche quale nome e email associare ai commit. Questa configurazione va fatta dentro la cartella di ogni progetto.

Dentro un progetto di lavoro:

```bash
git config user.name "Il Tuo Nome Lavoro"
git config user.email "tua-email-lavoro@example.com"
```

Dentro un progetto personale:

```bash
git config user.name "Il Tuo Nome Personale"
git config user.email "tua-email-personale@example.com"
```