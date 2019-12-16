var form = document.querySelector('.form-signin');
var validateBtn = form.querySelector('.logbtn');

var fields = form.querySelectorAll('.form-control');

// getting values from inputs

var username = form.querySelector('.reg_login');
var email = form.querySelector('.reg_email');
var password = form.querySelector('.reg_pass');
var passwordConfirm = form.querySelector('.reg_pass_confirm');

var generateError = function (text) {
  var error = document.createElement('div')
  error.className = 'error'
  error.style.color = 'red'
  error.innerHTML = text
  return error
}

var removeValidation = function () {
  var errors = form.querySelectorAll('.error')

  for (var i = 0; i < errors.length; i++) {
    errors[i].remove()
  }
}

var checkFieldsPresence = function () {
  for (var i = 0; i < fields.length; i++) {
    if (!fields[i].value) {
      console.log('field is blank', fields[i])
      var error = generateError('Cant be blank')
      form[i].parentElement.insertBefore(error, fields[i])
    }
  }
}

var checkPasswordMatch = function () {
  if (password.value !== passwordConfirm.value) {
    console.log('not equals')
    var error = generateError('Password doesnt match')
    console.log(error)
    password.parentElement.insertBefore(error, password)
  }
}

form.addEventListener('submit', function(e){
	e.preventDefault()

	removeValidation()

	checkFieldsPresence()

	checkPasswordMatch()
});