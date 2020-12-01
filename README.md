## Lubricentro
Sitio WEB creado para la materia Web 2 de TUDAI

## Resumen
El sitio se basa en una interfaz de negocio la cual permite realizar ABM de productos, comentarios para los productos, marcas y usuarios

## Rol del cliente
El sistema le permite al cliente realizar las sigientes operaciones:

### En cualquier sitio
* Login
* Logout

### /home
* Busqueda avanzada de productos

### /catalogo
* Vista de productos paginados
* Descarga de PDF de la lista de productos completa

#### .../showmore/...
* Comentar productos
* Calificar productos
* Borrar comentarios

### /administrar
* Agregar productos
* Agregar marcas
* Aumentar precio de productos de determinada marca
* Asignar o remover permisos de administrador a usuarios
* Borrar usuarios
* Borrar productos
* Borrar marcas

#### .../editar/...
* Editar productos
* Editar marcas

## Composicion </>

### Patron MVC
Se utilizo el patron de diseño Model View Controller para facilitar la separacion de datos de su representacion visual, facilitar el manejo de errores, permitir que el sistema sea mas escalable, agregar multiples representaciones de datos, entre otros.

### Volcado de datos
Todos los datos del sistema se almacenan en una Base de Datos (apache localhost) la cual puede ser gestionada por usuarios logueados (alcance limitado) y usuarios administradores (alcance total)

### Manejo de datos

#### Model
Se encarga de realizar la conexion y las consultas con la base de datos `SELECT | INSERT | DELETE | UPDATE`

#### View
Se encarga de hacerle llegar al cliente el HTML final, este es creado por los Template Engine Smarty y Vue los cuales procesan los datos recibidos por el controlador para definir el contenido a mostrar

#### Controller
Se encarga de procesar las solicitudes del cliente y define el comportamiento para cada una, se comunica con el modelo para realizar el ABM de los datos en la DB y solicitarselos, y con la vista para enviarle los datos correspondientes

#### Api Rest
Mediante los llamados a sus endpoints se conecta con la DB para realizar el ABM de comentarios, estos datos son enviados y recibidos en formato JSON para facilitar su uso en diferentes plataformas

## Ejecucion
1 - Instalar Xampp

2 - Clonar el respositorio en **c:/xampp/htdocs/**

3 - Iniciar Apache y MySql mediante el panel de control de Xampp

4 - Crear la DB "lubricentro" desde la URL *localhost/phpmyadmin* e importar el archivo lubricentro.sql

5 - En su navegador esciba la URL *localhost/**lubricentro**/home*

**lubricentro** es un ejemplo, el nombre puede variar dependiendo del que tenga en la carpeta htdocs (por defecto es el nombre del repo)
