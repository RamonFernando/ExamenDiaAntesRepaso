<?php
// Muestra los gastos que pertenecen a la categoría especificada por el usuario
function showExpensesByCategoryWrapper() {
    $expenses = getAllExpenses();

    if (empty($expenses)) {
        message("No hay gastos registrados.");
        printPressEnterToContinue();
        return;
    }

    showNameExpense($expenses);
    message("Ingrese la categoría a buscar: comida, transporte, ocio, etc.: ");
    $category = trim(fgets(STDIN));

    if (empty($category)) {
        message("Error: La categoría no puede estar vacía.");
        printPressEnterToContinue();
        return;
    }

    $found = false;
    message("=== Gastos en la categoría: " . $category . " ===\n");
    foreach ($expenses as $expense) {
        if ($expense->TryShowExpenseByCategory($category)) {
            $found = true;
        }
    }

    if (!$found) {
        message("No se encontraron gastos para esa categoría.");
    }
    printPressEnterToContinue();
}

?>