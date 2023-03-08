<p align="center"><a href="https://checklistfacil.com/" target="_blank"><img src="https://www.checklistfacil.com/wp-content/uploads/2022/07/logo_checklist_facil.webp" width="400" alt="Laravel Logo"></a></p>


## Sobre o Projeto

Realizar o desenvolvimento da proposta a seguir utilizando ao máximo as funcionalidades
do framework Laravel em sua versão mais recente.

### Desafio
- Criar um CRUD de rotas de API para o cadastro de bolos.
- Os bolos deverão ter Nome, Peso (em gramas), Valor, Quantidade disponível e uma lista
  de e-mail de interessados.
- Após o cadastro de e-mails interessados, caso haja bolo disponível, o sistema deve enviar
  um e-mail para os interessados sobre a disponibilidade do bolo.

## Tecnologias utilizadas

- Laravel Sail
- Docker
- Laravel V.10.2.0
- Composer version 2.5.4
- PHP 8.2
- MySql 8.0

## Iniciando o projeto
Foi utilizado alguns recursos do laravel para o teste como por exemplo:

- Api Resource
- Camada de Service 
- Pattern Repository
- Request
- Teste Unitario (PHPUnit)
- Queues
- Commands

## Iniciando o projeto

- Após clonar o repositorio, basta rodar o comando abaixo, para subir os container. Obs: Foi utilizado o *Laravel Sail*, desenvolvimento do mesmo, por se tratar de uma configuração rápida com Docker:
```shell
./vendor/bin/sail up
````

### Endpoints
**Na pasta database do projeto se encontra as collection para se usar no Postman**
```bash
api-cake.postman_collection.json
````

### Queue/Jobs
**Queue para disparo dos emails dos clientes interessados.**

**Os jobs estão sendo armazenados na base de dados na tabela jobs ate serem disparadas.**
- Foi criado o arquivo SendEmails.php dentro da pasta Console/Commands, onde executando o comando abaixo, o mesmo verifica quais clientes estão interessado e se cria os jobs para disparo, que ficam armazenados dentro da tabela jobs.
```bash
sail artisan send-emails 
````
O comando acima pode ser configurado em uma cron para rodar em horarios especifico ou em intervalos, para performance.

- Para executar a fila basta executar o seguinte comando, que ele vai ficar aguardando a fila para começar a disparar
```bash
sail artisan queue:work
````
- Algumas observações, so será criado o job especifico para aquele cliente se o bolo dele em questão cadastrado estiver com estoque, caso contrário não sera criada o job, obviamente o email não será disparado.


### Emails
**Por se tratar de um teste o sistema ira disparar os emails que serao recebidos usando mailpit que ja vem configurado por padrão no projeto do laravel utilizando o Sail, basta acessar a url
[`http://localhost:8025`](http://localhost:8025);

### Regras de disparo de emails
**Para que ocorra o disparo dos emails, existem algumas regras que precisam ser seguidas:**
- Precisa ter em estoque o bolo escolhido pelo usuario para ser avisado, caso nao tenha a quantidade em estoque nenhum email sobre aquele bolo sera disparado;
- Feito o disparo o sistema seta o campo email_sent do cliente como 1, fazendo com que não repita o disparo novamente para o mesmo.


## Testes
- Basta executar o comando abaixo que será executado todos os testes:
```bash
php artisan test
````

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
