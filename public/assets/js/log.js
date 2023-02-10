// Récupération des inputs des 2 formulaires
let pseudoRegister = document.getElementById('pseudoRegister');
let mailRegister = document.getElementById('mailRegister'); 
let passwordRegister = document.getElementById('passwordRegister');
let passwordConfirmRegister = document.getElementById('passwordConfirmRegister');
let pseudoLogin = document.getElementById('pseudoLogin');
let passwordLogin = document.getElementById('passwordLogin');
// -------------------------------------------

// Récupération de chaque message d'erreur
let errorPseudo = document.getElementById('errorPseudo');
let errorNullPseudo = document.getElementById('errorNullPseudo');
let errorNullMail = document.getElementById('errorNullMail');
let errorNullPassword = document.getElementById('errorNullPassword');
let errorNullPasswordConfirm = document.getElementById('errorNullPasswordConfirm');
let errorEmail = document.getElementById('errorEmail');
let errorPassword = document.getElementById('errorPassword');
let errorPasswordConfirm = document.getElementById('errorPasswordConfirm');
let errorPasswordMatch = document.getElementById('errorPasswordMatch');
// -------------------------------------------

// REGEX pour chaque input
let regexPseudo = /^((?!\.)[\w]*[^-^$°@\/~%*:;!,[}{()}\]'=+&#".])$/g;
let regexMail = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/g;
let regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/gm;
// -------------------------------------------


// pseudoRegister.addEventListener('change', () => {
//     if(pseudoRegister.value == ""){
//         errorNullPseudo.removeAttribute('hidden');
//     }else {
//         errorNullPseudo.setAttribute('hidden', '');
//     }
//     if (!pseudoRegister.value.match(regexPseudo) && !pseudoRegister.value == ""){
//         errorPseudo.removeAttribute('hidden');
//     } else {
//         errorPseudo.setAttribute('hidden', '');
//     }
// });

// mailRegister.addEventListener('change', () => {
//     if(mailRegister.value == ""){
//         errorNullMail.removeAttribute('hidden');
//     }else {
//         errorNullMail.setAttribute('hidden', '');
//     }
//     if (!mailRegister.value.match(regexMail) && !mailRegister.value == ""){
//         errorEmail.removeAttribute('hidden');
//     } else {
//         errorEmail.setAttribute('hidden', '');
//     }
// });

// passwordRegister.addEventListener('change', () => {
//     if(passwordRegister.value == ""){
//         errorNullPassword.removeAttribute('hidden');
//     }else {
//         errorNullPassword.setAttribute('hidden', '');
//     }
//     if (!passwordRegister.value.match(regexPassword) && !passwordRegister.value == ""){
//         errorPassword.removeAttribute('hidden');
//     } else {
//         errorPassword.setAttribute('hidden', '');
//     }
// });
// passwordConfirmRegister.addEventListener('change', () => {
//     if(passwordConfirmRegister.value !== passwordRegister.value){
//         errorPasswordMatch.removeAttribute('hidden');
//     }else {
//         errorPasswordMatch.setAttribute('hidden', '');
//     }
//     if(passwordConfirmRegister.value == ""){
//         errorPasswordMatch.setAttribute('hidden', '');
//     }
// });



// SWITCH LOGIN REGISTER
let divRegister = document.getElementById('register');
let divLogin = document.getElementById('login');
let btnRegisterSwitch = document.getElementById('btnReg');
let btnLoginSwitch = document.getElementById('btnLog');
console.log(btnLoginSwitch, btnRegisterSwitch);

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
