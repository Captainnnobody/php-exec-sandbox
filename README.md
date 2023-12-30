# PHP Exec Sandbox

PHP Exec Sandbox is a web-based tool for securely executing and testing PHP code snippets. It provides a controlled environment to run PHP scripts and view their output.

## Features

- Execute PHP code securely.
- View the output of executed code.
- Set a timeout for code execution.

## Installation

Follow these steps to set up PHP Exec Sandbox on your Linux machine.

### Prerequisites

- PHP (>= 7.2)
- Web server (e.g., Apache or Nginx)
- Git

### Clone the Repository

```bash
git clone https://github.com/your-username/php-exec-sandbox.git
cd php-exec-sandbox
```

### Configure Web Server
## Apache

Make sure you have Apache installed.
```
sudo apt-get update
sudo apt-get install apache2
```

### Create a virtual host configuration file:
```
sudo nano /etc/apache2/sites-available/php-exec-sandbox.conf
```

### Add the following configuration:
```
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /path/to/php-exec-sandbox

    <Directory /path/to/php-exec-sandbox>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

### Enable the virtual host:
```
sudo a2ensite php-exec-sandbox.conf
sudo systemctl restart apache2
```

## Nginx

Make sure you have Nginx installed.
```
sudo apt-get update
sudo apt-get install nginx
```

### Create a server block configuration file:
```
sudo nano /etc/nginx/sites-available/php-exec-sandbox
```

### Add the following configuration:
```
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/php-exec-sandbox;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```
### Create a symbolic link:
```
sudo ln -s /etc/nginx/sites-available/php-exec-sandbox /etc/nginx/sites-enabled/
sudo systemctl restart nginx
```
### Set Up Permissions
Make sure the web server has the necessary permissions:
```
sudo chown -R www-data:www-data /path/to/php-exec-sandbox
sudo chmod -R 755 /path/to/php-exec-sandbox
```

### Access the Application
Open your web browser and navigate to http://your-domain.com.
