<?php
// Elimina un gasto del archivo JSON por su ID
function deleteExpense($id) {
    $path = getPathExpenses();
    $expenses = loadJson($path);
    
    $found = false;
    for ($i = 0; $i < count($expenses); $i++) {
        if ($expenses[$i]->id == $id) {
            unset($expenses[$i]);
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        return false;
    }
    
    $expenses = array_values($expenses);
    saveJson($path, $expenses);
    return true;
}

// Solicita el ID al usuario y elimina el gasto correspondiente
function deleteExpenseWrapper() {
    $expenses = getAllExpenses();
    
    if (empty($expenses)) {
        message("No hay gastos para eliminar.");
        printPressEnterToContinue();
        return;
    }
    
    showNameExpense($expenses);
    
    message("Ingrese el ID del gasto a eliminar: ");
    $id = (int)trim(fgets(STDIN));
    
    if (!deleteExpense($id)) {
        message("Error: Gasto no encontrado.");
        printPressEnterToContinue();
        return;
    }
    
    message("Gasto eliminado exitosamente.");
    printPressEnterToContinue();
}
