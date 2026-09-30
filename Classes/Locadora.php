<?php

// Requer todas as classes para ser o gerenciador central
    require_once __DIR__ . '/Cliente.php';
    require_once __DIR__ . '/Funcionario.php';
    require_once __DIR__ . '/Midia.php';
    require_once __DIR__ . '/Locacao.php';

    class Locadora {
        private string $nomeFantasia;
    
    // Arrays que contêm o acervo e cadastros da empresa
        private array $clientes;
        private array $funcionarios;
        private array $midias;
        private array $locacoes;

    // Construtor
    public function __construct(string $nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
        $this->clientes = [];
        $this->funcionarios = [];
        $this->midias = [];
        $this->locacoes = [];
    }

    // Métodos de cadastro
    public function cadastrarCliente(Cliente $cliente): void {
        $this->clientes[] = $cliente; // Armazena o cliente na lista
    }

    public function cadastrarFuncionario(Funcionario $funcionario): void {
        $this->funcionarios[] = $funcionario; // Armazena o funcionário
    }

    public function cadastrarMidia(Midia $midia): void {
        $this->midias[] = $midia; // Armazena a mídia no acervo
    }

    public function registrarLocacao(Locacao $locacao): void {
        $this->locacoes[] = $locacao; // Registra o contrato de locação
    }

    // Métodos de listagem e exibição em tela
    public function listarAcervoDisponivel(): void {
        echo "=== ACERVO DISPONÍVEL - " . $this->nomeFantasia . " ===\n";
        foreach ($this->midias as $midia) {
            // Se a mídia estiver disponível, exibe na tela
            if ($midia->isDisponivel()) {
                echo "- [" . get_class($midia) . "] " . $midia->getTitulo() . " (R$ " . number_format($midia->getPrecoBase(), 2, ',', '.') . "/dia)\n";
            }
        }
    }
}

?>