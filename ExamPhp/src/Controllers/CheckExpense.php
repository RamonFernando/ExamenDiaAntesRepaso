<?php
// Obtiene todos los gastos desde el archivo JSON
function getAllExpenses() {
    return loadJson(getPathExpenses());
}

// Muestra todos los gastos con su información completa
function showExpensesWrapper() {
    $expenses = getAllExpenses();
    
    if (empty($expenses)) {
        message("No hay gastos registrados.");
    } else {
        message("=== Lista de Gastos ===");
        
        foreach ($expenses as $expense) {
            $expense->toString();
        }
    }
    
    printPressEnterToContinue();
}
