// Récupération des inputs des 2 formulaires
let pseudoRegister = document.getElementById('pseudoRegister');
let emailRegister = document.getElementById('emailRegister'); 
let passwordRegister = document.getElementById('passwordRegister');
let passwordConfirmRegister = document.getElementById('passwordConfirmRegister');
let pseudoLogin = document.getElementById('pseudoLogin');
let passwordLogin = document.getElementById('passwordLogin');
// -------------------------------------------
// Récupération des labels
let labelPseudo = document.getElementById('labelPseudo');
let labelEmail = document.getElementById('labelEmail'); 
let labelPassword = document.getElementById('labelPassword');
let labelPasswordConfirm = document.getElementById('labelPasswordConfirm');


// -----------------------------

// Récupération de chaque message d'erreur
let errorPseudo = document.getElementById('errorPseudo');
let errorEmail = document.getElementById('errorEmail');
let errorPassword = document.getElementById('errorPassword');
// -------------------------------------------

// REGEX pour chaque input
let regexPseudo = /^[a-zA-ZÀ-ÿ0-9\' -]{2,64}$/g;
let regexMail = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/g;
let regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/gm;
// -------------------------------------------

if(errorEmail.innerText !== ''){
    emailRegister.classList.add('redBorder');
    labelEmail.classList.add('textRed');
    labelEmail.classList.toggle('textGreen');
} 
if(errorPseudo.innerText !== ''){
    pseudoRegister.classList.add('redBorder');
    labelPseudo.classList.add('textRed');
    labelPseudo.classList.toggle('textGreen');
} 
if(errorPassword.innerText !== ''){
    passwordRegister.classList.add('redBorder');
    passwordConfirmRegister.classList.add('redBorder');
    labelPassword.classList.add('textRed');
    labelPassword.classList.toggle('textGreen');
    labelPasswordConfirm.classList.add('textRed');
    labelPasswordConfirm.classList.toggle('textGreen');
} 


// SWITCH LOGIN REGISTER
let divRegister = document.getElementById('register');
let divLogin = document.getElementById('login');
let btnRegisterSwitch = document.getElementById('btnReg');
let btnLoginSwitch = document.getElementById('btnLog');

btnLoginSwitch.addEventListener('click', () => {
    if(divLogin.hasAttribute('hidden')){
        divLogin.removeAttribute('hidden');
        btnLoginSwitch.classList.toggle('btnLogin');
        btnRegisterSwitch.classList.toggle('btnRegister');
        btnRegisterSwitch.classList.toggle('btnActiveRegister');
        btnLoginSwitch.classList.toggle('btnActiveLogin');
        if(!divRegister.hasAttribute('hidden')){
            divRegister.setAttribute('hidden','')
        }
    }
})
    
btnRegisterSwitch.addEventListener('click', () => {
    if(divRegister.hasAttribute('hidden')){
        divRegister.removeAttribute('hidden');
        btnLoginSwitch.classList.toggle('btnLogin');
        btnRegisterSwitch.classList.toggle('btnRegister');
        btnRegisterSwitch.classList.toggle('btnActiveRegister');
        btnLoginSwitch.classList.toggle('btnActiveLogin');
        if(!divLogin.hasAttribute('hidden')){
            divLogin.setAttribute('hidden','')
        }
    }
})
