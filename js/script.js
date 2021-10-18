/*function mascaraCnpj(input){
    const numCnpj = input.value.replace(/\D/g, "")

    numCnpj.replace(/^(\d{2})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5")

    input.value.replace(numCnpj)

    const vetMask = mascara.split("")
    const numCnpj = input.value.replace(/\D/g, "")
    const cursor = Number(input.selectionStart)
    const tecla = (window.event) ? event.keyCode : event.which

    for(let i=0; i<numCnpj.length; i++) {
        vetMask.splice(vetMask.indexOf("#"), 1, numCnpj[i])
    }

    input.value = vetMask.join("")

    if(tecla != 37 && (cursor == 2 || cursor == 6 || cursor == 10 || cursor == 15)) {
        input.setSelectionRange(cursor+1, cursor+1)
    } else {
        input.setSelectionRange(cursor, cursor)
    }

}*/


const masks = {
    cpf (value) {
        return value
        .replace(/\D/g, "")
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})/, '$1-$2')
        .replace(/(\d{2})\d+?$/, '$1')
    },

    cnpj (value) {
        return value
        .replace(/\D/g, '')
        .replace(/(\d{2})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1/$2')
        .replace(/(\d{4})(\d)/, '$1-$2')
        .replace(/(-\d{2})\d+?$/, '$1')
    },

    phone (value) {
        return value
        .replace(/\D/g, '')
        .replace(/(\d{2})(\d)/, '($1) $2')
        .replace(/(\d{4})(\d)/, '$1-$2')
        .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
        .replace(/(-\d{4})\d+?$/, '$1')
    },

    cep (value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{3})\d+?$/, '$1')
    },

    pis (value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{5})(\d)/, '$1.$2')
            .replace(/(\d{5}\.)(\d{2})(\d)/, '$1$2-$3')
            .replace(/(-\d)\d+?$/, '$1')
    },

    valor (value) {
        return value
           // .replace(/\D/g, '')
            .replace(/(\d+)/, '$1')
            .replace(/(,\d{2})\d+?$/, '$1')
    }

   /* valor (value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$2,$1')
            .replace(/(,\d+)/, '$1')
    }*/
}
/*
const fields = document.querySelectorAll("[required]")

function validadeField(field){
    //logica para verificar se existem erros
    function verifyErrors(){
        let foundError = false;

        for(let error in field.validity){
            // se não for customError
            // então verifica se tem erro
            if(field.validity[error] && !field.validity){
                foundError = error
            }
        }

        return foundError;
    }

    function customMessage(typeError){
        const messages = {
            text: {
                valueMissing: "Por favor, preencha este campo"
            },
            email: {
                valueMissing: "Email é obrigatório",
                typeMismatch: "Por favor, preencha um email válido"
            }
        }

        return messages[field.type][typeError]
    }

    function setCustomMessage(message = "Campo Obrigatório"){
        const spanError = field.parentNode.querySelector("span.error")

        if(message){
            spanError.classList.add("active")
            spanError.innerHTML = message
        } else {
            spanError.classList.remove("active")
            spanError.innerHTML = ""
        }
    }

    return function(){

        const error = verifyErrors()

        if(error){
            const message = customMessage(error)

            field.style.borderColor = "red"
            setCustomMessage(message)
        } else {
            field.style.borderColor = "green"
            setCustomMessage()
        }
    }
}

// console.log(fields)

function customValidation(event) {


    const field = event.target
    const validation = validadeField(field)

    validation()


}


for(field of fields){
    field.addEventListener("invalid", event => {
        // eliminar o bubble
        event.preventDefault()

        customValidation(event)
    })
    field.addEventListener("blur", customValidation)
}
*/


document.querySelectorAll('input').forEach((input) => {
    const field = input.dataset.js;

    input.addEventListener('input', (e) => {
        e.target.value = masks[field](e.target.value)
    })
})
/*
document.querySelector("form").addEventListener("submit", event => {
    console.log("enviar o formulário")

    // não vai enviar o formulário
    event.preventDefault()
})
*/

// Somente numeros, pontos e virgula
function somenteNumeros(e){
    var tecla = (window.event) ? event.keyCode : e.which

    if(tecla == 44 || tecla == 46 || tecla > 47 && tecla < 58)
    {
        return true;
    } else {
        if(tecla == 8 || tecla== 0){
            return true;
        }else {
            return false;
        }
    }
}


// jQuery
/*$(document).ready(function () {
    $("select[name='empresa']").change(function () {
        var $honorario = $("input[name='honorario']");
        var empresa = $(this).val();
      // var empresa = this.value;
        alert(empresa);

        $.getJSON('php/proc_select_empresa.php', {empresa},
        function(retorno){
            $honorario.val(retorno.honorario);
        })
    })
})*/