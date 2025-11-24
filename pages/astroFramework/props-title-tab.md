# come usare le props per il titolo nelle tabs pagina

Se vogliamo usare i props per rendere dinamiche i titoli nelle tabs del browser possiamo fare così:

1. andiamo nel layout aggiungiamo, `= 'Tech People Blog'` è il titolo di default:

```astro
const {title = 'Tech People Blog'} = Astro.props;
```

2. nelle singole pagine ora possiamo fare questo:

```astro
<Layout title="About TechPeople">
```