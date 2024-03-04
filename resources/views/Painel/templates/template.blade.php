<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SaveCom - Painel</title>
    <meta name="author" content="">
	<!--CSS-->
	<link rel="stylesheet" href="{{url('assets/Painel/css/Painel.css')}}">
	<!--Favicon-->
	<link rel="icon" type="image/png" href="{{url('assets/Painel/imgs/favicon-acl.png')}}">
     <!--Icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	
</head>

<body>
    <header class="menu">
	    <div class="logo">
			<span>SaveCom</span>
        </div>
        <nav>
			<ul>
			    <li>
					@if( Auth::check())	
					  <span>Oi, {{Auth::user()->name}}</span>
					@endif   
				</li>
				<li>
					<a href="{{url('/')}}">Home</a>
				</li>
				<li>
					<a href="{{route('PainelController.index')}}">Compromisso</a>
				</li>
					@if( Auth::check())
						<li>	
							<form role="form" method="POST"  action="{{ route('logout') }}">
								@csrf
								<button class="button_sair">Sair</button>
							</form>
						</li>
					@else
						<li>
							<a href="{{ route('login') }}">Login</a>
						</li>
					@endif
			</ul>
        </nav>		
		<div class="container_menu_icon">
			@if( Auth::check())
				<i class="fa-solid fa-user"></i>
			@endif	
			<span></span>
		</div> 
    </header>
	<!--Content Dinâmico-->
	@yield('content')


	<footer class="footer">
		<div class="container_info_footer">
			<p>Felipe Alves - Todos os direitos reservados</p>
		</div>
	</footer>


	<!--jQuery-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{url('assets/Painel/js/scripty.js')}}"></script>
</body>
</html>