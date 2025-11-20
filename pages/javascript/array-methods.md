# Metodi Utili per gli Array in JavaScript

Gli array in JavaScript sono oggetti super potenti con una tonnellata di metodi integrati. Vediamo alcuni dei più comuni e utili per la manipolazione dei dati.

## Metodi che non modificano l'array originale

Questi metodi restituiscono un nuovo array o un nuovo valore, lasciando intatto l'array di partenza. Sono fondamentali per un approccio di programmazione funzionale.

### `map()`
Il metodo `map()` crea un nuovo array popolato con i risultati della chiamata di una funzione fornita su ogni elemento dell'array chiamante.

```javascript
const numbers = [1, 4, 9, 16];

// Passa una funzione a map
const map1 = numbers.map(x => x * 2);

console.log(map1);
// output atteso: Array [2, 8, 18, 32]
