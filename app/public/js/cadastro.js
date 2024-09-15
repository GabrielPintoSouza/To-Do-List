document.addEventListener('DOMContentLoaded', () => {
    const btnCadastro = document.getElementById('cadastrar-usuario');
    btnCadastro.addEventListener('click', cadastrar);
});

function cadastrar(ev) {
    ev.preventDefault();
    const dados = pegarInformacoes();

    if (dados.senha !== dados.confirmacaoSenha) {
        alert('Senhas distintas.');
        return;
    }

    const URL = "http://localhost/To-Do-List/app/controller/control.php";
    fetch(URL,
        {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dados)
        }
    ).then(response => {
        if(response.status >= 400){
            alert('Erro ao cadastrar o usuário: '+response.status);
            return
        }

        alert('Usuário cadastrado com sucesso!');
    }).catch(err => console.error(err));
}

function pegarInformacoes() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmacaoSenha = document.getElementById('senha-confirm').value;

    return {
        nome: nome,
        email: email,
        senha: senha,
        confirmacaoSenha: confirmacaoSenha
    };
}