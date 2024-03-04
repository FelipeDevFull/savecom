//Menu
$(".container_menu_icon").click(function() {
	$(".container_menu_icon").toggleClass("active");
	$("nav").slideToggle(100);
});



const loader = document.querySelector("#loading");
const toggleLoader = () => {
  loader.classList.toggle("open_loading");
};



//INTERACTION MODAL TIME
document.getElementById("time").addEventListener("click", function() {
  document.getElementById("container_time").style.display = 'block';
});
const element_time =  document.getElementsByClassName("number_time");
for(let i = 0; i < element_time.length; i++) {
    
  element_time[i].addEventListener("click", function() {
    
    let value_click_span = element_time[i].innerHTML;
    let value_input_time =  document.getElementById("time").value;
    
    if(value_click_span === 'Limpar')
    {
      document.getElementById("time").value = '';
    }else{
      if(value_input_time.length <= 4)
      {    
        document.getElementById("time").value += value_click_span;
        if(value_input_time.length === 1)
        { 
          document.getElementById("time").value += ':';
        }
      }

    };
    
  });
}



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




/***************************************FORM REGISTER******************************************************/

//SUBMIT FORM
const form_register = document.querySelector("#form_register");


if(form_register)
{
  form_register.addEventListener("submit", async (event) => {
    event.preventDefault();
    const ValueFormData = new FormData(form_register);
    
    //VALUES INPUTS REGISTER
    let title_input_value       = ValueFormData.get('title');
    let date_input_value        = ValueFormData.get('date');
    let time_input_value        = ValueFormData.get('time');
    let description_input_value = ValueFormData.get('description');
  
    //VALIDATION INPUSTS REGISTER
    let title_length = title_input_value.length;
    if (title_length <= 4) {
      validate("<p>O campo Título deve ter mais de 5 caracteres.</p>");
      return false;
    }
    
    if (date_input_value === "") {
      validate("<p>Por favor, Insira uma data para o compromisso.</p>");
      return false;
    }

    let time_mask = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/;
    if(!time_mask.test(time_input_value)) {
      validate('<p>Por favor, Insira um horário válido.</p>');
      return false;
    }

  
    let description_length = description_input_value.length; 
    if (description_length <= 10) {
      validate("<p>O campo assunto deve ter mais de 10 caracteres.</p>");
      return false;
    }
  
    
    //SEND REGISTER FECH API
    toggleLoader();
    const response = await fetch(Url_Register,{
      method:'POST',
      body: ValueFormData,
      headers:{'X-CSRF-TOKEN': ValueFormData.get('_token')},
      dataType: "text"
    });
    let Result = await response.json();
    if(Result.sucess == 'sucess')
    { 
      validate('hide');
      toggleLoader();
      location.href = Url_Register_Redirect;
      return true;
    }else{
      toggleLoader(); 
      validate('<p>' + Result.error + '</p>');
      return false;
    }
   
    
  });
}







/***************************************FORM UPDATE********************************************************* */ 

//SUBMIT FORM EDITE
const form_edite  = document.querySelector("#form_edite");

if(form_edite)
{
  form_edite.addEventListener("submit", async (event) => {
    event.preventDefault();
  
    const ValueFormData = new FormData(form_edite);
    
    //VALUES INPUTS REGISTER
    let title_input_value       = ValueFormData.get('title');
    let date_input_value        = ValueFormData.get('date');
    let time_input_value        = ValueFormData.get('time');
    let description_input_value = ValueFormData.get('description');
  
    //VALIDATION INPUSTS REGISTER
    let title_length = title_input_value.length;
    if (title_length <= 4) {
      validate("<p>O campo Título deve ter mais de 5 caracteres.</p>");
      return false;
    }
    
    if (date_input_value === "") {
      validate("<p>Por favor, Insira uma data para o compromisso.</p>");
      return false;
    }

    let time_mask = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/;
    if(!time_mask.test(time_input_value)) {
      validate('<p>Por favor, Insira um horário válido.</p>');
      return false;
    }
  
    let description_length = description_input_value.length; 
    if (description_length <= 10) {
      validate("<p>O campo assunto deve ter mais de 10 caracteres.</p>");
      return false;
    }
    
    //SEND UPDATE FECH API
    toggleLoader();
    const response = await fetch(Url_Update,{
      method:'POST',
      body: ValueFormData,
      headers:{
        'Accept': 'aplication/json header',
        'X-CSRF-TOKEN': ValueFormData.get('_token')
      },
      dataType: "json"
    });
    let Result = await response.json();
    if(Result.errors.title == "The title has already been taken.")
    { 
      toggleLoader();    
      validate('<p>Esse Titulo já Existe.</p>'); 
      return false; 
    }else{
      validate('hide');
      toggleLoader();
      location.href = Url_Update_Redirect;
    }
    
  });
}


