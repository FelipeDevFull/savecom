@extends('auth.template_auth.template')

@section('content')

    <section class="container">

        <div class="container_form">     
            <header>
                <h1>LOGIN</h1>   
            </header>
            <div class="container_lds-ellipsis" id="loading">
                <div class="lds-ellipsis"><div></div><div></div><div></div></div>
            </div>
            <div id="alert_validate_modal" class="modal_validate"></div>

            <!-- <form method="POST" action="{{ route('login') }}"> -->
            <form method="POST" id="form_login_auth">    
                @csrf
                <label for="fname">Email</label>
                <input type="text" id="fname" name="email" value="{{old('email')}}"  autofocus  placeholder="Insira o seu Email">
                <label for="lname">Senha</label>
                <input type="password" id="lname" name="password" value="{{old('password')}}" placeholder="Insira a sua senha">
                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
                <button class="button">{{ __('Enviar') }}</button>
            </form>
        </div>
        
        <script>
            const Url_Login_auth = "{{ route('login') }}";
            const Url_Login_auth_Redirect = "{{ route('PainelController.index') }}";
	   </script>
       
    </section>

@endsection






















