

<h1 class = "font-normal text-3xl text-neutral-600 tracking-wide mb-12">Originales</h1>

<div class = "grid grid-cols-3 gap-3 characters">



</div>

<script>

    let indices = '';

    for(i = 1; i <= 100; i++){

        indices = indices + i + ',';

    }

    let search = indices.substring(0, indices.length - 1);

	fetch('https://rickandmortyapi.com/api/character/'+search)
    .then(response => response.json())
    .then(json => json.forEach(character => {

        const div = document.querySelector('.characters');

        const add = document.createRange().createContextualFragment(`

            <figure class = 'md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800'>

                <img class = 'w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto' src = '${ character.image }'>

                <div class = 'pt-6 text-center md:text-left md:p-8'>

                    <h1 class = 'text-lg font-medium'>

                        ${ character.id }. ${ character.name }

                    </h1>

                    <figcaption class = 'font-medium'>

                        <div class = 'text-sky-500 dark:text-sky-400'>

                            ${ character.species }

                        </div>

                        <div class = 'text-slate-700 dark:text-slate-500'>

                            Currently as: ${ character.status }

                        </div>

                        <div class = 'text-blue-300'>

                            <a onclick = 'specify(${ character.id })' class = 'cursor-pointer'>Especificaciones</a>

                        </div>

                        <div class = 'text-slate-700 dark:text-slate-500 hidden specifications' id = 'specification${ character.id }'>

                            <span>Gender: ${ character.gender } </span>

                            <span>Type: ${ character.type } </span>

                            <span>Origin: ${ character.origin.name } </span>

                            <span>Location: ${ character.location.name } </span>

                        </div>

                    </figcaption>

                </div>

                <div class = 'relative'>

                    <button onclick = 'register(${ character.id }, "${ character.name }", "${ character.species }", "${ character.status }")' 
                              class = 'absolute bottom-0 right-0 bg-blue-300 rounded-br-xl p-3'>

                        Registrar

                    </button>

                </div>

            </figure>

        `);

        div.append(add);

    }));

    function specify(id){

        const div = document.getElementById('specification'+id);

        div.classList.toggle('hidden');
        
    }

    function register(id, name, species, status){

        const data = new FormData();

        data.append('id', id);
        data.append('name', name);
        data.append('species', species);
        data.append('status', status);

        fetch('ajax/personajes_ajax.php', { method: 'post', body: data })
        .then(response => response.text())
        .then(text => window.location = path);

    }

</script>

