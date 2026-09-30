<?php

// Importa a classe abstrata Midia
    require_once __DIR__ . '/Midia.php';

// BluRay é outro tipo de Mídia
    class BluRay extends Midia {
    // Atributo específico para mídias de alta definição
        private bool $is3D;

    // Construtor do BluRay
    public function __construct(int $codigo, string $titulo, float $precoBase, bool $is3D = false) {
        // Inicializa a classe mãe Midia
        parent::__construct($codigo, $titulo, $precoBase);
        $this->is3D = $is3D; // Informa se o BluRay possui suporte a 3D
    }

    // Implementação polimórfica da regra de preço para BluRay
    public function calcularPrecoLocacao(int $dias): float {
        // Valor base multiplicado pelos dias
        $total = $this->getPrecoBase() * $dias;

        // Se o filme for 3D, acrescenta um adicional fixo de R$ 5.00
        if ($this->is3D) {
            $total += 5.00; // Adiciona taxa de 3D
        }

        return $total; // Retorna o valor calculado
    }
}

?>