<style>
    #sortable {
        list-style: none;
        padding-left: 0;
    }

    #sortable li {
        cursor: grab;
    }

    #sortable li:active {
        cursor: grabbing;
    }

    #sortable img {
        height: 70px;
        width: 70px;
        object-fit: contain;
    }

    #sortable i {
        color: black;
    }

    #sortable .card-body {
        justify-content: space-between;
        display: flex;
        align-items: center;
    }

    #sortable .card-body .left {
        display: flex;
        align-items: center;
        gap: 1rem
    }
</style>

<section class="py-5 container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMonsterForm">
        Agregar <i class="fa-solid fa-plus"></i>
    </button>
</section>

<div class="modal fade" id="addMonsterForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Monster</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="monsterName" class="form-label">Monster</label>
                    <input type="text" class="form-control" id="monsterName" placeholder="Mango loco..."
                        maxlength="128">
                </div>
                <div class="mb-3">
                    <label for="monsterDesc" class="form-label">Descripción del contexto</label>
                    <textarea class="form-control" id="monsterDesc" rows="3"
                        placeholder="Consumida por primera vez el 3 de enero de 2023, Buenos aires, Argentina. 100 Pesos"
                        maxlength="256"></textarea>
                </div>
                <label for="fileupload" class="form-label">Foto</label>
                <input type="file" class="form-control" id="fileupload">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="add()" data-bs-dismiss="modal" data-bs-target="#addMonsterForm">Guardar</button>
            </div>
        </div>
    </div>
</div>

<section class="py-5 container" id="toSorter">
</section>