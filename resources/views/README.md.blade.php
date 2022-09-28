# Bienvenido a Guia Dev
## ¡Bienvenido a mi primer Proyecto!

Me hace mucha ilusión que te pases por aquí para ver mi primer proyecto.

### Sobre mí

Después de introducirme en el mundo del desarrollo web de manera autodidacta con HTML, CSS, JS y PHP, lo tuve claro, ¡este tiene que ser mi profesión! Así que decidí empezar a formarme más. Por lo que me inscribí en un curso de certificado de profesionalidad. Un certificado de profesionalidad es un certificado oficial con el que se pueden convalidar asignaturas de un FP. El certificado que estoy realizando se llama DESARROLLO DE APLICACIONES CON TECNOLOGÍAS WEB (IFCD0210) de 510 horas de clase y después las prácticas en la empresa, 120 horas de prácticas en mi caso. Con este certificado puedo convalidar 4 módulos o asignaturas del segundo curso del FP Superior de Desarrollo de Aplicacions Web.

Terminé las clases antes del verano y las practicas estaban programadas para empezar en septiembre, por lo que disponía del verano antes de empezar las prácticas. Pregunté por las tecnologías que utilizaban en la empresa y me enteré que utilizaban Laravel. Así, durante unos meses estuve aprendiendo Laravel todo lo que pude. Y creo que aproveché bien el tiempo.

### ¿Qué es Guia Dev?

Es una página web creada para hacer apuntes de cualquier tema de programación de manera sencilla. Para ello dispone de un editor de texto WYSIWYG (What You See Is What You Get) y bloques de código con resaltador de sintáxis.

Básicamente es una página web donde publicar Posts. Los Posts pertenecen a un tema, y los temas tienen capítulos en los que se pueden clasificar los Posts. Es decir, Los temas tienen diferentes capítulos, y los capítulos contienen Posts. Aunque los capítulos no son necesarios y puede haber Posts sin que sean parte de ningún capítulo, pero si es obligatorio que los Posts sean parte de un tema.

#### Tecnologías

Es un proyecto **Laravel** y he utilizado **Tailwind**, **Jetstream** y **Livewire**. Además he utilizado otras herramientas como CkEditor 5, Prism y Sortable como iré detallando más adelante.

### Cómo funciona Guia Dev

#### Rutas

La primera opción a la hora de crear rutas en un proyecto basicamente de tipo CRUD, es normalmente utilizar **rutas resource**. Pero en este caso, varias de las acciones del CRUD se ejecutan mediante los controladores de los componentes Livewire. Por lo que he decidido no utilizar rutas resource. Por otro lado, he añadido **middlewares** de usuarios autenticados en algunas de las rutas y por supuesto nombres a cada ruta.

#### Login

El login de este proyecto es el que viene con Jetstream, pero con modificaciones:

- He cambiado el campo "name" por "username".
- He quitado el campo email. Para registrarse sólo se requiere un nombre de usuario (que tendrá que ser único) y contraseña (también modificado).
- He cambiado el número mínimo de caracteres de la contraseña. Por defecto viene con 8 y ahora son 4.

Este sistema de login incluye:

- Registrarse e iniciar sesión.
- Editar tus datos de usuario: nombre de usuario y contraseña en este caso.
- Activar el doble factor de autenticación.
- Administrar y cerrar sesión de tus sesiones activas en otros navegadores y dispositivos.
- Eliminar cuenta.

#### Navegación

En la navegación disponemos cinco elementos: Home (el logo), Mis Posts, Posts, Temas y Usuario/Login.

##### Home

Esta es la página donde nos encontramos ahora, y como ves es simplemente la descripción del proyecto.

##### Mis Posts

La página "Mis Posts" es un dashboard donde el usuario puede hacer un todo el CRUD de los Post. También tiene un buscador y tres filtros para encontrar el Post que está buscando. El buscador hace una búsqueda en los campos título y descripción del Post.

Esta página **es por completo un componente Livewire**. Para ello la ruta lo direcciona directamente al controlador del componente Livewire y no hace falta crear un controlador con un solo método y con la única función de redireccionar al controlador de Livewire.

