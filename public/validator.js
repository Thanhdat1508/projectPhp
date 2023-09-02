// Đối tượng 
function Validator(options){

    function getParent(element, selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }

            element = element.parentElement;
        }
    }

    var selectorRule = {};
    // đây là hàm thực hiện validate báo lỗi ra màn hình
    function validate(inputElement, item){
        // GET value: inputElement.value
        // test func: item.test
        var spanElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector)
    //    console.log(123);
        //var errorMessage = item.test(inputElement.value) cách lấy 1 lần 
        var errorMessage;

        // cách 2 lấy cái rules selector
        var items = selectorRule[item.selector]
        // lập qua từng rules và kiếm tra lỗi 
        // nếu có lỗi sẽ dừng kiểm tra 
        for (var i = 0; i < items.length; ++i) {

            switch (inputElement.type) {
                case 'checkbox':
                case 'radio':
                    errorMessage = items[i](
                        elementForm.querySelector(item.selector + ':checked')
                    )
                    
                break
                default:
                    errorMessage = items[i](inputElement.value)
            }

            if(errorMessage) break;
        }

       

        if(errorMessage){
            spanElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid')
        }else{
            spanElement.innerText = ''
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid')

        }

        return !errorMessage;

    }
        // lấy element form 
    var elementForm = document.querySelector(options.form)
        if(elementForm){
            // xử lí khi submit form 
            elementForm.onsubmit = function(event){
                event.preventDefault();

                var isFormValid = true;

                options.rules.forEach(item => {
                    var inputElement = elementForm.querySelector(item.selector)
                    var isValid = validate(inputElement, item)
                        if(!isValid) {
                            isFormValid = false
                        }
                });

              

                    if(isFormValid){
                        // trường hợp submit với javascript
                       if(typeof options.onSubmit === 'function'){
                            var allInputs = elementForm.querySelectorAll('[name]:not([disabled')
                            var formValues = Array.from(allInputs).reduce(function (values, input){
                               switch (input.type){
                               
                                case 'radio':
                                    values[input.name] = elementForm.querySelector('input[name="' + input.name + '"]:checked').value;
                                    break;
                                case 'checkbox':
                                    if(!input.matches(':checked')) {
                                        values[input.name] = '';
                                        return values;
                                    }
                                    if(!Array.isArray(values[input.name])){
                                        values[input.name] = []
                                    }
                                    values[input.name].push(input.value); 
                                    break;

                                    case 'file': 
                                        values[input.name] = input.files;
                                    break;
                                default:
                                    values[input.name] = input.value;
                               }
                                return values
                            }, {})
                            options.onSubmit(formValues)
                       }
                       // trường hợp submit với hành vi mặt định
                       else{
                            elementForm.submit()
                       }
                    }
            }

            // lặp qua mỗi rules và xử lí (lắng nghe sự kiện blur , input ...  )
            options.rules.forEach(item => {

                // lưu lại các rule cho mỗi input
               if(Array.isArray( selectorRule[item.selector])){
                selectorRule[item.selector].push(item.test)
               }else{
                selectorRule[item.selector] = [item.test];
               }

                var inputElements = elementForm.querySelectorAll(item.selector)
                console.log(inputElements);
                    Array.from(inputElements).forEach(function (inputElement){
                        inputElement.onblur = () =>{
                            validate(inputElement, item)
                        }
                        // xử lí khi mỗi khi người dùng nhập xóa bỏ lỗi
                        inputElement.oninput =  function (){
                            var spanElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector)
                            spanElement.innerText = ''
                            getParent(inputElement, options.formGroupSelector).classList.remove('invalid')
                        }

                        inputElement.onchange =  function (){
                            var spanElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector)
                            spanElement.innerText = ''
                            getParent(inputElement, options.formGroupSelector).classList.remove('invalid')
                        }
                    })

                //     if(inputElement){
                //         // xử lí trường hợp blue ra khởi input  
                // }
            }
        );
}

}

// Định nghĩa rules
// nguyên tắc cá rules 
// 1. khi cố lỗi => trả ra message lỗi
// 2. khi hợp lệ => không trả ra gì cả (undefined)
Validator.isRequired = function(selector, message){
    return {
        selector:selector,
        test: function (value){
            return value ? undefined : message || 'Trường này không được bỏ trống'
        }
    }
}

Validator.isEmail = function(selector, message){
    return {
        selector:selector,
        test: function (value){
         var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
             return regex.test(value.trim()) ? undefined : message || 'Trường này phải là email'   
        }
    }
}

Validator.minLength = function (selector, min, message){
    return {
        selector:selector,
        test: function (value){
            return value.length >= min ? undefined :message || `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    }
}

Validator.isConfirmed = function (selector, getConfirmValue, message){
    return {
        selector: selector,
        test: function(value){
            return value === getConfirmValue() ? undefined : message || 'Không khớp với mật khẩu đã nhập';
        }
    }
}