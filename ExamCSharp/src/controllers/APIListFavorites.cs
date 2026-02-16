
namespace APICountriesIA
{
    public static class APIListFavorites
    {
        public static void ListFavorites()
        {
            if (MyCountries.Count == 0)
            {
                Console.WriteLine("\nNo hay países guardados.");
                PrintWaitForPressKey();
                return;
            }

            var sortedCountries = MyCountries
                .OrderByDescending(country => country.Population)
                .ToList();

            Console.WriteLine("\n=== MIS PAÍSES ===");
            for (int i = 0; i < sortedCountries.Count; i++)
            {
                Console.WriteLine($"{i + 1}. {sortedCountries[i].Name} - Pob: {sortedCountries[i].Population}");
            }

            ExportTopCountries(sortedCountries);
            PrintWaitForPressKey();
        }
    }
}
