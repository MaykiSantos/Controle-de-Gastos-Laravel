
<div id="{{$idModal}}" class="modal " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title {{$corTitulo}}"><strong>{{$tituloModal}}</strong></h4>
            </div>
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
                                <option>Salario</option>
                                <option>Investimento</option>
                                <option>Presente</option>
                                <option>Premio</option>
                                <option>Outro</option>
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
                <button type="button" class="btn btn-primary" name="button">Salvar</button>
            </div>
        </div>
    </div>
</div>
