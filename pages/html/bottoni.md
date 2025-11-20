<!-- markdownlint-disable MD033 -->
# Bottoni HTML

I bottoni sono elementi fondamentali per l'interazione utente in una pagina web.

## Bottone Base

Un bottone HTML base si crea con il tag `<button>`:

```html
<button>Clicca qui</button>
```

<div class="preview">
<button>Clicca qui</button>
</div>

## Bottone con Classe

Possiamo aggiungere classi CSS per stilizzare il bottone:

```html
<button class="btn-primary">Bottone Primario</button>
```

<div class="preview">
<button class="btn-primary">Bottone Primario</button>
</div>

## Bottoni con Diverse Varianti

```html
<button class="btn-primary">Primario</button>
<button class="btn-secondary">Secondario</button>
<button class="btn-success">Successo</button>
<button class="btn-danger">Pericolo</button>
```

<div class="preview">
<button class="btn-primary">Primario</button>
<button class="btn-secondary">Secondario</button>
<button class="btn-success">Successo</button>
<button class="btn-danger">Pericolo</button>
</div>

## Bottone con Eventi JavaScript

```html
<button onclick="alert('Ciao!')">Mostra Alert</button>
```

<div class="preview">
<button onclick="alert('Ciao!')">Mostra Alert</button>
</div>

## Bottone Disabilitato

```html
<button disabled>Bottone Disabilitato</button>
```

<div class="preview">
<button disabled>Bottone Disabilitato</button>
</div>

## Attributi comuni dei bottoni

- `type`: Specifica il tipo di bottone (`button`, `submit`, `reset`)
- `disabled`: Disabilita il bottone
- `name` e `value`: Utili quando il bottone è in un form
- `onclick`: Evento JavaScript quando viene cliccato
