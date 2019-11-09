
var form = document.querySelector('.add_form')
var validateBtn = form.querySelector('.save_submit')
var title = form.querySelector('.title')
var price = form.querySelector('.price')
var brand = form.querySelector('.brand')
var image = form.querySelector('.image')
var features = form.querySelector('.features')
var datetime = form.querySelector('.datetime')
var type = form.querySelector('.type')

var fields = form.querySelectorAll('.data')

//принимаем строку возвращает DOM елемент
var generateError = function (text) {
  var error = document.createElement('div')
  error.className = 'error'
  error.style.color = 'red'
  error.innerHTML = text
  return error
}
//проверка полей на пустоту
var checkFieldsPresence = function () {
  for (var i = 0; i < fields.length; i++) {
    if (!fields[i].value) {
      console.log('field is blank', fields[i])
      var error = generateError('Cant be blank')
      form[i].parentElement.insertBefore(error, fields[i])
    }
  }
}
//удаление ошибок валидации
var removeValidation = function () {
  var errors = form.querySelectorAll('.error')

  for (var i = 0; i < errors.length; i++) {
    errors[i].remove()
  }
}



form.addEventListener('submit', function (event) {
  event.preventDefault()
  var errors = form.querySelectorAll('.error')

  removeValidation()

  checkFieldsPresence()
})

