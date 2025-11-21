# Immagini SRC vs Public

Le immagini possono essere caricate in entrambi i contesti senza problemi, il vantaggio di caricarli nella cartella src è che vengono compilate in fase di build e ottimizzate ma per usarle bisogna fare attenzione ad alcuni passaggi e creare un metodo

1. Importo ciò che mi serve dalla cartella images in src:

```astro
---
import { Image } from "astro:assets";
import logo from "../images/logo.png";
---
```

2. Poi utilizzo il componente e il props importato cosi

```astro
<Image src={logo} class="h-14" alt="TechPeople Logo" width={56} height={56} />
```

# Immagini nella cartella public

Se le inseriamo qui si può usare il seguente path normale senza problemi

```html
<img
    src="images/image2.png"
    alt="Article Image"
    class="w-full h-48 object-cover hover:opacity-75 transition duration-300 ease-in-out"
    />
```