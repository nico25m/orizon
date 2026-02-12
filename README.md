#  Orizon (Laravel + MySQL)

##  Descrizione del progetto
Questa applicazione espone un set di **API RESTful** sviluppate con **Laravel** per la gestione di:

- **Paesi** (caratteristica: `nome`)
- **Viaggi** (caratteristiche: `posti_disponibili`, `paesi` associati)

Le API permettono:

✔ Inserimento, modifica e cancellazione di un paese  
✔ Inserimento, modifica e cancellazione di un viaggio  
✔ Visualizzazione di tutti i viaggi  
✔ Filtraggio viaggi per paese e posti disponibili  

Il database utilizzato è **MySQL**.

---

##  Requisiti
- PHP 
- Composer
- Laravel
- MySQL

---

##  Installazione del progetto

```bash
composer create-project laravel/laravel nome-progetto
cd nome-progetto
```

Configurare `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=viaggi_db
DB_USERNAME=root
DB_PASSWORD=
```

---

##  Migrazioni database

Creazione migrations:

```bash
php artisan make:migration create_paesi_table
php artisan make:migration create_viaggi_table
php artisan make:migration create_paese_viaggio_table
```

Eseguire:

```bash
php artisan migrate
```

---

##  Struttura Database

### **Tabella paesi**
| Campo | Tipo |
|------|------|
| id | BIGINT |
| nome | VARCHAR (UNIQUE) |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

### **Tabella viaggi**
| Campo | Tipo |
|------|------|
| id | BIGINT |
| posti_disponibili | INT |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

### **Tabella paese_viaggio**
| Campo |
|------|
| paese_id |
| viaggio_id |

Relazione **many-to-many** tra viaggi e paesi.

---

##  Modelli

Creazione modelli:

```bash
php artisan make:model Paese
php artisan make:model Viaggio
```

Relazioni:
- `Paese -> belongsToMany(Viaggio)`
- `Viaggio -> belongsToMany(Paese)`

---

##  Controller

Creazione controller API:

```bash
php artisan make:controller PaeseController 
php artisan make:controller ViaggioController 
```

---

##  Rotte API (`routes/api.php`)

### **Paesi**
| Metodo | Endpoint | Descrizione |
|--------|----------|------------|
| GET | /api/paesi | Lista paesi |
| POST | /api/paesi | Crea paese |
| PUT | /api/paesi/{id} | Aggiorna paese |
| DELETE | /api/paesi/{id} | Elimina paese |

### **Viaggi**
| Metodo | Endpoint | Descrizione |
|--------|----------|------------|
| GET | /api/viaggi | Lista viaggi |
| POST | /api/viaggi | Crea viaggio |
| PUT | /api/viaggi/{id} | Aggiorna viaggio |
| DELETE | /api/viaggi/{id} | Elimina viaggio |

---

##  Filtri Viaggi

### Filtrare per paese
```
GET /api/viaggi?paese=Italia
```

### Filtrare per posti disponibili
```
GET /api/viaggi?posti_disponibili=10
```

### Filtrare sia per paese sia per posti disponibili
```
GET /api/viaggi?paese=Italia&posti_disponibili=10
```

---

##  Esempi Request

###  Creazione Paese
```http
POST /api/paesi
Content-Type: application/json

{
  "nome": "Italia"
}
```

###  Creazione Viaggio
```http
POST /api/viaggi
Content-Type: application/json

{
  "posti_disponibili": 15,
  "paesi": [1, 3]
}
```

---

## 🧪 Avvio server

```bash
php artisan serve
```

API disponibili su:
```
http://127.0.0.1:8000/api/
```

---

## 📄 migrations.sql
Il file `migrations.sql` permette di ricostruire manualmente la struttura del database MySQL senza Laravel.

