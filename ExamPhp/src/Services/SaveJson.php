<?php
// Guarda un array de gastos en un archivo JSON
function saveJson($path, $expenses) {
    $data = [];
    
    foreach ($expenses as $expense) {
        $data[] = [
            'id' => $expense->id,
            'concepto' => $expense->concept,
            'cantidad' => $expense->amount,
            'categoria' => $expense->category,
            'fecha' => $expense->date
        ];
    }
    
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    // Crea el directorio si no existe
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    file_put_contents($path, $json);
}
?>