#### Pasos a seguir para descargar desde el repositorio ies-romerovargas/SimpleBlog

Clonamos desde el repositorio. Son directorios de sistema, por lo que usaremos `sudo`

`sudo git clone https://github.com/ies-romerovargas/SimpleBlog/ /var/www/html/PROYECTO` 

Nos movemos al directorio creado y creamos un directorio nuevo (el repositorio no contiene fichero de usuarios por motivos de seguridad):

`cd /var/www/html/PROYECTO/data`

`sudo chmod -R 777 data/`

`sudo chmod -R 777 backups/`

Crear un VirtualHost para poder acceder al proyecto de manera diferenciada

Acceder a la url:

[http://MIPROYECTO.com/admin/](http://MIPROYECTO.com/admin/)

Datos del usuario por defecto:

root
1234
