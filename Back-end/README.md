# Desafio | Backend

O desafio consiste em usar a base de dados em SQLite disponibilizada e criar uma **rota de uma API REST** que **liste e filtre** todos os dados. Serão 10 registros sobre os quais precisamos que seja criado um filtro utilizando parâmetros na url (ex: `/registros?deleted=0&type=sugestao`) e retorne todos resultados filtrados em formato JSON.

Você é livre para escolher o framework que desejar, ou não utilizar nenhum. O importante é que possamos buscar todos os dados acessando a rota `/registros` da API e filtrar utilizando os parâmetros `deleted` e `type`.

* deleted: Um filtro de tipo `boolean`. Ou seja, quando filtrado por `0` (false) deve retornar todos os registros que **não** foram marcados como removidos, quando filtrado por `1` (true) deve retornar todos os registros que foram marcados como removidos.
* type: Categoria dos registros. Serão 3 categorias, `denuncia`, `sugestao` e `duvida`. Quando filtrado por um `type` (ex: `denuncia`), deve retornar somente os registros daquela categoria.

O código deve ser implementado no diretorio /source. O bando de dados em formato SQLite estão localizados em /data/db.sq3.

Caso tenha alguma dificuldade em configurar seu ambiente e utilizar o SQLite, vamos disponibilizar os dados em formato array. Atenção: dê preferência à utilização do banco SQLite.

Caso você já tenha alguma experiência com Docker ou queira se aventurar, inserimos um `docker-compose.yml` configurado para rodar o ambiente (utilizando a porta 8000).

Caso ache a tarefa muito simples e queira implementar algo a mais, será muito bem visto. Nossa sugestão é implementar novos filtros (ex: `order_by`, `limit`, `offset`), outros métodos REST (`GET/{id}`, `POST`, `DELETE`, `PUT`, `PATCH`), testes unitários etc. Só pedimos que, caso faça algo do tipo, nos explique na _Resposta do participante_ abaixo.

# Resposta do participante
_Responda aqui quais foram suas dificuldades e explique a sua solução_

### Duvida 1 : Qual framework usar ? e qual arquitetura? precisa de ORM ?

Comecei fazendo em php puro , porém percebi que a tarefa era simples e eu podia transforma-la em algo mais amplo e seguro
então como ja tenho experiencia com Laravel , resolvi usar o Lumem que é um micro-framework do laravel me dando a possibilidade
de deixar minha API mais escalavel e segura com ORM , estruturação de rotas etc...

### Duvida 2: Formato da tabela.

Sempre que utilizei banco de dados no Laravel/Lumem eu criava ele pelas migrations utilizando as seed para popular as tabelas , porém com o banco de dados já pronto tive alguns problemas como a ausencia do campo `update_at` o lumem simplemente não faz o gerenciamento dos outros campos se esse não existesse , esse problema me forçou a estudar mais afundo a documentação do Lumem e descobrir que eu posso definir quais campos eu quero que sejam gerenciandos automaticamente

### Duvida 3: É pra deletar ou não ?

O campo `deleted` me gerou uma duvida quando eu criasse a rota de `DELETE` ele ia deletar o campo de fato ou alterar essa coluna para 1 , depois de pensar muito resolvi deixar essa função de altera o campo para o metodo `PUT` pois ao meu ver a API seria mais completa desse jeito , podendo deletar de fato a row inteira ou apenas escondela utilizando essa coluna `deleted`