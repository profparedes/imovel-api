## Imovel API

Esta é uma API de teste que está sendo criada em Laravel, simulando o gerenciamento de um site de imoveis, onde os imoveis podem ser cadastrados, atualizados e deletados (com soft-deletes e force-delete).

## Instalação

Para instalar e começar a usar a API, siga os seguintes passos:

- Clone o repositório para o seu computador usando o comando git clone
- Acesse o diretório do projeto com o comando cd imoveis-api
- Execute o comando composer install para instalar todas as dependências do projeto
- Copie o arquivo .env.example para .env e configure as suas configurações de banco de dados
- Execute o comando php artisan migrate para criar as tabelas do banco de dados
- Inicie o servidor com o comando php artisan serve
- Acesse a API em http://localhost:8000

## Endpoints

A seguir estão alguns exemplos de endpoints disponíveis na API:

- `GET /properties`: retorna uma lista de todos os imóveis na base de dados
- `GET /properties/{property}`: retorna um imóvel específico pelo seu ID
- `POST /properties`: adiciona um novo imóvel à base de dados
- `PUT /properties/{property}`: atualiza um imóvel existente pelo seu ID
- `DELETE /properties/{property}`: remove um imóvel com soft delete da base de dados pelo seu ID
- `DELETE /properties/{property}/force-delete`: remove um imóvel permanentemente da base de dados pelo seu ID

tambem possui endpoints de districts, cities e states.

## Queries

A API também possui algumas Queries como ordenar por nome, id, valor, data de publicação buscar por bairros, cidades ou estados, filtrar por valor, imoveis mobiliados, aceita animais, etc.
alguns exemplos de queries:

page: 1
per_page: 10
order_by: rent_value
order_direction: desc
is_rent: 1
is_sale: 1
is_furnished: 1
is_pet_friendly: 1
has_party_hall: 1
has_playground: 1
has_square: 1
has_gym: 1
has_pool: 1

## Contribuições

Se você deseja contribuir para o projeto, basta abrir uma pull request com suas alterações. Todas as contribuições serão revisadas e, se aprovadas, serão mescladas ao projeto.
