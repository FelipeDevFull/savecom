@extends('auth.template_auth.template')
@section('content')
    <section class="container">
        <div class="container_form">
            <header>
                <h1>ResetPassword</h1>   
            </header>
            <!-- Validation Errors -->
            @if($errors->any())
            @foreach($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <label for="fname">Email</label>
                <input type="text" id="fname" name="email" value="{{old('email')}}" required autofocus  placeholder="Insira o seu Email">
                <button class="button">Enviar</button>
            </form>
        </div>
    </section>
@endsection