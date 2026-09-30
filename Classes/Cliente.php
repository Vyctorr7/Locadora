<?php

// Importa a classe pai Pessoa
    require_once __DIR__ . '/Pessoa.php';

// A classe Cliente herda (extends) os atributos e métodos da classe Pessoa
    class Cliente extends Pessoa {
    // Atributos específicos do Cliente (Encapsulamento)
        private bool $ativo; // Status do cliente no sistema
        private float $saldoDevedor; // Quantidade de multas pendentes

    // Construtor do Cliente
    public function __construct(int $id, string $nome, string $cpf, string $email) {
        // Executa o construtor da classe pai (Pessoa)
        parent::__construct($id, $nome, $cpf, $email);
        $this->ativo = true; // Por padrão, o cliente inicia ativo
        $this->saldoDevedor = 0.0; // Inicia sem dívidas
    }

    // Retorna se o cliente está ativo
    public function isAtivo(): bool {
        return $this->ativo; // Retorna true ou false
    }

    // Ativa ou desativa o cliente
    public function setAtivo(bool $ativo): void {
        $this->ativo = $ativo; // Altera o status do cliente
    }

    // Retorna o saldo devedor do cliente
    public function getSaldoDevedor(): float {
        return $this->saldoDevedor; // Retorna o valor acumulado em multas
    }

    // Registra uma multa ao saldo devedor
    public function adicionarMulta(float $valor): void {
        $this->saldoDevedor += $valor; // Soma o valor ao saldo existente
    }

    // Regra de negócio: verifica se o cliente pode realizar locações
    public function podeAlugar(): bool {
        // Só pode alugar se estiver ativo e não tiver multas pendentes
        return $this->ativo && $this->saldoDevedor == 0.0;
    }
}

?>