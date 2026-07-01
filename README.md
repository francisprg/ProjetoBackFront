# Objetivo do Projeto

O projeto foi desenvolvido para as disciplinas de Desenvolvimento Back-End I e Desenvolvimento Front-End I com o objetivo de aplicar na prática os conceitos estudados durante o curso. A aplicação consiste em uma plataforma de avaliações e resenhas literárias, permitindo que leitores compartilhem opiniões sobre livros, publiquem comentários e gerenciem suas informações pessoais.

O sistema foi desenvolvido utilizando a arquitetura MVC (Model-View-Controller), promovendo organização, reutilização de código e facilidade de manutenção.

# Funcionalidades

* Cadastro e autenticação de usuários.
* Edição de perfil do leitor.
* Listagem de livros cadastrados.
* Busca de livros por diferentes filtros.
* Visualização de informações detalhadas dos livros.
* Criação de resenhas literárias.
* Edição e exclusão de resenhas.
* Criação, edição e exclusão de comentários em resenhas.
* Gerenciamento de lista de leitura.
* Comunicação assíncrona entre front-end e back-end utilizando JavaScript e Fetch API.
* API própria para processamento das requisições da aplicação.

# Tecnologias Utilizadas

## Back-End

* PHP
* Arquitetura MVC (Model-View-Controller)
* Programação Orientada a Objetos (POO)

## Front-End

* HTML5
* CSS3
* JavaScript

## Banco de Dados

* PostgreSQL

## Gerenciamento de Dependências

* Composer

# Instruções de Execução

## Pré-requisitos

* PHP 8 ou superior
* PostgreSQL
* Servidor local (Apache, XAMPP ou similar)
* Composer

## Passos para execução

1. Clone ou extraia o projeto para o diretório do servidor web.
2. Crie o banco de dados PostgreSQL.
3. Execute o script SQL de criação das tabelas.
4. Configure as credenciais de conexão com o banco de dados nos arquivos de configuração do projeto.
5. Execute o comando abaixo para instalar as dependências:

```bash
composer install
```

6. Inicie o servidor local.
7. Acesse a aplicação pelo navegador utilizando o endereço configurado no servidor.

# Estrutura dos Arquivos

```text
TRABALHOBACKFRONT/
│
├── api/
│   └── api.php
│
├── controller/
│   ├── authController.php
│   ├── livroController.php
│   ├── resenhaController.php
│   ├── comentarioController.php
│   └── ...
│
├── DAO/
│   ├── livroDAO.php
│   ├── leitorDAO.php
│   ├── comentarioDAO.php
│   └── ...
│
├── model/
│   ├── livroModel.php
│   ├── leitorModel.php
│   ├── comentarioModel.php
│   └── ...
│
├── view/
│   ├── home.php
│   ├── visualizarlivro.php
│   ├── perfilleitor.php
│   └── ...
│
├── public/
│   ├── css/
│   └── js/
│
├── config/
│
├── vendor/
│
├── index.php
└── composer.json
```

# Uso de API e JSON

O projeto não utiliza APIs externas para obtenção de dados.

A aplicação possui uma API interna localizada em `api/api.php`, responsável por receber requisições do front-end e retornar respostas em formato JSON.

## Funcionamento da integração

1. O JavaScript realiza requisições utilizando a Fetch API.
2. As requisições são enviadas para `api/api.php` com uma ação específica.
3. O controlador correspondente processa a solicitação.
4. Os DAOs acessam o banco de dados quando necessário.
5. O resultado é retornado em formato JSON.
6. O JavaScript interpreta a resposta e atualiza a interface do usuário.

Exemplos de operações disponibilizadas pela API:

* Listar livros.
* Buscar livros por filtro.
* Criar comentários.
* Editar comentários.
* Excluir comentários.
* Editar resenhas.
* Gerenciar listas de leitura.
* Autenticação de usuários.

## Limitações

* A aplicação depende de um banco de dados PostgreSQL configurado corretamente.
* Não há integração com serviços externos de livros ou avaliações.
* As funcionalidades dependem da disponibilidade do servidor PHP e do banco de dados.
* O sistema foi desenvolvido para fins acadêmicos e pode exigir melhorias adicionais de segurança e escalabilidade para uso em produção.
