# Back-End da Aplicação de controle de estoque

### Desenvolvido por: Elmo Jerry Imperial Leitão

## Requisitos

- Docker - para baixar [clique aqui](https://docs.docker.com/engine/install/).
- PHP 8.2- para baixar [clique aqui](https://www.php.net/downloads), caso tiver a usar o linux é necessário instalar todas as libs do php.
- Composer - para baixar [clique aqui](https://getcomposer.org/download/)
- Front-End - para baixar [clique aqui](https://github.com/elmojerry88/stock-app)

## Instalação:

- Após instalar os requisitos, clique em *code* e baixe o arquivo.
- Abra a sua linha de comando, entre na pasta da aplicação, e execute:

```bash
composer install
```
Esse comado irá instalar todas as dependencias necessárias para rodar a aplicação.

- Após a instalação, crie um arquivo .env e copie todos os arquivos do .env.example para dentro do .env
- Inicie o docker, caso não saiba usar o docker [clique aqui ](https://docker-curriculum.com/) para seguir um tutorial.
- Abra a sua linha de comando dentro da pasta da aplicação e execute:

```bash
php artisan key:generate
```

Esse comando irá gerar uma chaves encriptada para aplicação dentro do arquivo .env em APP_KEY.

- Ainda na sua linha de comando dentro da pasta execute:

```bash
php artisan migrate
```

Esse comando criará todas as tabelas no banco de dados.
É importante destacar que deve ter instalado o docker para conseguir fazer o banco de dados funcionar.

- Depois de executar as migrações, execute:

```bash
php artisan db:seed
```

Esse comando irá criar usuários, armas e agentes no banco de dados.

- Por padrão a aplicação já estará no ar dentro de um container docker.

- A aplicação estará rodar em [http://localhost:8000](http://localhost:8000).

## Login:

- Após seguir os passos de instalação, será possivel fazer login no Front-End (é importante que tenha também o Front-End para baixar [clique aqui](https://github.com/elmojerry88/stock-app))

### Usuários:

- Email: *elmojerry@example.com* | password: *123456789*
- Email: *paulofernandes@example.com* | password: *123456789*
- Email: *isabeldaniela@example.com* | password: *123456789*
- Email: *pauladaniela@example.com* | password: *123456789*


### Criando um novo usuário:

- A aplicação não foi preparada para retornar notificações, adicionarei na versão 2.1 da aplicação. Verique as branchs para ver se existe atualizações.
- Após criar um usuário é possivel que o seu usuário foi criado com sucesso, volte para a tela de _login_ e efectue o login com o seu usuário!.


## Registrando saídas e entradas:

- Para registrar saídas e entradas é necessário que o agente esteja registrado no banco de dados, por padrão a aplicação não notifica erros... isso adicionarei na versão 2.1 da aplicação, verique as branchs para baixar a versão atualizada.

### Agentes:

- Nome: *Nascimento*
- Nome: *Cardoso*
- Nome: *Bento*
- Nome: *Erica*
- Nome: *Delgada*
- Nome: *Elmo*


## Rotas da API:

A URL base para acessar os endpoints da api é  [http://localhost:8000/api](http://localhost:8000/api)

### User:

- ´/user/´
- ´/user/store´
- ´user/count´

### Police officer:

- ´/officer/´
- ´/officer/store´
- ´/officer/count´

### Leave:

- ´/leave/´
- ´/leave/store´
- ´/leave/count´

### Receive:

- ´/receive/´
- ´/receive/store´
- ´/receive/count´


### Weapon:

- ´/weapon/´
- ´/weapon/store´
- ´/weapon/count´
- ´/weapon/sum´






## NOTA:

- É necessário que tenha baixado o Front-End da aplicação, para uma experiência completa!
- Essa aplicação sofrerá alterações, verique as branchs... pode ser que tenha uma nova versão da aplicação.
