# Creación de un sitio web con PHP y Javascript
## UNIR Practica - Actividad 3
### Computación Cliente y Servidor (MEXINGWEB)

### Demo: [pueblos-magicos-reviews.000webhostapp.com](https://pueblos-magicos-reviews.000webhostapp.com/)

#### Scripts para DB:
```
DROP DATABASE IF EXISTS pueblos_magicos;

CREATE DATABASE pueblos_magicos;

create table reviews(
     id int auto_increment,
     nombre varchar(255) not null,
     pueblo varchar(255) not null,
     comentarios text,
     primary key(id)
);

SHOW TABLES;

insert into reviews(nombre, pueblo, comentarios)
values
    ('Juan','San Miguel el Alto','Es el mejor lugar para vacaciones.'),
    ('Carlos','Atlisco','Un pueblo muy tranquilo.'),
    ('Luis','Dolores Hidalgo','Mucha seguridad pero muy lleno.');

SELECT * FROM reviews;

DROP TABLE reviews;

```


#### Capturas de Pantalla:

![1 Inicio.png](src%2Frecursos%2Fdocumentos%2F1%20Inicio.png)

![2 Forma de registro.png](src%2Frecursos%2Fdocumentos%2F2%20Forma%20de%20registro.png)

![3 Lista de Comentarios actualizados.png](src%2Frecursos%2Fdocumentos%2F3%20Lista%20de%20Comentarios%20actualizados.png)

![4 LLamada AJAX.png](src%2Frecursos%2Fdocumentos%2F4%20LLamada%20AJAX.png)

![5 Tabla en BDD.png](src%2Frecursos%2Fdocumentos%2F5%20Tabla%20en%20BDD.png)