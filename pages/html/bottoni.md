<!-- markdownlint-disable MD033 -->

# Bottoni HTML

I bottoni sono elementi fondamentali per l'interazione utente in una pagina web.

## Bottone Base

Un bottone HTML base si crea con il tag `<button>`:

<div class="code-tabs">
  <div class="code-tabs-header">
    <button class="code-tab-button active" data-tab="html">HTML</button>
    <button class="code-tab-button" data-tab="css">CSS</button>
  </div>
  <div class="code-tab-content active" data-tab="html">
    <pre><code class="language-html">&lt;button&gt;Clicca qui&lt;/button&gt;</code></pre>
  </div>
  <div class="code-tab-content" data-tab="css">
    <pre><code class="language-css">button {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  border-radius: 0.375rem;
  cursor: pointer;
}</code></pre>
  </div>
</div>

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

<div class="code-tabs">
  <div class="code-tabs-header">
    <button class="code-tab-button active" data-tab="html">HTML</button>
    <button class="code-tab-button" data-tab="css">CSS</button>
    <button class="code-tab-button" data-tab="js">JavaScript</button>
  </div>
  <div class="code-tab-content active" data-tab="html">
    <pre><code class="language-html">&lt;button id="myButton" class="btn-interactive"&gt;Clicca qui!&lt;/button&gt;</code></pre>
  </div>
  <div class="code-tab-content" data-tab="css">
    <pre><code class="language-css">.btn-interactive {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.2s;
}

.btn-interactive:hover {
transform: scale(1.05);
}</code></pre>

  </div>
  <div class="code-tab-content" data-tab="js">
    <pre><code class="language-javascript">document.getElementById('myButton').addEventListener('click', function() {
  alert('Bottone cliccato!');
  this.style.background = 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)';
});</code></pre>
  </div>
</div>

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
