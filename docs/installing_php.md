Different PHP Version
=====================

Installation:
-------------

```
$ sudo apt-get update -y
$ sudo apt-get install nginx-y
$ sudo service nginx start
$ sudo apt-get install software-properties-common -y
```


MYSQL installation
-------------------

1. Update the package list and install the MySQL APT repository signing key:

```

sudo apt update
wget https://repo.mysql.com//mysql-apt-config_0.8.15-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.15-1_all.deb

```

1. Install the MySQL server:

```

sudo apt-get install mysql-server

```

1. Secure the MySQL installation:

```

sudo mysql_secure_installation

```

This will prompt you to set a root password and answer a few other security questions.

1. Test the MySQL installation:

```

mysql -u root -p

```

Enter the root password when prompted, and you should be logged in to the MySQL prompt.




PHP:
----

```
$ sudo add-apt-repository ppa:ondrej/php
$ sudo apt-get update -y
$ sudo apt-get install php7.4 php7.4-fpm zip unzip -y
$ sudo service php7.4-fpm start
```

Nginx:
------

```
$ sudo mkdir /var/www/html/php74
```



Paste:
------

```
<?php phpinfo(); ?>

```

Copy and set Correct Permissions:
---------------------------------

```
$ sudo cp /var/www/html/php74/index.php
$ sudo chown -R www-data:www-data /var/www/html/php74
```


Restart Services Guide:
-----------------------

```
$ sudo service php7.4-fpm restart
$ sudo service nginx restart
$ sudo service mysql restart
```
