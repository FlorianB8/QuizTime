
let idQuiz = document.getElementById('idQuiz')

fetch('../../../controllers/ajax/questions.php?id=' + idQuiz.value)
    .then(responseQuestions => {
        return (responseQuestions.json());
    })
    .then(questions => {
        fetch('../../../controllers/ajax/answers.php')
            .then(responseAnswers => {
                return (responseAnswers.json());
            })
            .then(answers => {
                var cpt = 1;
                questions.forEach(question => {
                    formQuiz.innerHTML += `
                            <div class=" fadeIn questionBox col-lg-5 col-10 text-white m-5 p-3 bgDark rounded-3"  > 
                                <p class="textGreen">${question.question}</p> 
                                <hr class="mx-auto w-25">
                                <div id="${cpt}"></div>
                            </div> 
                    `;
                    let divAnswers = document.getElementById(`${cpt}`);
                    answers.forEach(answer => {
                        if (answer.id_questions == question.id) {
                            divAnswers.innerHTML += `
                                <label class="rad-label">
                                <input class="rad-input" id="answer${answer.id}" type="radio" name="answer${cpt}" value="${answer.choice}.${question.id}">
                                <div class="rad-design"></div>
                                <div class="rad-text">${answer.answer}</div>
                            `

                        }
                    });
                    cpt++;
                })
                formQuiz.innerHTML += `<input class="btnLog text-dark" type="submit" value="Valider">`
            })
    })


fetch('../../../controllers/ajax/addComment.php')
    .then(responseComments => {
        return (responseComments.json());
    })
    .then(comments => {
        allComments.innerHTML = '';
        comments.forEach(comment => {
            if (comment.validated_at != null) {

                allComments.innerHTML += `
                <div class="col-12 flex-column align-items-start d-flex my-5">
                    <h4 class="ms-3">Auteur : ${comment.pseudo}</h4>
                    <p class="mx-auto">"${comment.content}"</p>
                    <hr class="w-50 mx-auto">
                </div> `
            }
        })
    })

btnComment.addEventListener('click', () => {
    if (content.value == '') {
        var error = '<p class="text-danger">Veuillez renseigner un commentaire<p>'
        errorMessage.innerHTML += error;
    } else {
        fetch('../../../controllers/ajax/addComment.php?content=' + content.value + '&idQuiz=' + idQuiz.value)
            .then(responseComments => {
                return (responseComments.json());
            })
            .then(comments => {
                errorMessage.innerHTML = '<p class="text-success">Commentaire envoyé, il est en cours de validation<p>';
                allComments.innerHTML = '';
                comments.forEach(comment => {

                    if (comment.validated_at != null) {
                        allComments.innerHTML += `
                        <div class="col-12 flex-column align-items-start d-flex my-5">
                            <h4 class="ms-3">Auteur : ${comment.pseudo}</h4>
                            <p class="mx-auto">"${comment.content}"</p>
                            <hr class="w-50 mx-auto">
                        </div> `
                    }
                })
            })
    }

})