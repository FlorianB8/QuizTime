function searchCategory() {
    fetch('../../../controllers/ajax/categories.php?search=' + search.value + '&limit=' + limit.value + '&offset=' + offset.value)
    .then(response => {
        return (response.json());
    })
    .then(categories => {
            list.innerHTML = '';
            categories.forEach(category => {
                list.innerHTML += `
            <tr class="trDetails text-center">
                <td> ${category.name} </td>
                <td class="d-md-"><i class="${category.icon}"> </i> </td>
                <td class="optionsTable">
                    <a class="mt-2" href="/controllers/dashboardUpdateCategoryCtrl.php?id=${category.id}"><i class="fa-solid fa-eye"></i></a>
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
                        <a class="btn btn-danger" href="/controllers/dashboardDeleteCategoryCtrl.php?id=${category.id}">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>`;
            })
        })
}

searchCategory();
search.addEventListener('keyup', searchCategory)

limit.addEventListener('change', searchCategory)