# systemMicres

Sistema operacional utilizado é o Debian

* Instalar PHP
sudo apt-get install php

* Instalar apache2
sudo apt-get install apache2

* Instalar PHPAdmim

https://linuxize.com/post/how-to-install-and-secure-phpmyadmin-with-apache-on-debian-9/

sudo apt-get install mysql-server

sudo apt update && sudo apt upgrade

sudo apt install phpmyadmin

sudo mysql

CREATE USER 'padmin'@'localhost' IDENTIFIED BY 'super-strong-password';
GRANT ALL PRIVILEGES ON *.* TO 'padmin'@'localhost' WITH GRANT OPTION;

sudo systemctl restart apache2
