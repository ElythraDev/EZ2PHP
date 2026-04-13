# 🚀 EZ2PHP
> **A SUPER simple PHP Framework.**
> The lightweight MVC solution for "lazy" developers who are tired of copy-pasting the same boilerplate.
[中文文档](https://elythradev.github.io/posts/EZ2PHPdoc.html)

---

## 📖 Introduction
**EZ2PHP** is exactly what it sounds like. It’s designed for small-to-medium projects where you want the clean structure of MVC without the overhead and complexity of massive modern frameworks. 

### ✨ Key Features
* **Ultra-Lightweight**: Only includes the essentials—directory structure, view rendering, and database control.
* **High Extensibility**: Built with vanilla PHP logic, making it easy to hack and customize to your needs.
* **Zero-Fuss Deployment**: Get up and running with a simple Nginx rewrite rule.
* **Clean Syntax**: Includes a dead-simple template engine for variable injection and loops.

---

## 🛠️ Getting Started

### 1. Installation
You can get the source code in two ways:

* **Option A**: Clone via Git (Recommended)
    ```bash
    git clone https://github.com/ElythraDev/EZ2PHP.git
    ```
* **Option B**: Download the source ZIP directly and extract it to your web directory.

### 2. Environment Configuration
In `config.php`, you can define your environment type and database credentials:

```php
// Set environment: 'development' or 'production'
if (!defined('ENVIRONMENT')) define('ENVIRONMENT', 'development'); 
```

### 3. Server Deployment (Nginx)
To handle routing correctly, you need to redirect all requests to `public/index.php`. Use the following configuration:

```nginx
server {
    listen 80;
    root "/your/site/root/public";
    index index.php;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # Prevent direct access to core directories
    location ~ ^/(lib|pages|templates) {
        deny all;
    }
}
```

---

## 📂 Directory Structure
EZ2PHP keeps things organized and intuitive:

| Dir / File | Description |
| :--- | :--- |
| `/lib` | Core library files (View engine, helpers, etc.) |
| `/pages` | **Controllers**: Handles specific page logic |
| `/public` | Entry point & assets (JS/CSS/Images) |
| `/templates` | **Views**: HTML template files |
| `router.php` | Routing configuration |
| `config.php` | Global configuration & PDO init |

> 💡 **Tip**: The `/pages` directory is missing a `404.php` by default. You can quickly create one by following the logic in `sample.php`.

---

## 🚦 Routing
Register your routes in `router.php`. Currently, the framework focuses on GET requests.

### Static Routes
```php
$router->get('/', function() {
    require __DIR__ . '/pages/sample.php';
});
```

### Dynamic Parameter Routes
```php
// Example: Matches /article/arc101.html
$router->get('/article/arc{id}.html', function($params) {
    $id = (int)$params['id']; // Retrieve parameters from the path
    require __DIR__ . '/pages/articleDisplay.php';
});
```

---

## 🎮 Controllers
Using `/pages/sample.php` as an example, here is a typical controller implementation:

```php
<?php
require __DIR__ . '/../config.php';   // Database connection
require __DIR__ . '/../lib/view.php'; // View rendering engine

// Process logic and render the template
$content = View::render(__DIR__ . '/../templates/sample.php', [
    'title' => 'EZ2PHP IS READY!',
]);

echo $content;
?>
```

---

## 🎨 Template Engine
EZ2PHP supports basic variable substitution and loops.

### Variable Output
Use `{variable_name}` in your template files:
```html
<h1>{title}</h1>
<p>Hello World! EZ2PHP is running.</p>
```

### Loops
The `foreach` syntax is highly similar to native PHP:
```html
{foreach items as item}
    <div class="card">
        <h3>{item.title}</h3>
        <p>{item.content}</p>
    </div>
{/foreach}
```

---

## 🗄️ Database Operations
We recommend using PDO prepared statements for maximum security:

```php
$sql = 'SELECT * FROM article ORDER BY id DESC LIMIT ?, ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$offset, $itemsPerPage]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

## 🤝 Contribution & Feedback
Code with love. If you encounter any issues or have ideas for improvements, feel free to open a [GitHub Issue](https://github.com/ElythraDev/EZ2PHP/issues).

---
**Maintained by [Elythra](https://github.com/ElythraDev)**