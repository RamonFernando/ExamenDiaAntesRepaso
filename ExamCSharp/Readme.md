# APICountriesIA - Menú Mundo

Aplicación de consola en C# que consume `https://restcountries.com/v3.1` con el flujo pedido:

- Buscar país (tomando siempre el primer resultado `root[0]`)
- Guardar países en memoria
- Listar países guardados ordenados por población (de mayor a menor)
- Exportar solo países con más de 10 millones de habitantes a `paises_top.json`

## Clase obligatoria `Country`

Se implementa con el formato exacto solicitado:

```csharp
public class Country {
    public string Name { get; set; }
    public string Region { get; set; }
    public long Population { get; set; }
    public string Capital { get; set; }
}
```

## Menú implementado

```text
=== MENÚ MUNDO ===
1. Buscar país
2. Listar mis países (Ordenados por población)
3. Salir
```

## Cómo se implementó el ordenamiento

Antes de mostrar la lista, se ordena la colección usando LINQ con `OrderByDescending`:

```csharp
var sortedCountries = MyCountries
    .OrderByDescending(country => country.Population)
    .ToList();
```

Con esto, siempre se imprime de mayor a menor población, por ejemplo:

```text
1. China - Pob: 1402112000
2. Spain - Pob: 47351567
```

## Extra: Exportación personalizada

Al listar países, también se genera `paises_top.json` filtrando con:

```csharp
country.Population > 10_000_000
```

y manteniendo el orden descendente por población.

### Ejemplo de salida del JSON

```json
[
  {
    "Name": "People's Republic of China",
    "Region": "Asia",
    "Population": 1402112000,
    "Capital": "Beijing"
  },
  {
    "Name": "Kingdom of Spain",
    "Region": "Europe",
    "Population": 47351567,
    "Capital": "Madrid"
  }
]
```

## Ejecución

Desde la carpeta del proyecto:

```bash
dotnet restore
dotnet run
```
