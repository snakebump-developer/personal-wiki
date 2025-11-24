# Uso della cartella content

Quando vogliamo ad esempio creare un blog abbiamo bisogno del contenuto degli articoli e viene comodo in astro creare una cartella content nella cartella src con delle collection diverse in base a quale contenuto vogliamo nel sito nel nostro esempio dentro la cartella content creiamo la cartella blog e al suo interno tutti gli articoli di cui abbiamo bisogno.

# file config.ts

è un file molto importate da compilare in typescript per poter validare il contenuto dei file md e creare il rispettivo schema che devono mantenere per generare consigli o errori da mostrarci se ci dimentichiamo qualcosa ho sbagliamo a compilare.
ci servirà poi per permetterci nel restro del progetto di ottenere i dati dei rispettivi file in modo semplice e veloce

esempio:

```js
// In un componente Astro
import { getCollection } from 'astro:content';

const blogPosts = await getCollection('blog');
// TypeScript sa che ogni post ha title, pubDate, author, etc.
```

nel file config creo una struttura del genere:

```js
import { defineCollection, z } from 'astro:content';
// la z sta per l'utilizzo di Zodd una libreria per validare i dati dello schema
const blogCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    pubDate: z.date(),
    author: z.string(),
    image: z.string(),
    tags: z.array(z.string()),
  }),
});

export const collections = {
  blog: blogCollection,
};
```

le informazioni dello schema fanno riferimento ai file md del content:

```markdown
---
title: 'The best laptops for developers in 2024'
pubDate: 2024-01-20
author: 'John Doe'
image: 'image1.png'
tags: ['tech', 'hardware']
slug: the-best-laptops-for-developers-in-2024
---
```