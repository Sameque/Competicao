Inicio


1. Baixar projeto:
  -Projeto disponivel no GitHub (https://github.com/Sameque/Competicao.git)
  -Comando: git clone https://github.com/Sameque/Competicao.git

2.Criar banco de dados:
  -Criar um banco que sera usado no projeto(MySql)
  -configurara no projeto a conexão com o banco (...\Competicao\config\database.php)
    -parametros a serem alterados da configração "connections":
        'host'      => env('DB_HOST', 'servidor_de_banco'),
	'database'  => env('DB_DATABASE', 'nome_do_banco')
	'username'  => env('DB_USERNAME', 'usuario_do_banco'),
        'password'  => env('DB_PASSWORD', 'senha_do_banco'),

3.Configurara chave de criptografia:
   -configurara no projeto a chave de criptografia (...\Competicao\config\app.php)
   -Parametros a serem alterados da configração "key":
	'key' => env('APP_KEY', 'digitar_uma_chave_de_32_caracteres')
4. Instalar projeto:
  -É preciso instalar as dependencias do projeto atraves do Composer.
	-Acessar a pasta do projeto (Competicao) atraves do prompt e rodar o camando:
	   composer instal

5.Rodar comando de criação de tabelas:
  -Comando: 
	php artisan migrate:install
	php artisan migrate
6.Rodar comando para povoar o banco com exemplos para testes:
	php artisan db:seed

7.acessar projeto:
  -Acessar o projeto atraves do brause: