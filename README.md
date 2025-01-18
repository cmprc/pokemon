# Projeto Pokémon

## Introdução

Este é um projeto desenvolvido em **Symfony v7.2**, criado para apresentar uma aplicação web dinâmica que explora o universo das cartas Pokémon. A aplicação permite que os usuários visualizem uma lista de cartas disponíveis, acessem os detalhes completos de cada carta e explorem informações como tipos, fraquezas, resistências, ataques e imagens.

O projeto utiliza **boas práticas de desenvolvimento**, como injeção de dependências, separação de responsabilidades e testes automatizados com **PHPUnit**, garantindo alta qualidade e confiabilidade. Além disso, a arquitetura é modular e extensível, o que facilita a integração de novas funcionalidades no futuro.

## Stack
![Symfony](https://img.shields.io/badge/symfony-%23000000.svg?style=for-the-badge&logo=symfony&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)


## Instalação e configuração

### 1. Pré-requisitos:

- **PHP** 8.1 ou superior
- [Composer](https://getcomposer.org/)
- Node
- **Symfony CLI** (recomendado)

### 2. Instalação:

1. Faça o clone do projeto para sua máquina local

2. Execute os comandos abaixo para instalar todas as dependências do projeto:

```bash
composer install
npm install
```

### 3. Configuração do Ambiente

Configure as variáveis de ambiente no arquivo .env, como a API key para ter maior cota de chamadas:
```bash
POKEMON_API_KEY=your_api_key
```

### 4. Execução do Projeto

a. Usando o Symfony CLI, inicie o servidor com:
```bash
symfony serve
```

b. Abra o navegador e acesse:
http://127.0.0.1:8000

## Rodar os Testes

### 1. Pré-requisitos:

Certifique-se de que o PHPUnit está instalado. Caso não esteja, instale via Composer:

```bash
composer require --dev phpunit/phpunit
```

### 2. Executar os Testes:

Para executar todos os testes, utilize:

```bash
php bin/phpunit
```

### 3. Resultados:

O PHPUnit gerará um relatório indicando os testes que passaram e eventuais falhas.

---

## Links Úteis

- [Documentação do Symfony](https://symfony.com/doc/current/index.html)
- [Instalação do Composer](https://getcomposer.org/doc/00-intro.md)
- [PHPUnit - Guia Oficial](https://phpunit.de/documentation.html)
