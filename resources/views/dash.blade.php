@extends("potato")
@section("content")
<div id="crud">
	<div class="row justify-content-center alight-imtems-center">
		<div class="col-12">
			<a href="#" class="btn btn-primary self-align-end" data-toggle="modal" data-target="#crear">Nuevo Task</a>
		</div>
	</div>



	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>Keep</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="keep in keeps">
					<td>@{{keep.keep}}</td>
					<td>
						<a href="#" class="btn btn-primary" v-on:click.prevent='editKeeps(keep)'>Editar</a>
						<a href="#" class="btn btn-danger" v-on:click.prevent='deleteKeep(keep)'>Eliminar</a>
					</td>
					
				</tr>
			</tbody>
		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item" v-if="pagination.current_page > 1">
					<a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1)">
				        <span aria-hidden="true">&laquo;</span>
				        <span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item" v-for="pagina in paginasNumero" v-bind:class="[pagina == activoActivao ? 'active' : '']">
					<a class="page-link" href="#" @click.prevent="cambiarPagina(pagina)">
						@{{pagina}}
					</a>
				</li>
				<li class="page-item"  v-if="pagination.current_page < pagination.last_page">
					<a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1)">
						<span aria-hidden="true">&raquo;</span>
        				<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
		@include("create")
		@include("edit")
		<div v-for="pagina in pagination.total"> <br>
			<div>potato</div> 
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			@{{$data}}
		</div>
	</div>
</div>


@endsection