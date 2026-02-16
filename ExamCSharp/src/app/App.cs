

namespace APICountriesIA
{
    public static class App
    {
        public static async Task Run()
        {
            while (true)
            {
                PrintMenu();

                string? input = Console.ReadLine();
                int opcion = ValidateOption(input, 1, 3);

                PrintValidateInput(opcion, 1, 3);
                if (opcion == -1) continue;

                switch (opcion)
                {
                    case 1:
                        await SearchByName();
                        break;
                    case 2:
                        ListFavorites();
                        break;
                    case 3:
                        Console.WriteLine(exitMessage);
                        return;
                }
            }
        }
    }
}
