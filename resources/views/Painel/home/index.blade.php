@extends('painel.templates.template')

@section('content')

	<section class="section_list">
		<header>
			<h1>Compromissos</h1>
		</header>
        
		<div class="container_search_create">
			<form action="{{route('PainelController.search')}}" method="post">
			    @csrf()
				<input type="date" name="date" value="">
				<button type="submit">Pesquisar</button>
			</form>
			<a href="{{route('PainelController.create')}}">Cadastrar Compromisso</a>
		</div>
            

		@if($Result_posts == 'error')
			<div class="container_list_info">
				<p>Você Não tem Compromissos Referente a Essa Data.</p>
			</div>	 
		@else
	
			@forelse($Result_posts as $Result_post)
				<div class="container_list_info">
					<h2>{{$Result_post->title}}</h2>
					<!-- <span>{{ $Result_post->time }} / {{ date('d-m-Y', strtotime($Result_post->date)); }}</span> -->
					<span>{{ date('H:i', strtotime($Result_post->time)); }} / {{ date('d-m-Y', strtotime($Result_post->date)); }}</span>
					<p>{{$Result_post->description}}</p>
					<a class="edit" href="{{route('PainelController.edit', $Result_post->id)}}">Alterar</a>
					<form action="{{ route('PainelController.delete', $Result_post->id)}}" method="post">
						@csrf()
						@method('DELETE')
						<button type="submit">Deletar</button>
					</form>
				</div>	
			@empty
			    <div class="container_list_info">
				    <p>Você não tem Compromissos Cadastrados.</p>
				</div>	
			@endforelse	

		@endif
	</section>	
@endsection