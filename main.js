const main = document.getElementById("main")

const mainBtn = document.getElementById("main-btn")
const rankBtn = document.getElementById("rank-btn")

const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    iconColor: 'white',
    customClass: {
        popup: 'colored-toast'
    },
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: false
})

function goHome() {
    loadContent("home")
    mainBtn.classList.add("text-white")
    rankBtn.classList.add("text-secondary")
    rankBtn.classList.remove("text-white")
    mainBtn.classList.remove("text-secondary")
}

function goRanking() {
    loadContent("ranking")
    mainBtn.classList.remove("text-white")
    rankBtn.classList.remove("text-secondary")
    rankBtn.classList.add("text-white")
    mainBtn.classList.add("text-secondary")
}

function loadContent(page) {
    $.ajax({
        url: `./${page}.php`,
        type: 'post',
        success: (response) => {
            main.innerHTML = response

            if (page === "ranking") {
                loadRanking()
            }
        }
    })
}

function loadRanking() {
    const toSorter = document.getElementById("toSorter")

    $.ajax({
        url: './sorter.php',
        type: 'post',
        success: (response) => {
            toSorter.innerHTML = response

            $('#sortable').sortable({
                update: function (event, ui) {
                    saveOrder()
                    console.log(event)
                }
            })
        }
    })
}

window.onload = () => {
    goHome()
}

function add() {
    const name = document.getElementById("monsterName")
    const desc = document.getElementById("monsterDesc")
    const file = fileupload.files[0]
    const foto = document.getElementById("fileupload")

    let formData = new FormData()
    formData.append("name", name.value)
    formData.append("desc", desc.value)
    formData.append("photo", file)

    $.ajax({
        url: './add.php',
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => {
            if (response !== "1") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response
                })
            } else {
                Toast.fire({
                    icon: 'success',
                    title: 'Nueva monster añadida'
                })

                name.value = ""
                desc.value = ""
                foto.value = ""
            }
            loadRanking()
        }
    })
}

function saveOrder() {
    const sorter = document.getElementById("sortable")

    let sort = []
    sorter.querySelectorAll("li").forEach(e => {
        sort.push(e.attributes["prodId"].value)
    })
    sort = JSON.stringify(sort)

    let formData = new FormData()
    formData.append("sort", sort)

    $.ajax({
        url: './saveOrder.php',
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
    })
}

function deleteMonster(id) {
    let formData = new FormData()
    formData.append("id", id)

    $.ajax({
        url: './delete.php',
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => loadRanking()
    })
}