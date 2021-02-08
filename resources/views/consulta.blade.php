<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
    @include('layout.nav')

<style>
    #table, #p{
        width: 70%;
        text-align: center;
        margin: auto;
    }
</style>
<body>

    @if ($agenda == null)
        <p id="p">Não há contatos para mostrar!</p>
    @else
        <table class='table table-striped' id="table">
            <th>Código</th>
            <th style='width:60%;'>Nome</th>
            <th></th>
            <p hidden> {{ asort($agenda) }}</p>
            @foreach ($agenda as $contato)
                <tr>
                    <td>{{ $contato['id']}}</td>
                    <td>{{ $contato['nome']}}</td>
                    <td>
                        <a class='btn btn-success' href="{{ route('agenda.show', $contato['id']) }}" role='button'>Detalhar</a>
                        <a class='btn btn-warning' href="{{ route('agenda.edit', $contato['id']) }}" role='button'>Editar</a>
                        <form action="{{ route('agenda.destroy', $contato['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="this.parentNode.submit();">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

</body>
</html>
