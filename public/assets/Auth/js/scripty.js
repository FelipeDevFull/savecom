//Menu
$(".container_menu_icon").click(function() {
	$(".container_menu_icon").toggleClass("active");
	$("nav").slideToggle(100);
});


const loader = document.querySelector("#loading");
const toggleLoader = () => {
  loader.classList.toggle("open_loading");
};


//MODAL VALIDAÇÃO
const modalMessage = document.querySelector("#alert_validate_modal");
function validate(msg) {
  if(msg == 'hide')
  {
    modalMessage.removeAttribute("style");
  }else{
    modalMessage.innerHTML = msg;
    modalMessage.style.display = "block";
  }
}


/***************************************FORM REGISTER AUTH******************************************************/

//SUBMIT FORM
const form_register_auth = document.querySelector("#form_register_auth");


if(form_register_auth)
{
  form_register_auth.addEventListener("submit", async (event) => {
    event.preventDefault();
    const ValueFormData = new FormData(form_register_auth);
    

    //VALUES INPUTS REGISTER
    let name_input_value             = ValueFormData.get('name');
    let email_input_value            = ValueFormData.get('email');
    let password_input_value         = ValueFormData.get('password');
    let password_confirm_input_value = ValueFormData.get('password_confirmation');

  
    //VALIDATION INPUSTS REGISTER
    let name_length = name_input_value.length;
    if (name_length <= 5) {
      validate('<p>O campo Nome deve ter mais de 5 caracteres.</p>');
      return false;
    }
    
    let email_mask = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if(!email_mask.test(email_input_value)) {
      validate('<p>Insira um e-mail no padrão nome@dominio.com</p>');
      return false;
    }

    let password_mask = /^(?=(?:.*?[a-z]){3,})(?=(?:.*?\d){3,})[a-z\d]{6,}$/;
    if(!password_mask.test(password_input_value)) {
      validate(
        '<p>Sua Senha deve ter no mínimo 6 caracteres.</p>'+
        '<p>Sua Senha deve ter no mínimo 3 letras.</p>'+
        '<p>Sua Senha deve ter no mínimo 3 números.</p>');
      return false;
    }


    if(password_input_value != password_confirm_input_value) {
      validate('</p>As senhas não são iguais. Tente novamente.</p>');
      return false;
    }

    //SEND REGISTER FECH API
    toggleLoader();
    const response = await fetch(Url_Register_auth,{
      method:'POST',
      body: ValueFormData,
      headers:{
        'Accept': 'aplication/json header',
        'X-CSRF-TOKEN': ValueFormData.get('_token')
      },
      dataType: "json"
    });
    let Result = await response.json();

    if(Result.errors.email == "The email has already been taken.")
    { 
      toggleLoader();  
      validate('<p>Esse Email já foi registrado</p>');   
      return false; 
    }else{
      validate('hide');
      toggleLoader();
      location.href = Url_Register_auth_Redirect;
    }
  
  });
}






/***************************************FORM LOGIN**********************************************************/ 


//SUBMIT FORM
const form_login_auth = document.querySelector("#form_login_auth");


if(form_login_auth)
{
  form_login_auth.addEventListener("submit", async (event) => {
    event.preventDefault();
    const ValueFormData = new FormData(form_login_auth);
    

    //VALUES INPUTS LOGIN
    let email_input_value            = ValueFormData.get('email');
    let password_input_value         = ValueFormData.get('password');
  
  
    //VALIDATION INPUSTS LOGIN
    let email_mask = /\S+@\S+\.\S+/;
    if(!email_mask.test(email_input_value)) {
      validate("<p>Insira um e-mail no padrão nome@dominio.com</p>");
      return false;
    }

    let password_mask = /^(?=(?:.*?[a-z]){3,})(?=(?:.*?\d){3,})[a-z\d]{6,}$/;
    if(!password_mask.test(password_input_value)) {
      validate(
        '<p>Sua Senha deve ter no mínimo 6 caracteres.</p>'+
        '<p>Sua Senha deve ter no mínimo 3 letras.</p>'+
        '<p>Sua Senha deve ter no mínimo 3 números.</p>');
      return false;
    };

   
    //SEND LOGIN FECH API
    toggleLoader();
    const response = await fetch(Url_Login_auth,{
      method:'POST',
      body: ValueFormData,
      headers:{
        'Accept': 'aplication/json header',
        'X-CSRF-TOKEN': ValueFormData.get('_token')
      },
      dataType: "json"
    });
    let Result = await response.json();

    if(Result.errors.email == "These credentials do not match our records.")
    { 
      toggleLoader();  
      validate('<p>Desculpe, não encontramos sua conta. verique os seus dados(Email e Senha) e tente novamente.</p>'); 
      return false; 
    }else{
      validate('hide');
      toggleLoader();
      location.href = Url_Login_auth_Redirect;
    }
  
  });
}












