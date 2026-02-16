namespace APICountriesIA
{
    public static class APIExportTopCountries
    {
        public static void ExportTopCountries(List<Country> countries)
        {
            try
            {
                var topCountries = countries
                    .Where(country => country.Population > 10_000_000)
                    .OrderByDescending(country => country.Population)
                    .ToList();

                string filePath = Path.Combine(
                    AppDomain.CurrentDomain.BaseDirectory,
                    "paises_top.json"
                );

                var json = JsonSerializer.Serialize(
                    topCountries,
                    new JsonSerializerOptions { WriteIndented = true }
                );

                File.WriteAllText(filePath, json);
                Console.WriteLine("\nExportación completada: paises_top.json");
            }
            catch (Exception ex)
            {
                HandlerException(ex);
                PrintWaitForPressKey();
            }
        }
    }
}
