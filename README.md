

APLICATIVO DEL ÁREA DE PRACTICAS PRE-PROFESIONALES

-Arquitectura: MVC -Framework: CodeIgniter

Antes de correr el programa:

1.El proyecto está configurado en el puerto 80, si desea correrlo en otro puerto, cambie $config['base_url'] = 'http://localhost:[puerto_deseado]/pracprepro/' en el archivo aplication/config/config.php

2.Crea una tabla db_practicas e importa el archivo db_practicas.sql

Sobre el proyecto:

La primera página a mostrarse es el login, en la base de datos DB_PRACTICAS hay una tabla CUENTA con los datos correctos. Hay dos opciones:

1.Si se loguea con el nivel de alumno, le dirige a la lista de anuncios disponibles para realizar prácticas pre- profesionales, en la parte superior, se puede acceder a la página principal que solo es informativa sobre los requisitos para poder ralizar las práctias. En la lista de anuncios al hacer click en VER, se puede visualizar los detalles de cada anuncio. Se puede filtrar la lista según el título al hacer click en BUSCAR, al hacer click en MOSTRAR TODO, se vuelve a mostrar la lista completa. La lista está paginada. En el menú vertical se puede ver la lista o salir, al salir te redirige al login.

2.Si se loguea con el nivel administrador, le dirige al panel de administración de todas las entidades que intervienen en el área.

El menú vertical permite cambiar rápidamente de entidad y al presionar salir, te redirige al login.

En el modo administrador hay tres subgrupos en cuanto a las funcionalidades:

2.1 El primero es de Anuncios, Instituciones, Asesores y Revisores. Cuentan con dos pestañas abajo del título, la opción CONSULTA viene por defecto y contiene un panel con todos los elementos de la tabla, también hay botones para ELIMINAR y ACTUALIZAR. Al eliminar se actualiza automáticamente. Al actualizar se pueden cambiar los datos. Todas las entidades tienen la opción de BUSCAR Y MOSTRAR TODO. La otra perstaña es la de INSERTAR en la que se pueden registrar nuevas instituciones, anuncios, asesores o revisores.

2.2 El segundo es el subgrupo referido a documentos. Incluye el Libro de Actas, los Informes de Avance, Los informes Finales y los Planes de Práctica. Al igual que el subgrupo anterior, hay pestañas con las opciones de CONSULTA, REGISTRO y DOCUMENTO. En la opción consulta se puede ELIMNAR Y ACTUALIZAR, al actualizar se puede cambiar cualquier campo menos el código para evitar datos que causen conflicto. En la opción REGISTRO se puede insertar nuevos elementos, los campos que son FK contienen dropbox para evitar insertar datos que no existen en otras entidades. En la opción DOCUMENTO, se pueden subir solo documentos de tipo PDF para los campos que lo requieran, cada entidad tiene su porpia carpeta en el servidor porque cada entidad requiere de documentos diferentes. Antes de subir se debe elegir la PK del elemento, la base de datos guarda la dirección de cada elemento subido en un campo. Se pueden reemplazar los archivos las veces necesarias.

2.3 El tercer subgrupo es el de Prácticas, y es la tabla central. Casi todos sus campos son FK ya que depende de casi todas las entidades de los otros subgrupos. Tiene las pestañas de CONSULTA E INSERTAR. En consultar se puede ELIMINAR Y ACTUALIZAR y tiene la opción de BUSCAR. En la pestaña INSERTAR se puede registrar nuevas prácticas, los dropvox se usan para evitar datos que no existen en otras tablas.

Atentamente, Leonardo Medina Corillocla.
