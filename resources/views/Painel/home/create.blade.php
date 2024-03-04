@extends('painel.templates.template')

@section('content')

	<section class="container">
		<div class="container_form">	
			<header>
				<h1>Cadastrar Compromisso</h1>   
			</header>
			<div class="container_lds-ellipsis" id="loading">
                <div class="lds-ellipsis"><div></div><div></div><div></div></div>
            </div>
			<div id="alert_validate_modal" class="modal_validate"></div>

			<form id="form_register"  method="POST">
				<!-- <form method="POST" action="{{ route('PainelController.store') }}"> -->
				@csrf
				<label for="fname">Título</label>
				<input type="text" 	id="title" name="title" value="{{old('title')}}" autofocus  placeholder="Insira um titulo">
				<label for="fname">Data</label>
				<input type="date"  id="date" name="date" value="{{old('date')}}"  autofocus>
				<label for="fname">Hora</label>
				<input type="text"  id="time" name="time" value="{{old('time')}}"  autofocus readonly="readonly" placeholder="00:00">
				<div class="container_time" id="container_time">
					<div>
					<span class="number_time" id="demo">1</span>
					<span class="number_time" id="demo">2</span>
					<span class="number_time" id="demo">3</span>
					<span class="number_time" id="demo">4</span>
					<span class="number_time" id="demo">5</span>
					</div>
					<div>
					<span class="number_time" id="demo">6</span>
					<span class="number_time" id="demo">7</span>
					<span class="number_time" id="demo">8</span>
					<span class="number_time" id="demo">9</span>
					<span class="number_time" id="demo">0</span>
					</div>
					<span class="number_time reset_input_time">Limpar</span>
				</div>
				<label for="lname">Assunto</label>
				<textarea type="text" id="description" name="description" rows="4">{{old('description')}}</textarea>
				<button class="button">Enviar</button>
			</form>
		</div>

		<script>
		const Url_Register          = "{{ route('PainelController.store') }}";
		const Url_Register_Redirect = "{{route('PainelController.index')}}";
	</script>

	</section>

@endsection