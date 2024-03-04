# SaveCom

![logo](./public/assets/README/logo.PNG)


A SaveCom é uma agenda online com uma interface(full responsive) super simples para que você possa salvar e gerenciar os seus compromissos armazenados na nuvem.

## 📋 Funcionalidades do Sistema

- [x] Cadastrar Compromissos (ambiente logado).
- [x] Login do Usuário.
- [x] Alterar   Compromissos (ambiente logado).
- [x] Deletar   Compromissos (ambiente logado).
- [x] Pesquisar Compromissos (ambiente logado).

## 👨‍🏫 Demostração do Sistema
![animação](./public/assets/README/Anima%C3%A7%C3%A3o.gif)

- [x] Validações Front-end (JavaScript).
- [x] Validações Back-end (class request laravel).
- [x] Full Responsive.
- [x] Mobile First.



## 🔨 Tecnologias Utilizadas

 1. Laravel
 2. MysQl
 2. JavaScript
 3. Css3
 4. Html

## 👨‍💻 Como executar o projeto com Docker.

### Passo a passo
Clone Repositório
```sh
git clone git@github.com:FelipeDevFull/savecom.git
```
```sh
cd savecom
```
Crie o Arquivo .env
```sh
cp .env.example .env
```
Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=SaveCom
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto
```sh
docker compose up -d
```
Acesse o container container-php
```sh
docker compose exec container-php bash
```
Instale as dependências do projeto
```sh
composer install
```
Gere a key do projeto Laravel
```sh
php artisan key:generate
```
Gerar tabelas
```sh
php artisan migrate
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)

<br>

## 👨‍💻 Como executar o projeto no laragon 

### Passo a passo
Clone o Repositório
```sh
git clone git@github.com:FelipeDevFull/savecom.git
```
```sh
cd savecom
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=SaveCom
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Gerar tabelas
```sh
php artisan migrate
```
Acesse o projeto
[http://localhost/savecom/public](http://localhost/savecom/public)
