# Installare Tailwindcss in Astro

1. lanciamo il comando da terminale:

`npx astro add tailwind`

2. Per usarlo, creiamo la cartella layouts > Layout.astro al suo interno inseriamo:
    Stare attenti ad inserire lo `<slot/>` servirà nelle pagine

```astro
---
import '../styles/global.css'  
--- 

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
		<meta name="viewport" content="width=device-width" />
		<meta name="generator" content={Astro.generator} />
		<title>Astro</title>
	</head>
	<body>
		<slot />
	</body>
</html>
```

3. modifichiamo la pagina iniziale così:

```astro
---
import Layout from "../layouts/layout.astro"
---


<Layout>
	<h1 class="bg-amber-600">Astro</h1>
	ciaooo
</Layout>


```

