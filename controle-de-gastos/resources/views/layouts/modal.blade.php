<div id="{{$idModal}}" class="modal " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title {{$corTitulo}}"><strong>{{$tituloModal}}</strong></h4>
            </div>
            <form action="{{$linkRequisicao}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Valor</span>
                                </div>
                                <input type="number" min="0" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Categoria</span>
                                </div>
                                <select class="form-control" name="">
                                    <option selected>Selecione uma categoria...</option>
                                    @foreach($categorias as $categoria)
                                    <option>{{$categoria->categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descrição</span>
                                </div>
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="button">Fechar</button>
                    <button type="submit" class="btn btn-primary" name="button">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
