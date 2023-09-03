@extends('layouts.master')
@section('title', 'Produtos')

@section('content')

<!-- Modal -->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('produtos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nm_produto">Nome do Produto</label>
                    <input type="text" name="nm_produto" id="nm_produto" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vl_compra">Valor de Compra</label>
                    <input type="number" name="vl_compra" id="vl_compra" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vl_venda">Valor de Venda</label>
                    <input type="number" name="vl_venda" id="vl_venda" class="form-control">
                </div>
                <div class="form-group">
                    <label for="id_produto_grupo">Grupo de Produto</label>
                    <select name="id_produto_grupo" id="id_produto_grupo" class="form-control">
                        @foreach($produtoGrupos as $grupo)
                            <option value="{{ $grupo->id_produto_grupo }}">{{ $grupo->nm_produto_grupo }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('cadastroProdutoForm').submit();">Salvar</button>
        </div>
      </div>
    </div>
  </div>


<div class="container mt-5">
    <h1>Listagem de Produtos</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">
        Adicionar Produto
    </button>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Valor de Compra</th>
                <th>Valor de Venda</th>
                <th>Grupo de Produto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id_produto }}</td>
                <td>{{ $produto->nm_produto }}</td>
                <td>{{ 'R$ ' . number_format($produto->vl_compra, 2, ',', '.') }}</td>
                <td>{{ 'R$ ' . number_format($produto->vl_venda, 2, ',', '.') }}</td>
                <td>{{ $produto->produtoGrupo->nm_produto_grupo }}</td>
                <td>
                    <a href="" class="btn btn-primary">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id_produto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
