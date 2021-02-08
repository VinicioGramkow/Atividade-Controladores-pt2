<!DOCTYPE html>
<html lang="en">

@include('layout.head')
@include('layout.nav')

<style>
    #form{
        width: 50%;
        margin: 10px auto;
        text-align: center;
    }
    #button{
        width:25%;
        margin: 10px auto;
    }
    #input{
        margin: 5px auto;
        width: 80%;
    }
</style>
<body>

    <form class="form-control" action="{{ route('agenda.store') }}" method="post" id="form">

        <h2 id="titulo">Cadastro de Contato</h2>

        <div class="row">
            @csrf
        </div>
        <div class="row">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="input"  required>
        </div>
        <div class="row">
            <label for="dataNasc">Data de nascimento</label>
            <input type="date" class="form-control" name="dataNasc" id="input">
        </div>
        <div class="row">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="input" required>
        </div>
        <div class="row">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="input" required>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" id="button">Salvar</button>
        </div>
    </form>
</body>
</html>
