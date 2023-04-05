
function searchQuestions() {
    console.log(search.value, limit.value, offset.value);
    fetch('../../../controllers/ajax/questionAnswer.php?search=' + search.value + '&limit=' + limit.value + '&offset=' + offset.value)
        .then(response => {
            return (response.json());
        })
        .then(questions => {
            list.innerHTML = '';
            questions.forEach(question => {
                list.innerHTML += `
            <tr class="trDetails text-center">
                <td> ${question.question} </td>
                <td> ${question.points} </td>
                <td> ${question.correct} </td>
                <td> ${question.name} </td>
                <td class="optionsTable">
                    <a class="mt-2" href="/controllers/dashboardUpdateQuestionAnswerCtrl.php?id=${question.id}"><i class="fa-solid fa-eye"></i></a>
                    <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    
                </td>
            </tr>
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteLabel">Êtes vous sûr de vouloir supprimer ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="/controllers/dashboardDeleteQuestionAnswerCtrl.php?id=${question.id}">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>`;
            })
        })
}

searchQuestions();
search.addEventListener('keyup', searchQuestions)

limit.addEventListener('change', searchQuestions)