La razón por la que he utilizado un componente Livewire en esta página es para que el buscador y los filtros actuen de manera reactiva, es decir que podemos filtrar y actualizar la tabla de Posts sin tener que recargar la página, lo que mejora notoriamente la experiencia del usuario.

Los bloques de código tienen el resaltado de sintáxis de **Prism**, que facilita mucho la lectura de código y, a mi parecer, mejora el Post estéticamente.

###### Formulario del Post

Desde esta la página "Mis Posts" podemos crear y editar nuestros Posts. Para crear y editar el Post se utiliza el mismo componente Livewire. Lo hice con componente para reutilizar el código ya que es básicamente el mismo formulario. Y lo hice con Livewire porque, por una parte el "select" para elegir el capítulo depende del "select" del tema, y quería que los cambios fuesen reactivos. Para escribir el contenido del Post he utilizado **CKEditor** para poder agregar formatos al texto, bloques de código, tablas, etc.

Un usuario que no es autor del Post, aún no teniendo un botón o enlace para editarlo, tiene muy facil escribir la url de la página para editar con el id de otro Post. Y para solucionarlo he creado un **Policy**. Este Policy responde con el código **403 (Forbidden)** si el usuario no es el autor del Post, pero en el caso de que el Post sea oculto, la respuesta es el código **404 (Not Found)**. Esta Policy también lo he utilizado en la ruta "post.show" para que no se puedan ver Posts ocultos, mostrando el código de error 404.

###### Validaciones

Las Validaciones del al registrar el usuario se determina en `App\Actions\Fortify\CreateNewUser.php` que he tenido que modificar para quitar el email y modificar el campo 'name' por 'username'. Y para actualizar el usuario lo mismo en el fichero `App\Actions\Fortify\UpdateUserProfileInformation.php`.

Los Temas ('subjects') se crean y se acualizan con componentes Livewire, por lo que las validaciones se sitúan en sus respectivos controladores agregando la propiedad protegida `$rules` para después ejecutar el método `validate`.

Los Post en cambio, se crean, editan y eliminan a través de su controlador, por lo que, en este caso, he creado un **form request** para sacar la validación del controlador.

##### Posts

En la página Posts tenemos un lista de todos los Posts públicos de la base de datos. Como en la página "Mis Posts", aquí también tenemos un buscador y filtros, pero los filtros no son los mismos que en "Mis Posts". En esta página los filtros son de autores y temas.

Tenemos también una paginación que muestra hasta 10 posts por página. La paginación también es reactiva, no se recarga la página al cambiar entre las páginas de la paginación. Esto se consigue simplemente utilizando la siguiente clase:


```php
use Livewire\WithPagination;
    
    class PostsIndex extends Component
    {
        use WithPagination;
```

###### ShowPost

Al hacer click en un Post, podemos ver el contenido completo del Post. También podemos ver (si hay código en el contenido) el resaltado del código, gracias a la combinación de **CKEditor + Prism**. Prism diferencia las palabras clave dependiendo del lenguaje y los resalta con colores.

Como elemento de seguridad, he denegado el acceso a los Posts que tienen el estado de oculto, devolviendo un error 404 (Not Found), como menciono anteriormente, para mostrar la menor información no deseada posible. Esto lo he hecho con la función **abort()** en el controlador del Post:

```php
class PostController extends Controller
    {
        public function show(Post $post)
        {
            if ($post->public == '0') {
                abort(404);
            }
            return view('posts.show', compact('post'));
        }
```

##### Temas

En la página de Temas podemos ver listados todos los temas de GuiaDev. Los usuarios no tienen acceso a crear, editar ni a eliminar los temas, sólo el administrador puede hacerlo, como se muestra en el siguiente gif.

![gif temas CRUD](temasCRUD.gif "Temas CRUD")

Si hacemos click en uno de los temas hacedemos a su contenido. Un tema puede tener (o puede no tener) uno o varios capítulos para separar los Post por las distintas temáticas. Al igual que los temas, los capítulos de estos sólo los podrá crear, editar y eliminar el administrador.

##### Añadir Funcionalidades

- Subir imágenes en ckEditor
- Añadir comentarios en los Posts

