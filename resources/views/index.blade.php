@extends('template_index.template')

@section('content')
<main>
    <section class="section_index">
        <header>
            <h1>A melhor solução para gerenciar os seus compromissos.</h1>
            <p>Gerencie os seus compromissos com a melhor solução em nuvem do mercado.</p>  
        </header>
        <a href="{{url('register')}}">Cadastrar Compromissso</a>
        <div class="section_index_slideshow">
            <div class="mySlides fade">
                <img src="{{url('assets/index/imgs/slideshow_image1.png')}}" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="{{url('assets/index/imgs/slideshow_image2.png')}}" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="{{url('assets/index/imgs/slideshow_image3.png')}}" style="width:100%">
            </div>

            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
        </div>
        <p>Interface Simples de usar.</p>
    </section>

    <section class="section_security">
        <div class="section_security_container_info"> 
            <div>
                <header>
                    <h2>Os seus compromissos em boas mãos</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, temporibus. Nostrum, sunt. Laboriosam asperiores neque possimus saepe! Magnam debitis laudantium voluptatibus, culpa dignissimos non perferendis repellendus unde obcaecati odit molestiae!</p>
                </header>
            </div>
            <div class="section_security_picture"></div>
        </div> 
    </section>

    <section class="section_plans">
        <header>
            <h2>Planos</h2>
            <p>Oferecemos os melhores preçõs do mercado para você.</p>
        </header>
        <div class="section_plans_cards">
            <div class="card_price">
                <h3>Free</h3>
                <span>Grátis</span>
                <span>3GB</span>
                <a href="http://">Contratar</a>
            </div>
            <div class="card_price">
                <h3>Plus</h3>
                <span>R$ 149,99/mês</span>
                <span>50GB</span>
                <a href="http://">Contratar</a>
            </div>
            <div class="card_price">
                <h3>Premiun</h3>
                <span>R$ 549,99/mês</span>
                <span>1TB</span>
                <a href="http://">Contratar</a>
            </div>
        </div>
    </section>
    <section class="section_Application">
        <div class="column">
            <header>
                <h2>Baixe o Nosso Aplicativo.</h2>
            </header>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, in molestias quis eius ad animi tempore! Recusandae totam inventore illum sit saepe molestias officiis quod enim architecto corporis, temporibus debitis.</P>
            <div class="section_Application_button">
                <a href="http://">Google Play</a>
                <a href="http://">App Store</a>
            </div>
        </div>
        <div class="column">
            <div class="section_Application_smartphone">
                <p>SeveCom</p>
                <p>Bem vindo(a)!</p>
                <p>para proseguir você precisa de uma conta na SeveCom</p>
               <a href="http://">Entrar</a>
            </div>
            <img src="{{url('assets/index/imgs/smartphone.png')}}" alt="">
        </div>    
    </section>
</main>
@endsection


