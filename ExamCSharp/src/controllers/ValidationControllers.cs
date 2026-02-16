namespace APICountriesIA
{
    public class ValidationControllers
    {
        // Imprime el mensaje de entrada no valida
        public static void PrintValidateInput(int num,int min, int max)
        {
            if(num == -1)
                {
                    Console.WriteLine(string.Format(validarOpcionMsg, min, max));
                    PrintWaitForPressKey();
                    return;
                }
        }

        // Valida que el JsonDocument no sea null y muestra mensaje
        public static bool isValidateJsonNotNull(JsonDocument? json, string propName, string? input)
        {
            if(!ValidateString(input)) {
                // Console.WriteLine("Entrada no valida.\n");
                // PrintWaitForPressKey();
                return false;
            }
            if (json == null)
            {
                Console.WriteLine(string.Format(notFoundMsg, NAME_PROP, propName, input));
                PrintWaitForPressKey();
                return false;
            }
            return true;
        }
        
        // Valida que la lista de resultados no esté vacia y muestra mensaje
        public static bool isValidateResults(List<JsonElement> results, string propName, string? input){
            if(results.Count == 0)
            {
                Console.WriteLine(string.Format(notFoundMsg, NAME_PROP, propName, input));
                PrintWaitForPressKey();
                return false;
            }
            return true;
        }

    }
}