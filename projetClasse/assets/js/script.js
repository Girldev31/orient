// Get DOM(document object model) elements and make variables
const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');


//------------------------------Functions-----------------------------//

/*function test() {
    alert(`Quelqu'un a appuye sur submit`);
}*/

/*
test = function() {
    alert(`Quelqu'un a appuye sur submit`);
}*/

// On va faire une fonction qui met la classe error
/**
 * This function is used to show error in an input 
 * @param {*} input represent the name of the input
 * @param {*} message to be displayed
 */
function showError(input, message) {
    //const divParent = input.divParent;
    const divParent = input.parentElement;

    //Add class error in the parent's division
    divParent.className = 'form-control error';

    // je suis sur que tu peux te passer de commentaires ici !
    const small = divParent.querySelector('small');
    //console.dir(small);
    small.innerText = message;
}
/**
 * 
 * @param {*} input 
 */
function showSuccess(input) {
    //const divParent = input.divParent;
    const divParent = input.parentElement;

    //Add class error in the parent's division
    divParent.className = 'form-control success';
}

// To Check if all inputs are informed
function checkRequired(inputArray) {
    inputArray.forEach(function(input) {
        if (input.value.trim() === '') {
            showError(input, `${getInputName(input)} is required`);
        } else {
            showSuccess(input);
        }
    })
}

function getInputName(input) { // return the name of the input from id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}



// Check the lenght of an input

function checkLength(input, min, max) {
    console.log(input.value.length);
    if (input.value.length < min) {
        showError(input, `${getInputName(input)} must be at least ${min} character`);
    } else {
        if (input.value.length > max) {
            showError(input, `${getInputName(input)} must be at most ${max} character`);
        } else {
            showSuccess(input);
        }
    }
}

function checkInputsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, "Password do not match");
    }
}

function checkEmail(input) {
    //const re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input, 'email bi bakhoul');
    }
}
//------------------------------Events------------------------------//
form.addEventListener('submit', function(e) {
    e.preventDefault(); // Block the submission of the form
    // verify login
    // === compare type et valeur
    /*
        On avait fait juste pour username
    if(username.value === '')
    {
        //alert(`Boul ma yabb diokhel le login`);
        showError(username,'Heyyyyyy li lane la ? da ngua goumba ?');
    }
    else
    {
        showSuccess(username);
    }*/
    checkRequired([username, email, password, password2]);

    checkLength(username, 6, 20);
    checkLength(password, 8, 32);
    checkInputsMatch(password, password2);
    checkEmail(email);

});

// Rechercher arrow functions