<div id="{{$idModal}}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title {{$corTitulo}}"><strong>{{$tituloModal}}</strong></h4>
            </div>
            <form action="{{$linkRequisicao}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-7 mt-3">
                            <div class="row">
                                <div class="input-group input-group-lg">
                                    <select class="form-control" id="mes" name="mes">
                                        <option selected>Selecionar Mês...</option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">/</span>
                                    </div>

                                    <select class="form-control" id="ano" name="ano">
                                        <option selected>Selecionar Ano...</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mx-4 text-danger"><small>* Caso o mês já tenha sido criado ele não será substituido.</small></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="button">Fechar</button>
                    <button type="submit" class="btn btn-primary" name="button">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
