# **Cable UNET**

Proyecto asignado al tercer corte para Programación II, materia del pénsum de ingeniería informática de la [Universidad Nacional Experimental del Táchira](http://www.unet.edu.ve/).


El proyecto tiene como objetivo el desarrollo de un sistema web para la administración de una compañía ficticia de televisión por cable, telefonía e internet.

Se desarrolla el proyecto con:
* [Laravel 7.0](https://laravel.com/docs/7.x/).
* [XAMPP](https://www.apachefriends.org/index.html).

## **Configuración**

Se configuró un virtual host para el servidor local apache y un mapeo de dirección IP a host name, de esta forma se accede al sitio local mediante `{http://cunet.meme}` en lugar de `localhost/{PROJECT_NAME}/public`, evitando problemas de routing que puedan surgir al momento de acceder al sitio. 

Configuración de virtual host:

Archivo `httpd-vhosts.conf` en `{XAMPP_DIR}\apache\conf\extra\`
```
<VirtualHost *:80>
    DocumentRoot "{XAMPP_DIR}/htdocs/proyecto3/public/"
    ServerName cunet.meme
</VirtualHost>
```

Configuración de IP mapping:


Archivo `hosts` en `C:\Windows\System32\drivers\etc\`

`127.0.0.1 cunet.meme`
