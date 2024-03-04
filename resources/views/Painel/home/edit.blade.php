@extends('painel.templates.template')

@section('content')

	<section class="container">

		<div class="container_form">
		<header>
			<h1>Editar Compromisso</h1>   
		</header>
		<div class="container_lds-ellipsis" id="loading">
            <div class="lds-ellipsis"><div></div><div></div><div></div></div>
        </div>
		
		<div id="alert_validate_modal" class="modal_validate"></div>
        <!-- <form method="POST" action="{{ route('PainelController.update', $Result_edit->id) }}" id="form_edite"> -->
		<form method="POST"  id="form_edite">
			@csrf()
			@method('PUT')
			<label for="fname">Titulo</label>
			<input type="text" name="title" value="{{$Result_edit->title}}" autofocus  placeholder="Insira um titulo">
			<label for="fname">Data</label>
			<input type="date" name="date" value="{{$Result_edit->date}}"  autofocus>
			<label for="fname">Hora</label>
			<input type="text"  id="time" name="time" value="{{ Carbon\Carbon::parse($Result_edit->time)->format('h:i') }}" autofocus readonly="readonly"  autofocus>
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
			<textarea type="text" name="description" rows="4">{{$Result_edit->description}}</textarea>
			<button class="button">Enviar</button>
		</form>
		</div>

	</section>
    
	<script>
		const Url_Update          = "{{ route('PainelController.update', $Result_edit->id) }}";
		const Url_Update_Redirect = "{{route('PainelController.index')}}";
	</script>
@endsection