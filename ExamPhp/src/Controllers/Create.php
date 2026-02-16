<?php
// Crea un nuevo gasto y lo guarda en el archivo JSON
function createExpense($concept, $amount, $category, $date) {
    $path = getPathExpenses();
    $expenses = loadJson($path);
    
    $id = generateId($expenses);
    $expenses[] = new Expense($id, $concept, $amount, $category, $date);
    
    saveJson($path, $expenses);
}

// Solicita los datos al usuario y crea un nuevo gasto
function createExpenseWrapper() {
    message("=== Crear Nuevo Gasto ===");
    
    do{
        message("Ingrese el concepto: ");
        $concept = trim(fgets(STDIN));
        
        if (empty($concept)) {
            message("Error: El concepto no puede estar vacío.");
            printPressEnterToContinue();
            return;
        }
    } while (empty($concept));
    
    do{
        message("Ingrese la cantidad: ");
        $amount = trim(fgets(STDIN));
        
        if (!is_numeric($amount) || $amount <= 0) {
            message("Error: La cantidad no puede estar vacía y debe ser un número mayor a cero.");
            printPressEnterToContinue();
            return;
        }
        $amount = floatval($amount);

    } while (!is_numeric($amount) || $amount <= 0);
    
    do{
        message("Ingrese la categoría: ");
        $category = trim(fgets(STDIN));

        if (empty($category)) {
            message("Error: La categoría no puede estar vacía.");
            printPressEnterToContinue();
            return;
        }

    } while (empty($category));
    
    message("Ingrese la fecha (Y-m-d): ");
    $date = trim(fgets(STDIN));
    
    // Fecha actual si el usuario no ingresa nada
    if (empty($date)) {
        $date = date("Y-m-d");
    }
    
    if (!validateDate($date)) {
        message("Error: La fecha no es válida.");
        printPressEnterToContinue();
        return;
    }
    
    createExpense($concept, $amount, $category, $date);
    
    message("Gasto creado exitosamente.");
    printPressEnterToContinue();
}

