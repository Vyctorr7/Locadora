<?php

// Importa a classe pai Pessoa
    require_once __DIR__ . '/Pessoa.php';

// A classe Funcionario herda (extends) da classe Pessoa
    class Funcionario extends Pessoa {
    // Atributo específico do funcionário
        private string $matricula; // Código de registro na empresa

    // Construtor da classe Funcionario
    public function __construct(int $id, string $nome, string $cpf, string $email, string $matricula) {
        // Chama o construtor da classe Pai (Pessoa)
        parent::__construct($id, $nome, $cpf, $email);
        $this->matricula = $matricula; // Define a matrícula do funcionário
    }

    // Getter para obter a matrícula
    public function getMatricula(): string {
        return $this->matricula; // Retorna o número da matrícula
    }
}

?>