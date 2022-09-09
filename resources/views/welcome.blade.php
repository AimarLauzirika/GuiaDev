<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-10 space-y-4">
                
                <h1 class="text-center text-3xl text-slate-800 font-extrabold mt-10">Bienvenido a Guia Dev</h1>
                <h2 class="text-center text-2xl text-gray-700 font-bold mb-16">¡Bienvenido a mi primer Proyecto!</h2>

                <p class="mt-20">Me hace mucha ilusión que te pases por aquí para ver mi primer proyecto.</p>
                
                <h2 class="text-2xl text-slate-800 font-extrabold">Sobre mí</h2>
                
                <h3 class="text-xl text-slate-800 font-bold">El contexto</h3>
                
                <p>Después de introducirme en el mundo del desarrollo web de manera autodidacta con HTML, CSS, JS y PHP, lo tuve claro, ¡este tiene que ser mi profesión! Así que decidí empezar a formarme más. Por lo que me inscribí en un curso de certificado de profesionalidad. Un certificado de profesionalidad es un certificado oficial con el que se pueden convalidar asignaturas de un FP. El certificado que estoy realizando se llama DESARROLLO DE APLICACIONES CON TECNOLOGÍAS WEB (IFCD0210) de 510 horas de clase y después las prácticas en la empresa, 120 horas de prácticas en mi caso. Con este certificado puedo convalidar 4 módulos o asignaturas del segundo curso del FP Superior de Desarrollo de Aplicacions Web.</p> 
                <p>Terminé las clases antes del verano y las practicas estaban programadas para empezar en septiembre, por lo que disponía del verano antes de empezar las prácticas. Pregunté por las tecnologías que utilizaban en la empresa y me enteré que utilizaban Laravel y Vue. No sabía con cuál trabajaría yo por lo que decidí preparar el que más me gustaba, me decidí por el backend. Y utilicé el tiempo libre que tenía en verano para aprender todo lo que pude sobre Laravel.</p> 

                <h2 class="text-2xl text-slate-800 font-extrabold">¿Qué es Guia Dev?</h2>

                <p>Es una página web creada para hacer apuntes de cualquier tema de programación de manera sencilla. Para ello dispone de un editor de texto WYSIWYG (What You See Is What You Get) y bloques de código con resaltador de sintáxis.</p>
                <p>Básicamente es una página web donde publicar Posts. Los Posts pertenecen a un tema, y los temas tienen capítulos en los que se pueden clasificar los Posts. Es decir, Los temas tienen diferentes capítulos, y los capítulos contienen Posts. Aunque los capítulos no son necesarios y puede haber Posts sin que sean parte de ningún capítulo, pero si es obligatorio que los Posts sean parte de un tema.</p>

                <h3 class="text-xl text-slate-800 font-bold">Tecnologías</h3>

                <p>Es un proyecto <strong>Laravel</strong> y he utilizado <strong>Tailwind</strong>, <strong>Jetstream</strong> y <strong>Livewire</strong>. Además he utilizado otras herramientas como CkEditor 5, Prism y Sortable como iré detallando más adelante.</p>

                <h2 class="text-2xl text-slate-800 font-extrabold">Cómo funciona Guia Dev</h2>

                <h3 class="text-xl text-slate-800 font-bold">Login</h3>

                <p>Los temas y los capítulos solo pueden ser creados, editados y/o eliminados por el usuario con rol de administrador. Y los Posts pueden crearlos cualquier usuario registrado, por lo que hay un sistema de login.</p>
                <p>El login de este proyecto es el que viene con Jetstream con alguna modificación en el usuario, no hace falta el email, basta con un nombre de usuario (que tendrá que ser único). Este sistema de login incluye:</p>
                   
                <ul class="list-disc pl-8">
                    <li>Registrarse e iniciar sesión.</li>
                    <li>Editar tus datos de usuario: nombre, email y contraseña.</li>
                    <li>Activar el doble factor de autenticación.</li>
                    <li>Administrar y cerrar sesión de tus sesiones activas en otros navegadores y dispositivos.</li>
                    <li>Eliminar cuenta.</li>
                </ul>

                <p>Todo esto está operativo y funcionando.</p>

                <h3 class="text-xl text-slate-800 font-bold">Navegación</h4>

                <p>En la navegación disponemos cuatro enlaces: Home (el logo), Mis Apuntes, Posts y Temas</p>

                <h4 class="font-bold">Home</h4>
                <p>Esta es la página donde nos encontramos ahora, y como ves es simplemente la descripción del proyecto.</p> 
                
                <h4 class="font-bold">Mis Apuntes</h4>
                <p>La página "Mis Apuntes" es un dashboard donde el usuario puede hacer un todo el CRUD de los Post. También tiene un buscador y tres filtros para encontrar el Post que está buscando. El buscador hace una búsqueda en los apartados título y descripción del Post.</p>
                <p>Esta página <span class="font-bold">es por completo un componente Livewire</span>. Para ello la ruta lo direcciona directamente al controlador del componente Livewire y no hace falta crear un controlador con un solo método y que redireccione al controlador de Livewire.</p>
                <p>La razón por la que he utilizado un componente Livewire en esta página es para que el buscador y los filtros actuen de manera reactiva, es decir que podemos filtrar y actualizar la tabla de Posts sin tener que recargar la página, lo que mejora notoriamente la experiencia del usuario.</p>


                <h4 class="font-bold text-slate-600">Formulario del Post</h4>
                <p>Desde esta página podemos crear y editar los Post. El formulario para crear y editar el Post es el mismo componente Livewire. Lo hice con componente para reutilizar el código ya que es básicamente el mismo formulario. Y lo hice con Livewire porque, por una parte el "select" para elegir el capítulo depende del "select" del tema, y quería que los cambios fuesen reactivos. Y por otra parte el controlador del componente de Livewire ofrece mucha versatilidad, y es sencillo aplicar distintos métodos como crear, editar o eliminar según se aplique.</p>
                <p>Mientras escribo esta descripción de mi proyecto, he ido mejorando el código porque me he ido dando cuenta de varias cosas. Me he encotrado algunos errores, alguno debido a cosas que he dejado "para después", y como no lo apunté en el momento en algún lado, "después" estaba con otras cosas. Otros errores han sido partes del código que en el momento funcionaban y, al avanzar, se vieron afectados y empezaron a dar errores. Pero algunas cosas de las que me he dado cuenta, son cosas que se podían mejorar. Por ejemplo, me acabo de dar cuenta de que mi página no está suficientemente protegida. Y es que aunque tenga un <span class="font-bold">middleware</span> para los usuario no autenticados, un usuario que no es autor del Post, aún no teniendo un botón o enlace para editarlo, tiene muy facil escribir la url de la página para editar con el id de otro Post. Y para solucionarlo he creado un <span class="font-bold">Policy</span> que identifique al usuario autenticado y compararlo con el autor del Post, y lo he aplicado en el controlador livewire (teniendo que incorporar <span class="italic bg-gray-200">Illuminate\Foundation\Auth\Access\AuthorizesRequests</span>) tanto en el método para editar, como en el de eliminar el Post.</p>
                <p>Y puede pasar algo parecido al visualizar un Post. Y es que un usuario podría ver un Post que no es público escribiendo en la url su id. Por lo que le he utilizado el mismo Policy en el méthodo show, con la condición de que el Post esté oculto (los Post públicos los puede ver cualquiera). Pero indagando las Policies por internet me he topado con un consejo para este caso de no permitir mostrar Posts ocultos. Y la cuestión es que recomendaban no utilizar una respuesta <span class="font-bold">403 (Forbidden)</span>, que es el que se utiliza en estos casos y el que he utilizado con la edición del Post, en su lugar aconsejaban usar el código <span class="font-bold">404 (Not Found)</span> para que un posible intruso no pueda detectar los id de los Post que estén ocultos. Y así lo he hecho en mi proyecto tambien. Lo comentan en este <a href="https://www.youtube.com/watch?v=wk_PKHlHDDo" class="text-blue-700">vídeo de Youtube</a>.</p>

            </div>
        </div>
    </div>
</x-app-layout>
