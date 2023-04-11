
function searchQuiz() {
    fetch('../../../controllers/ajax/quizzes.php?search=' + search.value + '&limit=' + limit.value + '&offset=' + offset.value)
        .then(response => {
            return (response.json());
        })
        .then(quizzes => {
            list.innerHTML = '';
            quizzes.forEach(quiz => {
                list.innerHTML += `
            <tr class="trDetails text-center">
                <td class=""> ${quiz.quizName} </td>
                <td class=""> ${quiz.categoryName} </td>
                <td class="optionsTable">
                    <a class="mt-2" href="/controllers/dashboardUpdateQuizCtrl.php?id=${quiz.id}"><i class="fa-solid fa-eye"></i></a>
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
                        <a class="btn btn-danger" href="/controllers/dashboardDeleteQuizCtrl.php?id=${quiz.id}">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>`;
            })
        })
}

searchQuiz();
search.addEventListener('keyup', searchQuiz)

limit.addEventListener('change', searchQuiz)