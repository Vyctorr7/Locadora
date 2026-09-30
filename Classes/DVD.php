<?php

// Importa a classe abstrata Midia
    require_once __DIR__ . '/Midia.php';

// DVD é um tipo específico de Mídia
    class DVD extends Midia {
    // Atributo específico do DVD
        private bool $arranhado;

    // Construtor do DVD
    public function __construct(int $codigo, string $titulo, float $precoBase, bool $arranhado = false) {
        // Inicializa o construtor pai (Midia)
        parent::__construct($codigo, $titulo, $precoBase);
        $this->arranhado = $arranhado; // Define se a mídia física possui riscos
    }

    // Implementação obrigatória e concreta do método abstrato (Polimorfismo)
    public function calcularPrecoLocacao(int $dias): float {
        // O valor base do DVD é simples: Preço Base multiplicado pelo número de dias
        $total = $this->getPrecoBase() * $dias;

        // Caso o DVD esteja arranhado, aplica um desconto promocional de 10%
        if ($this->arranhado) {
            $total *= 0.90; // Aplica 10% de desconto
        }

        return $total; // Retorna o valor final calculado
    }
}

?>