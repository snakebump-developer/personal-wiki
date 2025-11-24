# usare eil file Utils.ts

Per utilizzarlo bisogna crearlo nella cartella src e poi al suo interno scriviamo le funzioni che vogliamo rendere generiche per un utilizzo futuro anche in altri componenti come questo

```ts
function formatDate(date: Date):string {
    const options: Intl.DateTimeFormatOptions = {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    }
  
    return new Date(date).toLocaleDateString(undefined, options);
}

export {
    formatDate
}
```

poi quando va importato nel componente si usa:

```js
import { formatDate } from '../utils';
```