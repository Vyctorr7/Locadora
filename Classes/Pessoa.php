<?php

// Define a classe abstrata Pessoa, que serve de modelo para Cliente e Funcionario (Herança)
    abstract class Pessoa {
    // Atributos privados para garantir o Encapsulamento
        private int $id;
        private string $nome;
        private string $cpf;
        private string $email;

    // Método Construtor para inicializar os atributos da Pessoa
    public function __construct(int $id, string $nome, string $cpf, string $email) {
        $this->id = $id; // Atribui o ID passado para a propriedade id
        $this->nome = $nome; // Atribui o Nome passado para a propriedade nome
        $this->cpf = $cpf; // Atribui o CPF passado para a propriedade cpf
        $this->email = $email; // Atribui o Email passado para a propriedade email
    }

    // Método Getter para obter o ID
    public function getId(): int {
        return $this->id; // Retorna o valor do ID
    }

    // Método Getter para obter o Nome
    public function getNome(): string {
        return $this->nome; // Retorna o valor do Nome
    }

    // Método Setter para alterar o Nome
    public function setNome(string $nome): void {
        $this->nome = $nome; // Atualiza o nome com a nova string fornecida
    }

    // Método Getter para obter o CPF
    public function getCpf(): string {
        return $this->cpf; // Retorna o valor do CPF
    }

    // Método Getter para obter o Email
    public function getEmail(): string {
        return $this->email; // Retorna o valor do Email
    }

    // Método Setter para alterar o Email
    public function setEmail(string $email): void {
        $this->email = $email; // Atualiza o email
    }
}

?>