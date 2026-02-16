<?php
require_once __DIR__ . '/../Models/Expense.php';

// Carga los gastos desde un archivo JSON y los convierte en objetos Expense
function loadJson($path) {
    if (!file_exists($path)) {
        return [];
    }
    
    $json = file_get_contents($path);
    $data = json_decode($json, true);
    
    if (!is_array($data)) {
        return [];
    }
    
    $expenses = [];
    
    foreach ($data as $item) {
        $expenses[] = new Expense(
            $item['id'],
            $item['concepto'],
            $item['cantidad'],
            $item['categoria'],
            $item['fecha']
        );
    }
    
    return $expenses;
}
?>
