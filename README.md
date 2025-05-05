# Laravel Notes API

Uma API simples de anotações construída em Laravel.

## 🛠 Funcionalidades

- CRUD de anotações (Notas)
- Validação simples de campos
- Documentação Swagger Integrada [TODO]
- Testes automatizados com PHPUnit

## 🚀 Requisitos
- PHP >= 8.2
- Composer
- Laravel >= 11
- Banco de Dados SQLite, MySQL ou PostgreSQL

## ⚙️ Instalação

```bash
git clone https://github.com/gustavoalvesdev/laravel-notes-api.git
cd laravel-notes-api

composer install

cp .env.example .env 
cp .env.testing.example .env.testing

# Configure seu banco no .env, e seu banco de testes no .env.testiong, então execute
php artisan key:generate
php artisan key:generate --env=testing

php artisan migrate

# Para o ambiente de testes
php artisan migrate --env=testing

# Rodar os seeders para testar a API
php artisan db:seed

# Para o ambiente de testes
php artisan db:seed --env=testing
```

## 🔍 Documentação Swagger

Este projeto utiliza o [L5 Swagger](https://github.com/DarkaOnline/L5-Swagger) para documentação da API.

Para gerar a documentação, execute:

```bash
php artisan l5-swagger-generate
```

Depois, acesse em:

```
http://localhost:8000/api/documentation
```

## 🧪 Testes

Este projeto possui testes de API com PHPUnit e Laravel Test Case

Execute os testes com:

```bash
php artisan test --env=testing
```

## 📂 Estrutura da API

| Método | Endpoint        | Ação               |
|--------|-----------------|--------------------|
| GET    | /api/notes      | Listar notas       |
| POST   | /api/notes      | Criar nota         |
| GET    | /api/notes/{id} | Ver nota específica|
| PUT    | /api/notes/{id} | Atualizar nota     |
| DELETE | /api/notes/{id} | Deletar nota       |

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).