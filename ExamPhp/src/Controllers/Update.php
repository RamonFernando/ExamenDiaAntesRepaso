<?php
// Actualiza los datos de un gasto existente por su ID
// Solo actualiza los campos que no estén vacíos
function updateExpense($id, $amount, $concept, $category, $date) {
    $path = getPathExpenses();
    $expenses = loadJson($path);
    
    $found = false;
    foreach ($expenses as $expense) {
        if ($expense->id == $id) {
            // Solo actualiza si el campo no está vacío
            if (!empty(trim((string)$amount))) {
                $expense->amount = $amount;
            }
            
            if (!empty(trim($concept))) {
                $expense->concept = $concept;
            }
            
            if (!empty(trim($category))) {
                $expense->category = $category;
            }
            
            if (!empty(trim($date))) {
                $expense->date = $date;
            }
            
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        return false;
    }
    
    saveJson($path, $expenses);
    return true;
}

// Solicita el ID y los nuevos datos al usuario para actualizar un gasto
function updateExpenseWrapper() {
    $expenses = getAllExpenses();
    
    if (empty($expenses)) {
        message("No hay gastos para actualizar.");
        printPressEnterToContinue();
        return;
    }
    
    showNameExpense($expenses);
    
    message("Ingrese el ID del gasto a actualizar: ");
    $id = (int)trim(fgets(STDIN));
    
    message("Ingrese el nuevo concepto [Enter para mantener]: ");
    $concept = trim(fgets(STDIN));
    
    message("Ingrese la nueva cantidad [Enter para mantener]: ");
    $amount = trim(fgets(STDIN));
    
    if (!empty($amount)) {
        if (!is_numeric($amount) || $amount <= 0) {
            message("Error: La cantidad debe ser un número mayor a cero.");
            printPressEnterToContinue();
            return;
        }
        $amount = floatval($amount);
    }
    
    message("Ingrese la nueva categoría [Enter para mantener]: ");
    $category = trim(fgets(STDIN));
    
    message("Ingrese la nueva fecha (Y-m-d) [Enter para mantener]: ");
    $date = trim(fgets(STDIN));
    
    // Solo valida la fecha si no está vacía (vacío = mantener la actual)
    if (!empty($date) && !validateDate($date)) {
        message("Error: La fecha no es válida.");
        printPressEnterToContinue();
        return;
    }
    
    if (!updateExpense($id, $amount, $concept, $category, $date)) {
        message("Error: Gasto no encontrado.");
        printPressEnterToContinue();
        return;
    }
    
    message("Gasto actualizado exitosamente.");
    printPressEnterToContinue();
}
