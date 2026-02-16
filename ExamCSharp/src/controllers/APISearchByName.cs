
namespace APICountriesIA
{
    public static class APISearchByName
    {
        public static async Task SearchByName()
        {
            Console.Write("\nIntroduce el nombre del país (ej: Spain): ");
            string? inputName = Console.ReadLine();

            if (!isValidateInputString(inputName)) return;

            string escapedCountry = Uri.EscapeDataString(inputName!.Trim());
            var json = await GetItemApiAsync($"{BASE_URL}/name/{escapedCountry}");

            if (!isValidateJsonNotNull(json, NAME_TYPE_PROP_NOMBRE, inputName)) return;
            JsonDocument jsonNotNull = json!;

            List<JsonElement> results = ExtractResults(jsonNotNull);
            if (!isValidateResults(results, NAME_TYPE_PROP_NOMBRE, inputName)) return;

            JsonElement firstResult = results[0];
            var nameObj = GetObjectProps(firstResult, $"{NTP_NAME}.{NTP_OFFICIAL}");
            string officialName = nameObj[$"{NTP_NAME}.{NTP_OFFICIAL}"]?.ToString() ?? "unknown";
            string region = GetStringProp(firstResult, NTP_REGION);
            long population = GetIntProp(firstResult, NTP_POPULATION);
            string capital = GetFirstStringFromArray(firstResult, NTP_CAPITAL);

            var country = new Country
            {
                Name = officialName,
                Region = region,
                Population = population,
                Capital = capital
            };

            Console.WriteLine("\n=== RESULTADO ===");
            Console.WriteLine($"Nombre oficial: {country.Name}");
            Console.WriteLine($"Región: {country.Region}");
            Console.WriteLine($"Población: {country.Population}");
            Console.WriteLine($"Capital: {country.Capital}");

            Console.Write("\n¿Guardar país? (s/n): ");
            string? saveAnswer = Console.ReadLine()?.Trim().ToLowerInvariant();

            if (saveAnswer == "s")
            {
                bool exists = MyCountries.Any(saved =>
                    saved.Name.Equals(country.Name, StringComparison.OrdinalIgnoreCase)
                );

                if (exists)
                {
                    Console.WriteLine("\nEse país ya está guardado.");
                }
                else
                {
                    MyCountries.Add(country);
                    Console.WriteLine("\nPaís guardado correctamente.");
                }
            }
            else
            {
                Console.WriteLine(cancelOperationMsg);
            }

            PrintWaitForPressKey();
        }
    }
}
