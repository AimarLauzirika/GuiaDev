<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10">
                
                <h1 class="text-center text-3xl text-slate-800 font-extrabold mt-10">Bienvenido a Guia Dev</h1>
                <h2 class="text-center text-2xl text-gray-700 font-bold mt-4">¡Bienvenido a mi primer Proyecto!</h2>

                <div class="space-y-5">

                    <p class="mt-20">Me hace mucha ilusión que te pases por aquí para ver mi primer proyecto.</p>
                    
                    <h2 class="text-2xl text-slate-800 font-extrabold">Sobre mí</h2>
                    
                    <h3 class="text-xl text-slate-800 font-bold">El contexto</h3>
                    
                    <p>Después de introducirme en el mundo del desarrollo web de manera autodidacta con HTML, CSS, JS y PHP, lo tuve claro, ¡este tiene que ser mi profesión! Así que decidí empezar a formarme más. Por lo que me inscribí en un curso de certificado de profesionalidad. Un certificado de profesionalidad es un certificado oficial con el que se pueden convalidar asignaturas de un FP. El certificado que estoy realizando se llama DESARROLLO DE APLICACIONES CON TECNOLOGÍAS WEB (IFCD0210) de 510 horas de clase y después las prácticas en la empresa, 120 horas de prácticas en mi caso. Con este certificado puedo convalidar 4 módulos o asignaturas del segundo curso del FP Superior de Desarrollo de Aplicacions Web.</p> 
                    <p>Terminé las clases antes del verano y las practicas estaban programadas para empezar en septiembre, por lo que disponía del verano antes de empezar las prácticas. Pregunté por las tecnologías que utilizaban en la empresa y me enteré que utilizaban Laravel y Vue. No sabía con cuál trabajaría yo por lo que decidí preparar el que más me gustaba, me decidí por el backend. Y utilicé el tiempo libre que tenía en verano para aprender todo lo que pude sobre Laravel.</p> 
    
                    <h2 class="text-2xl text-slate-800 font-extrabold">¿Qué es Guia Dev?</h2>
    
                    <p>Es una página web creada para hacer apuntes de cualquier tema de programación de manera sencilla. Para ello dispone de un editor de texto WYSIWYG (What You See Is What You Get) y bloques de código con resaltador de sintáxis.</p>
                    <p>Básicamente es una página web donde publicar Posts. Los Posts pertenecen a un tema, y los temas tienen capítulos en los que se pueden clasificar los Posts. Es decir, Los temas tienen diferentes capítulos, y los capítulos contienen Posts. Aunque los capítulos no son necesarios y puede haber Posts sin que sean parte de ningún capítulo, pero si es obligatorio que los Posts sean parte de un tema.</p>
    
                    <h3 class="text-xl text-slate-800 font-bold">Tecnologías</h3>
    
                    <p>Es un proyecto <span class="font-bold text-violet-900">Laravel</span> y he utilizado <span class="font-bold text-violet-900">Tailwind</span>, <span class="font-bold text-violet-900">Jetstream</span> y <span class="font-bold text-violet-900">Livewire</span>. Además he utilizado otras herramientas como CkEditor 5, Prism y Sortable como iré detallando más adelante.</p>
    
                    <h2 class="text-2xl text-slate-800 font-extrabold">Cómo funciona Guia Dev</h2>
    
                    <h3 class="text-xl text-slate-800 font-bold">Rutas</h3>
    
                    <p>La primera opción a la hora de crear rutas en un proyecto basicamente de tipo CRUD, es normalmente utilizar <span class="font-bold text-violet-900">rutas resource</span>. Pero en este caso, varias de las acciones del CRUD se ejecutan mediante los controladores de los componentes Livewire. Por lo que he decidido no utilizar rutas resource. Por otro lado, he añadido <span class="font-bold text-violet-900">middlewares</span> de usuarios autenticados en algunas de las rutas y por supuesto nombres a cada ruta.</p>
    
                    <h3 class="text-xl text-slate-800 font-bold">Login</h3>
    
                    <p>El login de este proyecto es el que viene con Jetstream, pero con modificaciones:</p>
                    <ul class="list-disc pl-8">
                        <li>He cambiado el campo "name" por "username".</li>
                        <li>He quitado el campo email. Para registrarse sólo se requiere un nombre de usuario (que tendrá que ser único) y contraseña (también modificado).</li>
                        <li>He cambiado el número mínimo de caracteres de la contraseña. Por defecto viene con 8 y ahora son 4.</li>
                    </ul>
                    {{-- <p>Pensaba que estos cambios sería algo muy sencillo de aplicar, pero requiere modificar controladores, métodos y vistas que ni sabía que existían.</p> --}}
    
                    <p>Este sistema de login incluye:</p>
                    <ul class="list-disc pl-8">
                        <li>Registrarse e iniciar sesión.</li>
                        <li>Editar tus datos de usuario: nombre de usuario y contraseña en este caso.</li>
                        <li>Activar el doble factor de autenticación.</li>
                        <li>Administrar y cerrar sesión de tus sesiones activas en otros navegadores y dispositivos.</li>
                        <li>Eliminar cuenta.</li>
                    </ul>
    
                    {{-- <p>Todo esto está operativo y funcionando. También he traducido todo el login, la página de perfil, los modales y demás elementos.</p> --}}
    
                    <h3 class="text-xl text-slate-800 font-bold">Navegación</h4>
    
                    <p>En la navegación disponemos cinco elementos: Home (el logo), Mis Posts, Posts, Temas y Usuario/Login</p>
    
                    <h4 class="font-bold">Home</h4>
                    <p>Esta es la página donde nos encontramos ahora, y como ves es simplemente la descripción del proyecto.</p> 
                    
                    <h4 class="font-bold">Mis Posts</h4>
                    <p>La página "Mis Posts" es un dashboard donde el usuario puede hacer un todo el CRUD de los Post. También tiene un buscador y tres filtros para encontrar el Post que está buscando. El buscador hace una búsqueda en los campos título y descripción del Post.</p>
                    <p>Esta página <span class="font-bold text-violet-900">es por completo un componente Livewire</span>. Para ello la ruta lo direcciona directamente al controlador del componente Livewire y no hace falta crear un controlador con un solo método y con la única función de redireccionar al controlador de Livewire.</p>
                    <p>La razón por la que he utilizado un componente Livewire en esta página es para que el buscador y los filtros actuen de manera reactiva, es decir que podemos filtrar y actualizar la tabla de Posts sin tener que recargar la página, lo que mejora notoriamente la experiencia del usuario.</p>
                    <p>Los bloques de código tienen el resaltado de sintáxis de <span class="font-bold text-violet-900">Prism</span>, que facilita mucho la lectura de código y, a mi parecer, mejora el Post estéticamente.</p>
    
    
                    <h5 class="font-bold text-slate-600">Formulario del Post</h5>
                    <p>Desde esta la página "Mis Posts" podemos crear y editar nuestros Posts. Para crear y editar el Post se utiliza el mismo componente Livewire. Lo hice con componente para reutilizar el código ya que es básicamente el mismo formulario. Y lo hice con Livewire porque, por una parte el "select" para elegir el capítulo depende del "select" del tema, y quería que los cambios fuesen reactivos. Para escribir el contenido del Post he utilizado <span class="font-bold text-violet-900">CKEditor</span> para poder agregar formatos al texto, bloques de código, tablas, etc.</p>
                    <p>Un usuario que no es autor del Post, aún no teniendo un botón o enlace para editarlo, tiene muy facil escribir la url de la página para editar con el id de otro Post. Y para solucionarlo he creado un <span class="font-bold text-violet-900">Policy</span>. Este Policy responde con el código <span class="font-bold text-violet-900">403 (Forbidden)</span> si el usuario no es el autor del Post, pero en el caso de que el Post sea oculto, la respuesta es el código <span class="font-bold text-violet-900">404 (Not Found)</span>. Esta Policy también lo he utilizado en la ruta "post.show" para que no se puedan ver Posts ocultos, mostrando el código de error 404.</p>
    
                    <h5 class="font-bold text-slate-600">Validaciones</h5>
                    <p>Las Validaciones del al registrar el usuario se determina en <code>App\Actions\Fortify\CreateNewUser.php</code> que he tenido que modificar para quitar el email y modificar el campo 'name' por 'username'. Y para actualizar el usuario lo mismo en el fichero <code>App\Actions\Fortify\UpdateUserProfileInformation.php</code>.</p>
                    <p>Los Temas ('subjects') se crean y se acualizan con componentes Livewire, por lo que las validaciones se sitúan en sus respectivos controladores agregando la propiedad protegida <code>$rules</code> para después ejecutar el método <code>validate</code>.</p>
                    <p>Los Post en cambio, se crean, editan y eliminan a través de su controlador, por lo que, en este caso, he creado un <span class="font-bold text-violet-900">form request</span> para sacar la validación del controlador.</p>
    
                    
                    <h4 class="font-bold">Posts</h4>
                    <p>En la página Posts tenemos un lista de todos los Posts públicos de la base de datos. Como en la página "Mis Posts", aquí también tenemos un buscador y filtros, pero los filtros no son los mismos que en "Mis Posts". En esta página los filtros son de autores y temas.</p>
                    <p>Tenemos también una paginación que muestra hasta 10 posts por página. La paginación también es reactiva, no se recarga la página al cambiar entre las páginas de la paginación. Esto se consigue simplemente utilizando la siguiente clase:</p>
                    <pre class="language-php"><code>use Livewire\WithPagination;
    
        class PostsIndex extends Component
        {
            use WithPagination;</code></pre>
    
                    <h5 class="font-bold text-slate-600">ShowPost</h5>
                    <p>Al hacer click en un Post, podemos ver el contenido completo del Post. También podemos ver (si hay código en el contenido) el resaltado del código, gracias a la combinación de <span class="font-bold text-violet-900">CKEditor + Prism</span>. Prism diferencia las palabras clave dependiendo del lenguaje y los resalta con colores.</p>
                    <p>Como elemento de seguridad, he denegado el acceso a los Posts que tienen el estado de oculto, devolviendo un error 404 (Not Found), como menciono anteriormente, para mostrar la menor información no deseada posible. Esto lo he hecho con la función <span class="font-bold text-violet-900">abort()</span> en el controlador del Post:</p>
    
                    <pre class="language-php"><code>class PostController extends Controller
    {
        public function show(Post $post)
        {
            if ($post->public == '0') {
                abort(404);
            }
            return view('posts.show', compact('post'));
        }</code></pre>
                    
                    <h4 class="font-bold">Temas</h4>
                    <p>En la página de Temas podemos ver listados todos los temas de GuiaDev. Los usuarios no tienen acceso a crear, editar ni a eliminar los temas, sólo el administrador puede hacerlo, como se muestra en el siguiente gif.</p>
                    <img class="m-auto" src="{{asset('temasCRUD.gif')}}" alt="gif opciones">
                    <p>Si hacemos click en uno de los temas hacedemos a su contenido. Un tema puede tener (o puede no tener) uno o varios capítulos para separar los Post por las distintas temáticas. Al igual que los temas, los capítulos de estos sólo los podrá crear, editar y eliminar el administrador.</p>
    
                    {{-- <h4 class="font-bold">Hay que arreglar</h4> --}}
                    {{-- <ul>
                        
                    </ul> --}}
    
                    <h4 class="font-bold">Añadir Funcionalidades</h4>
                    <ul class="list-disc pl-6">
                        <li>Subir imágenes en ckEditor</li>
                        <li>Añadir comentarios en los Posts</li>
                    </ul>
                </div>
                @include('README')

            </div>
        </div>
    </div>
</x-app-layout>
