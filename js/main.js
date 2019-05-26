$(window).load(function(){
  $('#myModal').modal('show');
});

function check_senha() {
  if (document.getElementById('senha').value == document.getElementById('confirma-senha').value) {
    document.getElementById('btnCadastrar').disabled = false;
    $('#password_warning').css('display', 'none');
  } else {
    document.getElementById('btnCadastrar').disabled = true;
    $('#password_warning').css('display', 'block');
  }
}