<?php

// Classe abstrata para representar mídias genéricas da locadora
    abstract class Midia {
    // Atributos privados
        private int $codigo;
        private string $titulo;
        private float $precoBase;
        private bool $disponivel;

    // Construtor da classe Midia
    public function __construct(int $codigo, string $titulo, float $precoBase) {
        $this->codigo = $codigo; // Define o código identificador
        $this->titulo = $titulo; // Define o título do filme
        $this->precoBase = $precoBase; // Define o preço base da diária
        $this->disponivel = true; // Por padrão, a mídia nasce disponível
    }

    // Getters e Setters
    public function getCodigo(): int {
        return $this->codigo; // Retorna o código da mídia
    }

    public function getTitulo(): string {
        return $this->titulo; // Retorna o título
    }

    public function getPrecoBase(): float {
        return $this->precoBase; // Retorna o preço base
    }

    public function isDisponivel(): bool {
        return $this->disponivel; // Retorna se está disponível para alugar
    }

    public function setDisponivel(bool $disponivel): void {
        $this->disponivel = $disponivel; // Atualiza a disponibilidade da mídia
    }

    // Método abstrato: TODA subclasse (DVD/BluRay) DEVE implementar seu próprio cálculo
    abstract public function calcularPrecoLocacao(int $dias): float;
}

?>