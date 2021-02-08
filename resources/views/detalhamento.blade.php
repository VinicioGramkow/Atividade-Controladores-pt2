<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
    @include('layout.nav')

<style>
    #form{
        width: 70%;
        text-align: center;
        margin: auto;
    }
    #input{
        margin: 5px auto;
        width: 80%;
    }
</style>
<body>

    <form class="form-control" action="{{ route('agenda.update', $contato['id']) }}" method="post" id="form">

        <h2 id="titulo">Contato</h2>

        <div class="row">
            @csrf
            @method('PUT')
        </div>
        <div class="row">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="input" value="{{ $contato['nome'] }}" disabled>
        </div>
        <div class="row">
            <label for="dataNasc">Data de nascimento</label>
            <input type="date" class="form-control" name="dataNasc" id="input" value="{{ $contato['dataNasc'] }}" disabled>
        </div>
        <div class="row">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="input" value="{{ $contato['celular'] }}" disabled>
        </div>
        <div class="row">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="input" value="{{ $contato['telefone'] }}" disabled>
        </div>

    </form>

</body>
</html>
