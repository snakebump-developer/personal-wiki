# Come creare un path con server SSR per pagina articolo singolo

Andiamo nel file di astro config e impostiamo output su server cosi da permettere il SSR.
poi strutturiamo il codice in questo modo per dinamicizzare i dati

```js
---
import { astroCalledServerError } from 'astro:actions';
import Layout from '../../layouts/Layout.astro';
import { getEntry } from 'astro:content';
import { getAstroMetadata } from 'astro/jsx/rehype.js';
import { formatDate } from '../../utils';

const { slug } = Astro.params;

if (slug === undefined) {
  throw new Error('Slug is required');
}

const article = await getEntry('blog', slug);

if (article === undefined) {
  return Astro.redirect('/404');
}

const { Content } = await article.render();
---

<Layout>
  <a
    href="/articles"
    class="inline-block bg-gray-100 p-2 mb-6 hover:bg-indigo-500 hover:text-white"
    >Back To Articles</a
  >
  <article>
    <h1 class="text-4xl font-bold mb-2">
      {article.data.title}
    </h1>
    <h3 class="text-lg mb-2">
      Written by {article.data.author} on {formatDate(article.data.pubDate)}
    </h3>
    <div class="flex flex-wrap gap-2 mb-6">
      {
        article.data.tags.map((tag:string, index:number) => (
          <span class={
                index % 2 === 0
                  ? 'px-2 py-1 bg-blue-500 text-white rounded-full text-xs hover:opacity-90'
                  : 'px-2 py-1 bg-indigo-500 text-white rounded-full text-xs hover:opacity-90'
              }>
            <a href="">{tag}</a>
          </span>
        ))
      }
    </div>
    <img
      src={'/images/' + article.data.image}
      alt="Article Image"
      class="w-full h-auto rounded-xl mb-6"
    />
    <Content />
  </article>
</Layout>

<style is:global>
  p {
    margin: 20px 0;
  }

  h2 {
    margin: 20px 0;
    font-size: 1.8rem;
  }
</style>
```

Il funzionamento è basato sulla api di. astro e le collections

The line `const article = await getEntry('blog', slug);` is a core part of how Astro's Content Collections API works to fetch and display content, like a blog post.

Here is a step-by-step explanation:

`getEntry()`: This is an asynchronous function imported from astro:content. Its purpose is to retrieve a single entry from one of your content collections.

`'blog'`: This is the first argument passed to getEntry. It specifies the name of the content collection you want to query. In your project structure, you likely have a folder at `src/content/blog/` that contains all your blog post files (e.g., in Markdown or MDX format).

`slug`: This is the second argument. A "slug" is the unique identifier for a piece of content within a collection, and it's usually derived from the filename. In this dynamic route file (`[...slug].astro`), the slug variable holds the value from the URL. For example, if a user visits /articles/my-first-post, the value of slug will be 'my-first-post'.

`await`: Since fetching content from the file system is an asynchronous operation, await is used to pause the code execution until getEntry has finished finding the matching article and returned its data.

`const article`: The result from await `getEntry(...)` is stored in the article constant. This article object contains all the information about the blog post, including:

`data`: The frontmatter from your content file (e.g., title, author, pubDate).

`render()`: A function that, when called, renders the body of your content file (e.g., Markdown) into HTML.
slug: The slug of the entry.

`body`: The raw, un-rendered content of the file.
In summary, this single line of code is responsible for finding the specific blog post that corresponds to the URL the user visited and loading all its data and content into the article variable so it can be rendered on the page.