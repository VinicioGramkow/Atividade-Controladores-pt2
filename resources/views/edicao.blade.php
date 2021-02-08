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

    <form class="form-control" action="{{ route('agenda.update', $contato['id']) }}" method="post" id="form">

        <h2 id="titulo">Edição de Contato</h2>

        <div class="row">
            @csrf
            @method('PUT')
        </div>
        <div class="row">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="input" value="{{ $contato['nome'] }}" required>
        </div>
        <div class="row">
            <label for="dataNasc">Data de nascimento</label>
            <input type="date" class="form-control" name="dataNasc" id="input" value="{{ $contato['dataNasc'] }}">
        </div>
        <div class="row">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="input" value="{{ $contato['celular'] }}" required>
        </div>
        <div class="row">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="input" value="{{ $contato['telefone'] }}" required>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" id="button">Salvar</button>
        </div>
    </form>
</body>
</html>
