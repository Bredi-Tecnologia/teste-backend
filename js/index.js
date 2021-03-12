function criarProduto() {
    let categoria_id

    switch (document.getElementById("categoria").value) {
        case 'Eletrodomesticos':
            categoria_id = 2
            break;
        case 'Celulares':
            categoria_id = 3
            break;
        case 'Alimentos':
            categoria_id = 4
            break;
        case 'Informatica':
            categoria_id = 5
            break;
        default:
            break;
    }
    axios({
        method: 'post',
        url: '/api/createOne.php',
        data: {
            nome: document.getElementById("nome").value,
            categoria_id: categoria_id,
            preço: document.getElementById("preço").value,
        }
    })
        .then(function (response) {
            // console.log(response)
        });

    document.getElementById("nome").value = "";
    document.getElementById("categoria").value = "";
    document.getElementById("preço").value = "";
    listarProdutos();
}

function listarProdutos() {
    axios({
        method: 'get',
        url: '/api/listAll.php',
    })
        .then(function (response) {
            console.log(response.data);
            const tabela = document.getElementById("tabelaProdutos");
            while (tabela.firstChild) {
                tabela.removeChild(tabela.firstChild);
            }

            const celulaBase = document.createElement("div")
            celulaBase.classList.add("celulaBase");

            const p5 = document.createElement("p")
            p5.innerHTML = 'Nome'
            const p6 = document.createElement("p")
            p6.innerHTML = 'Categoria'
            const p7 = document.createElement("p")
            p7.innerHTML = 'Preço'
            const p8 = document.createElement("p")
            p8.innerHTML = 'Id'
            const p9 = document.createElement("p")
            p9.innerHTML = 'Ações'

            celulaBase.appendChild(p5)
            celulaBase.appendChild(p6)
            celulaBase.appendChild(p7)
            celulaBase.appendChild(p8)
            celulaBase.appendChild(p9)

            tabela.appendChild(celulaBase);

            response.data.body.map((atual) => {

                const celula = document.createElement("div")
                celula.classList.add("celula");

                const p1 = document.createElement("p")
                p1.innerHTML = atual.nome

                const p2 = document.createElement("p")
                switch (atual.categoria_id) {
                    case '2':
                        p2.innerHTML = "Eletrodomesticos"
                        break;

                    case '3':
                        p2.innerHTML = "Celulares"
                        break;

                    case '4':
                        p2.innerHTML = "Alimentos"
                        break;

                    case '5':
                        p2.innerHTML = "Informatica"
                        break;

                    default:
                        p2.innerHTML = atual.categoria_id
                        break
                }


                const p3 = document.createElement("p")
                p3.innerHTML = atual.preço

                const p4 = document.createElement("p")
                p4.innerHTML = atual.id

                celula.appendChild(p1)
                celula.appendChild(p2)
                celula.appendChild(p3)
                celula.appendChild(p4)

                const div1 = document.createElement("div")

                const edit = document.createElement("img")
                edit.src = "../public/create_24px_outlined.svg";

                edit.addEventListener('click', function () {
                    editarProduto(atual.id);
                });

                const delet = document.createElement("img")
                delet.src = "../public/delete_24px_outlined.svg"

                delet.addEventListener('click', function () {
                    deletarProduto(atual.id);
                });

                div1.appendChild(edit)
                div1.appendChild(delet)
                celula.appendChild(div1)

                tabela.appendChild(celula);
            })
        });
}

function deletarProduto(id) {
    let exclude = window.confirm('Deseja mesmo excluir esse produto?')
    if (exclude) {
        axios({
            method: 'post',
            url: '/api/deleteOne.php',
            data: {
                id: id,
            }
        })
            .then(function (response) {
                // console.log(response)
            });
    }
    listarProdutos();
}

function editarProduto(id) {

    let nome = prompt("Digite o nome do produto")
    let categoria = prompt("Digite a categoria do produto")
    let preço = prompt("Digite o preço do produto")

    let categoria_id

    switch (categoria) {
        case 'Eletrodomesticos':
            categoria_id = 2
            break;
        case 'Celulares':
            categoria_id = 3
            break;
        case 'Alimentos':
            categoria_id = 4
            break;
        case 'Informatica':
            categoria_id = 5
            break;
        default:
            break;
    }
    axios({
        method: 'post',
        url: '/api/updateOne.php',
        data: {
            id: id,
            nome: nome,
            categoria_id: categoria_id,
            preço: preço,
        }
    })
        .then(function (response) {
            // console.log(response)
        });

    listarProdutos();    
}