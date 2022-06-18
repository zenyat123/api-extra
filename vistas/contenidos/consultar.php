

<h1 class = "font-normal text-3xl text-neutral-600 tracking-wide mb-12">Registrados actualmente</h1>

<div class = "grid grid-cols-3 gap-3 mb-8">

	<?php

		$personajes = PersonajesControlador::consultar();

		if($personajes)
		{

			foreach($personajes as $personaje)
			{

				echo "<figure class = 'bg-blue-100 rounded-xl p-8 dark:bg-slate-800 md:p-0'>

					<div class = 'text-center pt-6 md:text-left md:p-8'>

						<h1 class = 'font-medium text-lg'>

							".$personaje["id"].". <input type = 'text' value = '".$personaje["name"]."' class = 'rounded border border-blue-400 m-1' id = 'name".$personaje["id"]."'>

						</h1>

						<figcaption class = 'font-medium'>

	                        <div class = 'text-slate-700 dark:text-slate-500'>

	                            Species: <input type = 'text' value = '".$personaje["species"]."' class = 'rounded border border-blue-400 m-1' id = 'species".$personaje["id"]."'>

	                        </div>

	                        <div class = 'text-slate-700 dark:text-slate-500'>

	                            Currently as: <input type = 'text' value = '".$personaje["status"]."' class = 'rounded border border-blue-400 m-1' id = 'status".$personaje["id"]."'>

	                        </div>

                    	</figcaption>

					</div>

					<div class = 'relative'>

	                    <button onclick = 'edit(".$personaje["id"].")' class = 'absolute bottom-0 right-0 bg-blue-300 rounded-br-xl p-3'>

	                        Editar

	                    </button>

	                </div>

				</figure>";

			}

		}
		else
		{

            echo "<div class = 'col-span-9 w-full bg-blue-200 border border-blue-300 rounded relative px-4 py-3'>

                <p class = 'block sm:inline'>actualmente sin registros</p>

            </div>";

		}

	?>

</div>

<script>

	let loc = window.location;

    let pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);

    let path = loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));

	function edit(id){

		let name = document.getElementById('name'+id).value;
		let species = document.getElementById('species'+id).value;
		let status = document.getElementById('status'+id).value;

		const data = new FormData();

		data.append('id_edit', id);
		data.append('name_edit', name);
		data.append('species_edit', species);
		data.append('status_edit', status);

		fetch('ajax/personajes_ajax.php', { method: 'post', body: data })
		.then(response => response.text())
		.then(text => window.location = path);

	}

</script>

