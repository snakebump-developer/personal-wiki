# utilizzare costanti globali all'interno del sito

Per poterlo fare creiamo un file nella cartella src e lo chiamiamo `constants.ts`

1. al suo interno possiamo scrivere:

```ts
export const SITE_DESCRIPTION ='Articles, stories and tutorials from Tech People';
export const HOMEPAGE_ARTICLE_LIMIT = 6;
export const ARTICLES_PER_PAGE = 6;
```

2. Andiamo ad esempio nel layout e scriviamo:

```astro
---
import { SITE_DESCRIPTION } from '../constants';
---

	<meta name="description" content={SITE_DESCRIPTION} />

```