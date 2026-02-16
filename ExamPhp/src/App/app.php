<?php
class App {
    // Ejecuta el bucle principal de la aplicación mostrando el menú y procesando las opciones
    public function runApp() {
        while (true) {
            ShowMenuExpenses();
            $option = trim(fgets(STDIN));
            
            switch ($option) {
                case '1':
                    createExpenseWrapper();
                    break;
                    
                case '2':
                    showExpensesWrapper();
                    break;
                    
                case '3':
                    updateExpenseWrapper();
                    break;
                    
                case '4':
                    deleteExpenseWrapper();
                    break;
                case '5':
                    showExpensesByCategoryWrapper();
                    break;
                    
                case '0':
                    message("Gracias por usar la aplicación. ¡Hasta luego!");
                    exit(0);
                    
                default:
                    message("Opción no válida. Por favor, ingrese un número del 0 al 5.");
                    printPressEnterToContinue();
                    break;
            }
        }
    }
}
?>