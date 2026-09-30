<?php

// Configura o cabeçalho para texto simples facilitando a leitura no terminal/navegador
    header('Content-Type: text/plain; charset=utf-8');

// Carrega todas as classes necessárias
    require_once __DIR__ . '/classes/Locadora.php';
    require_once __DIR__ . '/classes/Cliente.php';
    require_once __DIR__ . '/classes/Funcionario.php';
    require_once __DIR__ . '/classes/DVD.php';
    require_once __DIR__ . '/classes/BluRay.php';

        echo "=========================================================\n";
        echo "   SISTEMA DE GESTÃO DE LOCADORA - PROJETO POO FINAL     \n";
        echo "=========================================================\n\n";

// 1. Instanciando o sistema principal (Locadora)
    $locadora = new Locadora("CineMax Locadora");

// 2. Instanciando Pessoas (Clientes e Funcionários)
    $cliente1 = new Cliente(1, "João Victor Fagundes", "123.456.789-00", "joao@email.com");
    $funcionario1 = new Funcionario(101, "Carlos Oliveira", "987.654.321-11", "carlos@cinemax.com", "FUNC-01");

    $locadora->cadastrarCliente($cliente1);
    $locadora->cadastrarFuncionario($funcionario1);

// 3. Instanciando Mídias (DVDs e BluRays - Polimorfismo)
    $dvd1 = new DVD(1001, "O Senhor dos Anéis: A Sociedade do Anel", 5.00, false);
    $dvd2 = new DVD(1002, "Matrix (Mídia Arranhada)", 5.00, true); // Aplica 10% de desconto
    $bluray1 = new BluRay(2001, "Avatar: O Caminho da Água", 8.00, true); // Taxa 3D de R$ 5,00

    $locadora->cadastrarMidia($dvd1);
    $locadora->cadastrarMidia($dvd2);
    $locadora->cadastrarMidia($bluray1);

// 4. Exibe o acervo inicial
    $locadora->listarAcervoDisponivel();
        echo "\n";

// 5. Testando Validação de Regra de Negócio antes de Alugar
    if ($cliente1->podeAlugar()) {
        echo ">> Cliente " . $cliente1->getNome() . " está apto para alugar.\n";
    
    // Criando um contrato de Locação para 3 dias
    $locacao1 = new Locacao($cliente1, $funcionario1, 3);
    
    // Adicionando mídias à locação (Agregação)
    $locacao1->adicionarMidia($dvd1);
    $locacao1->adicionarMidia($dvd2);
    $locacao1->adicionarMidia($bluray1);
    
    $locadora->registrarLocacao($locacao1);

    // Demonstração de Cálculo Polimórfico
        echo "\n>>> DETALHES DA LOCAÇÃO <<<\n";
        echo "Atendido por: " . $locacao1->getFuncionario()->getNome() . "\n";
        echo "Cliente: " . $locacao1->getCliente()->getNome() . "\n";
        echo "Valor Total Calculado (com descontos/taxas 3D): R$ " . number_format($locacao1->calcularValorTotal(), 2, ',', '.') . "\n\n";

    // 6. Testando Mídia que ficou Indisponível
    $locadora->listarAcervoDisponivel();
        echo "\n";

    // 7. Simulando a Devolução com 2 dias de Atraso
        echo ">> Realizando a devolução das mídias com 2 dias de atraso...\n";
    $locacao1->finalizarDevolucao(2); // 2 dias de atraso

        echo "Status do Saldo Devedor do Cliente: R$ " . number_format($cliente1->getSaldoDevedor(), 2, ',', '.') . "\n";
        echo "Cliente pode alugar novamente? " . ($cliente1->podeAlugar() ? "SIM" : "NÃO (Multa Pendente)") . "\n\n";

    // 8. Estado final do acervo (Mídias liberadas)
    $locadora->listarAcervoDisponivel();
}

?>