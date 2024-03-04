@extends('auth.template_auth.template')

@section('content')

    <section class="container">

        <div class="container_form">
            <header>
                <h1>CADASTRO</h1>   
            </header>
            <div class="container_lds-ellipsis" id="loading">
                <div class="lds-ellipsis"><div></div><div></div><div></div></div>
            </div>
            <div id="alert_validate_modal" class="modal_validate"></div>

            <!-- <form method="POST" action="{{ route('register') }}"  id="form_register_auth"> -->
            <form method="POST"  id="form_register_auth">    
                @csrf
                <label for="fname">Nome</label>
                <input type="text" name="name" value="{{old('name')}}"  autofocus  placeholder="Insira o seu Nome">

                <label for="fname">Email</label>
                <input type="text" name="email" value="{{old('email')}}"  autofocus  placeholder="Insira o seu Email">

                <label for="lname">Senha</label>
                <input type="password" name="password" value="{{old('password')}}" placeholder="Insira a sua senha">

                <label for="lname">Confirmar Senha</label>
                <input type="password" name="password_confirmation"   value="{{old('password_confirmation')}}" placeholder="Insira a sua senha novamente">
                
                <a  href="{{ route('login') }}">
                        {{ __('Já é Registrado?') }}
                </a>
            
                <button class="button">{{ __('Enviar') }}</button>
            </form>
        </div>

        <script>
            const Url_Register_auth = "{{ route('register') }}";
            const Url_Register_auth_Redirect = "{{ route('PainelController.index') }}";
	   </script>
    </section>
@endsection


