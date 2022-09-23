## REGISTRO Api

<ul>
    <li>Nomeclatura e Flow Git</li>
    <li>Tecnologia e suas vantagens</li>
    <li>Como rodar a Api</li>
    <li>Docs</li>
</ul>

# Desafio Contato Seguro , observações.

eu adorei a empresa da contato seguro e seu objetivo de ajudar as pessoas, por isso gostaria de deixar aqui alguns feedbacks do processo seletivo que fiz , 

<li>Porque os dois testes não estão ligados ?</li>

Por exemplo porque o Front-end não está consumindo a api que construimos

<li>Arquitetura MSC</li>

Como são dividios em  2 testes diferentes que fazem coisas diferetem testes para uma arquitetura MVC se torna muito dificil ,uma vez que não será retornada uma view 

<hr>
<a href="#nomeclatura" name="nomeclatura"></a>

# Nomeclatura e Flow

Optei por deixar o nome das funções e variaveis em pt-br para que todos possam ler e entender oque cada uma faz , salve pelos nomes mais conhecidos `update` por exemplo e palavras reservadas

Seguindo o padrão REST e abandonando os verbos ficando apenas com o substantivo , temos os metodos dos endpoints dizendo oque cada um faz

Sobre o git Flow optei por um modelo mais rapido

Main -> develop -> front-end / back-end

ai os elementos vão retornando quando estiverem prontos
<hr>

# Tecnologia e suas vantagens
O Lumem é um micro-framework que facilita muito o trabalho de quem coda em php , pois ele traz uma serie de ferramentas melhoram a qualidade da Api , `ORM` e as `Routes` por exemplo , minhas duas alternativas se não o lumem era o `Aura Route` mas o projeto não cresceu muito desde a ultima vez que eu o vi , então optei pelo Lumem mesmo

<hr>

# Como rodar a Api

Instale as dependencias
>Composer install

E logo em seguida abrir um servidor php 

>php -S localhost:8000 -t public


<hr>

# Docs 

### Endpoint = /registro

*GET* /registro
query = ?typed=""&deleted=""


Exemplo:
>{{base Url}}/registro?typed="denuncia"&deleted=1

lembrando que os parametros por query são opcionais 

Retorno: Uma lista paginada :)

current_page": 1,
    "data": [
        {
            "id": 7,
            "type": "denuncia",
            "message": "Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.",
            "is_identified": "0",
            "whistleblower_name": null,
            "whistleblower_birth": null,
            "created_at": "2020-12-21T21:55:40.000000Z",
            "deleted": "1"
        },
        {
            "id": 21,
            "type": "denuncia",
            "message": "bbbb",
            "is_identified": "1",
            "whistleblower_name": "danielaaaaa",
            "whistleblower_birth": "2001-12-30",
            "created_at": "2022-09-22T18:10:20.000000Z",
            "deleted": "1"
        }
    ],
    "first_page_url": "http://localhost:8000/registro?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/registro?page=1",
    "links": [
        {
            "url": null,
            "label": "pagination.previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/registro?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "pagination.next",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://localhost:8000/registro",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
<hr>

*Get* -> /registro/{id}

Exemplo:
>{{base Url}}/registro/{2}

Agora uma busca feita pelo ID do registro

Retorno: os dados coletados desse registro

{
    "id": 2,
    "type": "duvida",
    "message": "Donec ut mauris eget massa tempor convallis.",
    "is_identified": "1",
    "whistleblower_name": "Carly Insko",
    "whistleblower_birth": "1988-03-19",
    "created_at": "2020-12-19T09:55:55.000000Z",
    "deleted": "1"
}

<hr>

*Post* -> /registro

Exemplo:
>{{base Url}}/registro

Entrada: 
{
    "type" : "`STRING`",
    "message": "`STRING`",
    "is_identified" : `INT`,
    "whistleblower_name":"`STRING`",
    "whistleblower_birth":"`DATA`",
    "deleted" :`INT`
}

>Caso houver um valor repetido a api não irá salvar porem irá retornar o elemento que já existe dentro do banco de dados

Retorno: os dados coletados desse registro que acabou de ser salvo

Exemplo de retorno: 
{
    "type": "denuncia",
    "message": "eeee",
    "is_identified": 1,
    "whistleblower_name": "danieaaaal",
    "whistleblower_birth": "2001-12-30",
    "deleted": 0,
    "created_at": "2022-09-23T15:20:53.000000Z",
    "id": 48
}

<hr>

*PUT* -> /registro/{id}

Exemplo:
>{{base Url}}/registro/{id}

Agora é feito uma alteração de alguns campo ou todos pelo usuario

Entrada: 
{
    "type" : "`STRING`",
    "message": "`STRING`",
    "is_identified" : `INT`,
    "whistleblower_name":"`STRING`",
    "whistleblower_birth":"`DATA`",
    "deleted" :`INT`
}

Retorno: os dados coletados desse registro

Retorno : 1 Caso houver sucesso  0 Caso o elemento não existir

<hr>

*Delete* -> /registro/{id}

Exemplo:
>{{base Url}}/registro/{id}

Agora é feito uma exclusão pelo usuario 

>OBS: Essa é uma exclusão definitiva caso queira marcar como deleted utilize o PUT


