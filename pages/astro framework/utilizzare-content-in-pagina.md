# Come utilizzare i content nella pagina ad esempio homepage

Se voglio creare ad esempio degli articoli nella home page basati sui file md creati nei content devo importare la collection e poi ciclarla:

```js
---
import { getCollection } from 'astro:content';
import type { CollectionEntry } from 'astro:content';

const allBlogArticles: CollectionEntry<'blog'>[] = await getCollection('blog');
---


{allBlogArticles.map(article => (
      <!-- Article Card -->
      <div class="max-w-md mx-auto mt-10">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
          <a href={'/articles/' + article.slug}>
            <img
              src={'/images/' + article.data.image}
              alt="Article Image"
              class="w-full h-48 object-cover hover:opacity-75 transition duration-300 ease-in-out"
            />
          </a>
          <div class="p-6">
            <h2 class="text-2xl font-semibold mb-2">
              <a href={'/articles/' + article.slug}> {article.data.title} </a>
            </h2>
            <p class="text-gray-600 text-sm mb-4">{article.data.pubDate}</p>
            <div class="flex flex-wrap gap-2">
              {article.data.tags.map( (tag:string, index: number) => (
                <span
              class={index % 2 === 0 ? "px-2 py-1 bg-blue-500 text-white rounded-full text-xs hover:opacity-90" : "px-2 py-1 bg-indigo-500 text-white rounded-full text-xs hover:opacity-90"}
              ><a href={'/article/tag/' + tag}>{tag}</a></span>
              ))}
            </div>
          </div>
        </div>
      </div>
     ))}

```