<div class="row">
    <div class="col-sm-12">
        <form action="#" metho="GET" v-on="submit:addAtividade">
            <div class="form-group">
                <label for="nomeAtividade">Atividade</label>
                <input name="nomeAtividade" class="form-control" autofocus required v-el="nomeAtividade"/>
            </div>
            <table id="meses" v-el="meses" class="table table-responsive table-bordered"></table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                <button type="reset" class="btn btn-danger" v-on="click:doClean"><i class="glyphicon glyphicon-remove"></i> Limpar</button>
            </div>
        </form>
    </div>
</div>

<div class="row" v-show="projeto.cronograma.length > 0">
    <div class="col-sm-12">
        <legend>Atividades Cadastradas</legend>
        <div id="exibir" class="panel panel-default">
            <table class="table table-responsive table-bordered">
                <tbody v-repeat="item:projeto.cronograma">
                <tr>
                    <td class="text-center"><button class="btn btn-xs btn-danger" v-on="click:remAtividade($event, $index)"><i class="glyphicon glyphicon-trash"></i></button></td><td colspan="12">@{{ item.nome | uppercase }}</td>
                </tr>
                <tr class="text-center" v-repeat="ano:item.anos">
                    <td>@{{ ano.ano }}</td>
                    <td v-repeat="i:ano.meses"><i class="@{{ transforma(i) }}"></i></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <a class="btn btn-default btn-sm" href="#div7"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
    </div>

    <div class="col-sm-5">
        <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default btn-sm" href="#div9">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>
