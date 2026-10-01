# 🎬 CineMax Locadora — Sistema de Gestão de Locadora de Mídias

Projeto Final em Equipe do componente curricular **Programação Orientada a Objetos (POO)**
Escola Técnica Albert Einstein (SEG) · Curso Técnico em Informática · Professor: Lucas Camponogara Machado

---

## 📌 1. Situação-problema
Locadoras de mídias físicas enfrentam dificuldades no controle do acervo, na cobrança de multas por devolução atrasada e no cálculo correto de tarifas diferentes conforme o tipo de mídia (DVD comum, DVD arranhado ou Blu-Ray 3D). Quando esse controle é manual, surgem valores inconsistentes, locações duplicadas do mesmo item e perda do histórico de clientes.

O **CineMax Locadora** resolve esse problema com um sistema orientado a objetos que automatiza a precificação, controla a disponibilidade das mídias e registra as multas no cadastro do cliente.

**Quem utilizaria:** atendentes da locadora (funcionários) no balcão e a gerência, para acompanhar o acervo e os contratos.

## 🎯 2. Objetivo
Construir um sistema modular, em PHP, que aplique os pilares da POO para calcular locações com regras de preço especializadas por tipo de mídia, evitar locações duplicadas e cobrar multas por atraso.

## ⚙️ 3. Principais funcionalidades
- **Precificação por tipo de mídia:** DVD arranhado recebe 10% de desconto; Blu-Ray 3D recebe taxa fixa de R$ 5,00.
- **Controle de disponibilidade:** a mídia alugada fica indisponível e volta ao acervo na devolução.
- **Locação com responsáveis:** cada contrato é ligado a um cliente e a um funcionário.
- **Devolução com multa:** atraso gera multa de R$ 5,00 por dia, somada ao saldo devedor do cliente.
- **Regra do cliente apto:** só aluga quem está ativo e sem multa pendente.
- **Listagem do acervo disponível**, com tipo, título e preço da diária.

## 🛠️ 4. Tecnologias utilizadas
- **Linguagem:** PHP 8.x
- **Paradigma:** Programação Orientada a Objetos
- **Ambiente:** Visual Studio Code e XAMPP (Apache)
- **Versionamento:** Git e GitHub

## 🗂️ 5. Organização do projeto
```
ProjetoEquipe/
├── Classes/
│   ├── Pessoa.php        (superclasse abstrata de pessoas)
│   ├── Cliente.php       (subclasse de Pessoa)
│   ├── Funcionario.php   (subclasse de Pessoa)
│   ├── Midia.php         (superclasse abstrata do acervo)
│   ├── DVD.php           (subclasse de Midia)
│   ├── BluRay.php        (subclasse de Midia)
│   ├── Locacao.php       (contrato de locação, total e multas)
│   └── Locadora.php      (gerencia clientes, funcionários, mídias e locações)
├── DOCS/
│   └── Documentacao_Tecnica_CineMax.pdf
├── .gitignore
├── index.php             (ponto de entrada e simulação do sistema)
└── README.md
```

## 🧩 6. Conceitos de POO aplicados
| Conceito | Onde aparece |
|---|---|
| **Classes e objetos** | `Cliente`, `Funcionario`, `DVD`, `BluRay`, `Locacao` e `Locadora` são instanciadas no `index.php`. |
| **Construtores** | Todas as classes inicializam seus atributos no `__construct()`; as subclasses chamam `parent::__construct()`. |
| **Encapsulamento** | Todos os atributos são `private`, acessados por getters e setters públicos. |
| **Herança** | `Cliente` e `Funcionario` herdam de `Pessoa`; `DVD` e `BluRay` herdam de `Midia`. As duas superclasses são abstratas. |
| **Sobrescrita e polimorfismo** | `Midia` declara o método abstrato `calcularPrecoLocacao()`; `DVD` e `BluRay` o implementam com regras diferentes, e `Locacao::calcularValorTotal()` o chama sem saber o tipo da mídia. |
| **Associação** | `Locacao` está ligada a um `Cliente` e a um `Funcionario`. |
| **Agregação** | `Locacao` agrega uma lista de `Midia`, e `Locadora` agrega clientes, funcionários, mídias e locações. Esses objetos existem independentemente do contêiner. |

## 🚀 7. Como executar
**Opção 1 — XAMPP (navegador):** copie a pasta `ProjetoEquipe` para `htdocs`, inicie o Apache e acesse:
```
http://localhost/ProjetoEquipe/index.php
```

**Opção 2 — Terminal (CLI):** na pasta do projeto, execute:
```bash
php index.php
```

**Resultado esperado:** o script lista o acervo, cria uma locação de 3 dias com três mídias, mostra o valor total de **R$ 57,50**, registra a devolução com 2 dias de atraso (saldo devedor de **R$ 10,00**) e exibe o acervo novamente.

## 👥 8. Integrantes da equipe
| Integrante | Módulo | Arquivos |
|---|---|---|
| João Victor Fagundes de Paula | Mídias e polimorfismo | `Midia.php`, `DVD.php`, `BluRay.php` |
| Guilherme Carvalho | Pessoas | `Pessoa.php`, `Cliente.php`, `Funcionario.php` |
| Cristofer | Central e sistema | `Locadora.php` |
| Arthur Franco de Andrade | Finanças e testes | `Locacao.php`, `index.php` |

## 📄 9. Documentação técnica
O diagrama de classes, o dicionário de classes, os fluxos, as regras, os testes e as limitações estão em [`DOCS/Documentacao_Tecnica_CineMax.pdf`](DOCS/Documentacao_Tecnica_CineMax.pdf).

## 🔭 10. Evoluções futuras
Persistência em banco de dados (MySQL/PDO), interface web, cálculo automático de atraso por datas, pagamento de multas, reservas e novas categorias de mídia.
