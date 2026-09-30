# 🎬 Sistema de Gestão de Locadora de Mídias (CineMax)

Projeto Final desenvolvido para o componente curricular de **Programação Orientada a Objetos (POO)**.

---

## 📌 1. Situação-Problema
Locadoras de mídias físicas enfrentam dificuldades no controle de acervo, identificação de devoluções em atraso e cálculo correto de tarifas diferenciadas conforme o tipo de mídia (DVDs convencionais, mídias danificadas ou Blu-Rays 3D). O sistema resolve esse problema automatizando o controle do acervo, aplicando regras de negócio específicas e calculando cobranças e multas de forma transparente e modular.

---

## 🛠️ 2. Tecnologias Utilizadas
- **Linguagem:** PHP 8.x
- **Paradigma:** Programação Orientada a Objetos (POO)
- **Versionamento:** Git & GitHub

---

## 🧩 3. Conceitos de POO Aplicados
1. **Classes e Objetos:** Instanciação de entidades reais (`Cliente`, `Funcionario`, `DVD`, `BluRay`, `Locacao`).
2. **Encapsulamento:** Uso de atributos `private` e `protected`, acessados estritamente via métodos `getters` e `setters`.
3. **Herança:** `Cliente` e `Funcionario` herdam de `Pessoa`; `DVD` e `BluRay` herdam de `Midia`.
4. **Polimorfismo e Sobrescrita:** Método `calcularPrecoLocacao($dias)` especializado em `DVD` e `BluRay`.
5. **Relacionamentos entre Objetos:** Associação, Agregação e Composição entre as classes do sistema.

---

## 🚀 4. Como Executar o Sistema
Para executar o teste do sistema no terminal:
```bash
php index.php