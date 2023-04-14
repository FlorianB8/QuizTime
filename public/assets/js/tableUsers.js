function searchUser() {
    fetch('../../../controllers/ajax/users.php?search=' + search.value + '&limit=' + limit.value + '&offset=' + offset.value)
    .then(response => {
        return (response.json());
    })
    .then(users => {
            list.innerHTML = '';
            users.forEach(user => {
                list.innerHTML += `
            <tr class="trDetails text-center">
                <td> ${user.pseudo} </td>
                <td><a href="mailto:${user.email}">${user.email}</a> </td>
                <td class="d- d-lg-block">${user.points} </td>
                <td>${(user.role == 2) ? 'Admin' : 'Joueur'} </td>
                <td class="optionsTable">
                    <a class="mt-2" href="/controllers/dashboardUpdateUserCtrl.php?id=${user.id}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete${user.id}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    
                </td>
            </tr>
        <div class="modal fade" id="delete${user.id}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteLabel">Êtes vous sûr de vouloir supprimer ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="/controllers/dashboardDeleteUserCtrl.php?id=${user.id}">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>`;
            })
        })
}

searchUser();
search.addEventListener('keyup', searchUser)

limit.addEventListener('change', searchUser)