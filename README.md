Este projeto trata-se de uma API para cadastro de clientes e seus respectivos endereços.

Foi utilizado PHP 8.1.0, Laravel 9 e MySQL 5.7.22.

Algumas características do projeto:
    - Ao cadastrar/editar um endereço, a API automaticamente conecta-se com o Google e cadastra também a latitude e longitude do local. É necessário inserir a key da API
    do Google no arquivo .env;

    - Possui uma documentação completa feita com o Postman, podendo ser encontrada neste diretório com o nome de "Teamsoft.postman_collection.json". Basta importar este arquivo no Postman e analisar as características de cada endpoint;

    - Se desejar, é possível utilizar o docker, através do arquivo docker-compose.yml; 

    - Ao excluir um cliente, automaticamente é excluído também seu(s) endereço(s);

    - Alguns testes simples foram escritos, para rodar, basta executar: 
        vendor/bin/phpunit

Instruções de como criar o container: 

    1. Faça uma cópia do env.example e renomeie para apenas .env
    2. No terminal, execute "docker-compose up -d --build"
    3. Entre no container com "docker-compose exec laravel-app bash"
    4. cd /usr/share/nginx
    5. composer install
    6. php artisan key:generate
    7. php artisan migrate
    
Agora a API já está pronta para uso. A documentação no Postman pode auxiliar com
as rotas e parâmetros.

Caso ocorra um erro 500, dentro do container em /usr/share/nginx, execute: 
    ln -s public html

Pois assim criará um link entre a pasta public e a html.