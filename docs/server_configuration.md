## APACHE SERVER

To configure Apache for CakePHP 3, you will need to perform the following steps:

1. Install Apache on your server. You can install Apache using the package manager for your operating system, or you can download and compile the source code from the Apache HTTP Server Project website (**[https://httpd.apache.org/](https://httpd.apache.org/)**).
2. Enable the Apache mod_rewrite module. This module is used to rewrite URL requests to match the routes defined in the CakePHP application. To enable the mod_rewrite module, you will need to uncomment the following line in the **`httpd.conf`** file:

```

LoadModule rewrite_module modules/mod_rewrite.so

```

1. Create a virtual host for your CakePHP application. Virtual hosts allow you to host multiple websites on a single server by mapping a domain name to a specific directory on the server. To create a virtual host for your CakePHP application, you will need to add the following lines to the **`httpd.conf`** file:

```

<VirtualHost *:80>
  ServerName example.com
  DocumentRoot /path/to/cakephp/app/webroot
  <Directory /path/to/cakephp/app/webroot>
    AllowOverride All
  </Directory>
</VirtualHost>

```

Replace **`example.com`** with the domain name of your CakePHP application, and replace **`/path/to/cakephp/app/webroot`** with the path to the **`webroot`** directory of your CakePHP application.

1. Restart the Apache server. You can restart Apache by running the following command:

```

sudo service apache2 restart

```
### NGINX
To configure Nginx for CakePHP 3, you will need to perform the following steps:

1. Install Nginx on your server. You can install Nginx using the package manager for your operating system, or you can download and compile the source code from the Nginx website (**[https://nginx.org/](https://nginx.org/)**).
2. Create a server block for your CakePHP application. Server blocks are similar to virtual hosts in Apache, and allow you to host multiple websites on a single server by mapping a domain name to a specific directory on the server. To create a server block for your CakePHP application, you will need to add the following lines to the **`nginx.conf`** file:

```

server {
    listen   80;
    listen   [::]:80;
    server_name www.example.com;
    return 301 http://example.com$request_uri;
}

server {
    listen   80;
    listen   [::]:80;
    server_name example.com;

    root   /var/www/example.com/public/webroot;
    index  index.php;

    access_log /var/www/example.com/log/access.log;
    error_log /var/www/example.com/log/error.log;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        try_files $uri =404;
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_intercept_errors on;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

```

Replace **`example.com`** with the domain name of your CakePHP application, and replace **`/path/to/cakephp/app/webroot`** with the path to the **`webroot`** directory of your CakePHP application.

1. Restart the Nginx server. You can restart Nginx by running the following command:

```

sudo service nginx restart

```