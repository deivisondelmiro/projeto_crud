# Projeto CRUD - Laravel

Este é um projeto Laravel desenvolvido para fins educacionais, implementando um sistema CRUD básico. O repositório está disponível em [https://github.com/deivisondelmiro/projeto_crud](https://github.com/deivisondelmiro/projeto_crud).

O projeto utiliza SQLite como banco de dados.

#### No Linux (Ubuntu/Debian):
```bash
# Atualizar pacotes
sudo apt update

# Instalar PHP e extensões necessárias
sudo apt install php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath php-sqlite3

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalar Node.js e npm
curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt-get install -y nodejs

# Instalar Git
sudo apt install git
```

#### No macOS:
- Use Homebrew: `brew install php composer node git`

## Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/deivisondelmiro/projeto_crud.git
   cd projeto_crud
   ```

2. **Instale as dependências do PHP:**
   ```bash
   composer install
   ```

3. **Instale as dependências do Node.js:**
   ```bash
   npm install
   ```

4. **Configure o ambiente:**
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - O arquivo `.env` já está configurado para usar SQLite. Verifique se a linha `DB_CONNECTION=sqlite` está presente.

5. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

6. **Configure o banco de dados:**
   - O SQLite não requer configuração adicional. O arquivo do banco será criado automaticamente na pasta `database/`.
   - Execute as migrações:
     ```bash
     php artisan migrate
     ```
   - Execute os seeders:
     ```bash
     php artisan db:seed
     ```

7. **Compile os assets:**
   ```bash
   npm run build
   ```
   Ou para desenvolvimento com watch:
   ```bash
   npm run dev
   ```

## Executando o Projeto

Para executar o projeto em modo de desenvolvimento:

1. **Inicie o servidor Laravel:**
   ```bash
   php artisan serve
   ```
   O aplicativo estará disponível em `http://localhost:8000`.

## Licença

Este projeto está sob a licença MIT.
