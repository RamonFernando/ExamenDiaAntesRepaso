
namespace APICountriesIA
{
    public class Views
    {
        public static void PrintMenu()
        {
            try
            {
                Console.Clear();
            }
            catch (IOException)
            {
                // Entornos no interactivos pueden no soportar limpiar la consola.
            }
            Console.WriteLine("=== MENÚ MUNDO ===");
            Console.WriteLine("1. Buscar país");
            Console.WriteLine("2. Listar mis países (Ordenados por población)");
            Console.WriteLine("3. Salir");
            Console.Write("Seleccione una opción: ");
        }
        public static void PrintWaitForPressKey()
        {
            Console.WriteLine(pressToContinueMsg);
            Console.ReadKey();
        }
    }
}