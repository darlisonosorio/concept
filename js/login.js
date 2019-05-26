$("#btnEntrar").on('click', function(){
    var password = $("senha").val();
    var email = $("email").val();
    if(password !="" && email != ""){
    	if(isEmail(email)){
    		alert("Sucesso")
    	}else{
    		alert("E-mail com formato incorreto.")
    	}
    }else{
        alert("Preencha todos os campos!");
    }
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}