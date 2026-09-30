<?php

// Requer as dependências necessárias
    require_once __DIR__ . '/Cliente.php';
    require_once __DIR__ . '/Funcionario.php';
    require_once __DIR__ . '/Midia.php';

    class Locacao {
    // Associação Simples: a Locacao usa um Cliente e um Funcionario
        private Cliente $cliente; 
        private Funcionario $funcionario;
    
    // Agregação: a Locacao possui uma lista de mídias (Midia[]), mas as mídias existem independentemente da locação
        private array $midias; 
    
        private string $dataLocacao;
        private int $diasContratados;
        private bool $finalizada;

    // Construtor da Locacao
    public function __construct(Cliente $cliente, Funcionario $funcionario, int $diasContratados) {
        $this->cliente = $cliente; // Define o cliente da transação
        $this->funcionario = $funcionario; // Define o funcionário que atendeu
        $this->diasContratados = $diasContratados; // Define por quantos dias foi alugado
        $this->midias = []; // Inicializa a lista de mídias vazia
        $this->dataLocacao = date('Y-m-d'); // Guarda a data atual
        $this->finalizada = false; // A locação começa aberta
    }

    // Agregação de Mídias na Locação
    public function adicionarMidia(Midia $midia): void {
        // Verifica se a mídia está disponível antes de adicionar
        if ($midia->isDisponivel()) {
            $this->midias[] = $midia; // Adiciona no array de mídias
            $midia->setDisponivel(false); // Altera o status da mídia para alugada
        } else {
            echo "A mídia '" . $midia->getTitulo() . "' já está alugada!\n";
        }
    }

    // Demonstra POLIMORFISMO chamando calcularPrecoLocacao() sem se importar se é DVD ou BluRay
    public function calcularValorTotal(): float {
        $total = 0.0; // Acumulador do valor final

        // Percorre cada mídia associada a esta locação
        foreach ($this->midias as $midia) {
            // Chama o método polimórfico de cada objeto (DVD ou BluRay)
            $total += $midia->calcularPrecoLocacao($this->diasContratados);
        }

        return $total; // Retorna a soma de todas as diárias do contrato
    }

    // Conclui e encerra a locação
    public function finalizarDevolucao(int $diasEfetivosAtraso = 0): void {
        // Marca todas as mídias associadas como disponíveis novamente
        foreach ($this->midias as $midia) {
            $midia->setDisponivel(true); // Mídia volta para a estante
        }

        // Se houver atraso na devolução, aplica cobrança de multa
        if ($diasEfetivosAtraso > 0) {
            $valorMulta = $diasEfetivosAtraso * 5.00; // R$ 5,00 por dia de atraso
            $this->cliente->adicionarMulta($valorMulta); // Adiciona dívida no cadastro do cliente
        }

        $this->finalizada = true; // Define o contrato como encerrado
    }

    // Getters para consulta
    public function getCliente(): Cliente {
        return $this->cliente;
    }

    public function getFuncionario(): Funcionario {
        return $this->funcionario;
    }

    public function getMidias(): array {
        return $this->midias;
    }
}

?>