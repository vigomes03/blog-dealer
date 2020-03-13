# PDS02-GEDISA-SIA #

# README #

Informações de instalação e configuração da aplicação em servidores com base em apache, assim também como correções para erros comuns.

### Requisitos do sistema ###

* PHP >= 7.1
* PHP-cli
* PHP-common
* PHP-curl
* PHP-dba
* PHP-dev
* PHP-imap
* PHP-json
* PHP-mbstring
* PHP-mysql
* PHP-readline
* PHP-soap
* PHP-xml
* PHP-zip
* Apache

### Instalação ###

Exemplo de instalacao em sistemas baseado em linux:ubuntu.

1. Adicionar o repositório com os pacotes mais atuais do PHP:

~~~~
    sudo add-apt-repository ppa:ondrej/php
~~~~

1. Refresh das informações de repositórios:

~~~~
    sudo apt-get update
    sudo apt-get upgrade
~~~~

1. Instalar pacotes obrigatórios (caso desejar podem ser instalados pacotes extras):

~~~~
    sudo apt-get install php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-dba php7.2-dev  php7.2-imap php7.2-json php7.2-mbstring php7.2-mysql php7.2-readline  php7.2-soap  php7.2-xml php7.2-zip apache2
~~~~

1. Instalar o Composer:

~~~~
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
~~~~

1. Adicionar ao PATH e remover instalador:

~~~~
    cp /home/victor/composer.phar /usr/local/bin/composer
    php -r "unlink('composer-setup.php');"
~~~~

1. Instalar o Laravel e adicionar ao PATH:

~~~~
    composer global require "laravel/installer"
    ln -s /root/.composer/vendor/bin/laravel /usr/local/bin/laravel
~~~~

### Configuração ###

Para a configuração do projeto na versão mais atualizada do sistema.

2. Clonar o projeto do git da aplicações:

~~~~
    git pull https://github.com/vigomes03/blog-dealer.git
    cd blog-dealer
~~~~

2. Instalar dependências do projeto pelo composer:

~~~~
    composer install
~~~~

2. Criar novas chaves para o laravel:

~~~~
    php artisan make:auth
~~~~


### Atenção ###
Comando Libera copiar arquivos e pastas ocultas no ubunto

~~~~
    shopt -s dotglob
~~~~


### Instalação Banco de dados ###
3. Para a instalação do banco de dados basta rodar o seguinte comando : 

~~~~
    sudo apt-get install mysql-server
~~~~

* Durante a instalação será configurado em usuário padrão (root), coloque uma senha segura.

### Configuração Banco de dados ###
4. Criar um database: 

~~~~
	CREATE DATABASE 'laravel_base';
~~~~

4. Criar um usuário para a aplicação: 

~~~~
	CREATE USER 'novousuario'@'localhost' IDENTIFIED BY 'password';
~~~~

4. Ajustar permissões do usuário da aplicação: 

~~~~
	GRANT ALL PRIVILEGES ON *laravel_base* TO 'novousuario'@'localhost';
	FLUSH PRIVILEGES;
~~~~

### Configuração Aplicação ###

5. Arquivo de configuraçoes

~~~~
    nano .env
~~~~

5. Se o arquivo de configuraçoes estiver faltando copiar 
~~~~
    cp .env.exemple .env
~~~~

* Adicionar dados que forem necessários