# HTMX Demo

Live demo app for the HTMX internal presentation.

## Requirements

- [Docker](https://docs.docker.com/get-docker/) >= 24
- [Docker Compose](https://docs.docker.com/compose/) >= 2 (bundled with Docker Desktop)

## Setup

### 1. Clone the repo

```bash
git clone <repo-url>
cd aavn-htmx-demo
```

### 2. Create the app `.env` file

```bash
cp src-website/env src-website/.env
```

Open `src-website/.env` and add the following:

```dotenv
CI_ENVIRONMENT = development

app.baseURL = 'https://localhost:8023/'
app.indexPage = ''

database.default.hostname = database
database.default.database = aavnhtmxdemo
database.default.username = aavnhtmxdemo
database.default.password = aavnhtmxdemo
database.default.DBDriver = MySQLi
database.default.port     = 3306
database.default.charset  = utf8mb4
database.default.DBCollat = utf8mb4_unicode_ci
```

### 3. Start Docker

```bash
cd docker
docker compose up -d --build
```

> The first build takes a few minutes — it pulls images and installs PHP extensions.

Verify containers are running:

```bash
docker compose ps
```

### 4. Run migrations

```bash
docker compose exec website php spark migrate
```

### 5. Seed the database

```bash
docker compose exec website php spark db:seed MainSeeder
```

### 6. Open the app

Go to **https://localhost:8023** in your browser.

> The browser may warn about a self-signed SSL certificate — click **Advanced → Proceed** to continue.

---

## Demos

| # | Demo | URL |
|---|------|-----|
| 1 | Live Search | `/live-search` |
| 2 | Dynamic Form (3-layer cascade) | `/dynamic-form` |
| 3 | CRUD Todo | `/todo` |
| 4 | Infinite Scroll | `/infinite-scroll` |
| 5 | Form Validation | `/form-validation` |
| 6 | hx-boost | `/hx-boost` |

---

## Utilities

### phpMyAdmin

Browse the database at **http://localhost:53236**

- Host: `database`
- User: `aavnhtmxdemo`
- Password: `aavnhtmxdemo`

### Stream app logs

```bash
cd docker
docker compose logs -f website
```

### Stop containers

```bash
docker compose down
```

Stop and delete all database data:

```bash
docker compose down -v
```

### Reset to a clean state

```bash
docker compose exec website php spark migrate:rollback
docker compose exec website php spark migrate
docker compose exec website php spark db:seed MainSeeder
```
