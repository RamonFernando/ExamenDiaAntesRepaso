<?php
// Muestra el menú principal de la aplicación
function ShowMenuExpenses() {
    system('cls');
    echo "\n=====================================\n";
    echo "Bienvenido a la lista de gastos:\n";
    echo "Menu de Gastos:\n";
    echo "1. Crear Gasto\n";
    echo "2. Mostrar Gastos\n";
    echo "3. Actualizar Gasto\n";
    echo "4. Eliminar Gasto\n";
    echo "5. Mostrar Gastos por Categoría\n";
    echo "0. Salir\n";
    echo "\n=====================================\n";
    echo "Por favor, ingrese su elección: ";
}

// Muestra un mensaje en consola
function message($msg) {
    echo $msg . "\n";
}

// Pausa la ejecución hasta que el usuario presione Enter
function printPressEnterToContinue() {
    echo "Presione Enter para continuar...";
    fgets(STDIN);
}

// Muestra una lista resumida de gastos (solo ID y título)
function showNameExpense($expenses) {
    if (empty($expenses)) {
        message("No hay gastos pendientes");
        printPressEnterToContinue();
        return;
    }
    
    message("Lista de gastos:");
    
    foreach ($expenses as $expense) {
        echo "ID: " . $expense->id . " - Concepto: " . $expense->concept . "\n";
    }
    
    printPressEnterToContinue();
}
?>