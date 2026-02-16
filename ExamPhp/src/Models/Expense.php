<?php
class Expense {
    public $id;
    public $concept;
    public $amount;
    public $category;
    public $date;
    
    // Constructor: inicializa los atributos del gasto
    public function __construct($id, $concept, $amount, $category, $date) {
        $this->id = $id;
        $this->concept = $concept;
        $this->amount = $amount;
        $this->category = $category;
        $this->date = $date;
    }

    // Muestra la información completa del gasto en consola
    public function toString() {
        echo "ID: " . $this->id . "\n";
        echo "Concepto: " . $this->concept . "\n";
        echo "Cantidad: " . $this->amount . "\n";
        echo "Categoría: " . $this->category . "\n";
        echo "Fecha: " . $this->date . "\n";
        echo "-------------------\n";
    }

    // Muestra el gasto solo si pertenece a la categoría especificada
    public function TryShowExpenseByCategory($category) {
        if (strtolower(trim($this->category)) === strtolower(trim($category))) {
            $this->toString();
            return true;
        }

        return false;
    }
}
?>