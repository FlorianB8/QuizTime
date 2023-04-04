
let idQuiz = document.getElementById('idQuiz')

fetch('../../../controllers/ajax/questions.php?id=' + idQuiz.innerText)
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
                    formQuiz.innerHTML += `<div class=" questionBox col-lg-5 col-10 text-white m-5 p-3 bgDark rounded-3"  > 
                        <p class="textGreen">${question.question}</p> 
                        <hr class="mx-auto w-25">
                        <div id="${cpt}"></div>
                    </div> 
                    `;
                    let divAnswers = document.getElementById(`${cpt}`);
                    answers.forEach(answer => {
                        if (answer.id_questions == question.id) {
                            console.log(answer.id);
                            divAnswers.innerHTML += `<label class="rad-label">
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