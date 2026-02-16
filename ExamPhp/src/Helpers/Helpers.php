<?php
// Genera un nuevo ID único para una tarea basado en el ID máximo existente
function generateId($tasks) {
    if (empty($tasks)) {
        return 1;
    }
    
    $maxId = 0;
    
    foreach ($tasks as $task) {
        if ($task->id > $maxId) {
            $maxId = $task->id;
        }
    }
    
    return $maxId + 1;
}

// Retorna la ruta del archivo JSON donde se guardan los gastos
function getPathExpenses() {
    return __DIR__ . "/../Data/expenses.json";
}

// Valida que la fecha sea válida (formato Y-m-d) y no sea anterior al día actual
function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    
    if (!$d || $d->format('Y-m-d') !== $date) {
        return false;
    }
    
    $today = new DateTime();
    $today->setTime(0, 0, 0);
    $dueDate = DateTime::createFromFormat('Y-m-d', $date);
    $dueDate->setTime(0, 0, 0);
    
    if ($dueDate < $today) {
        return false;
    }
    
    return true;
}
