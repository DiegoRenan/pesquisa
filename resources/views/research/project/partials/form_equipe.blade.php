{{--<div class="well">
    <pre>@{{ membro | json }}</pre>
</div>--}}
<div class="row" v-show="projeto.membros.length > 0">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-fw fa-users"></i> Membros da equipe
            </div>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr class="text-center">
                        <td><strong>Nome Completo</strong></td>
                        <td><strong>CPF</strong></td>
                        <td><strong>Titulação</strong></td>
                        <td><strong>Instituição</strong></td>
                        <td><strong>Categoria Funcional</strong></td>
                        <td><strong>CH Semanal</strong></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-repeat="membro:projeto.membros">
                        <td>@{{ membro.nome }}</td>
                        <td>@{{ membro.cpf }}</td>
                        <td>@{{ membro.titulacao }}</td>
                        <td>@{{ membro.instituicao }}</td>
                        <td>@{{ membro.categoria }}</td>
                        <td>@{{ membro.cargaHoraria }}</td>
                        <td>
                            <button class="btn btn-danger" v-on="click:delMembro($event, $index)">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<legend><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Membro</legend>
<div class="row" v-show="!membro.exibir">
    <div class="col-sm-12">
        <form action="#" method="POST" v-on="submit:searchMembro">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="buscar">Buscar Membro pelo CPF</label>
                        <input type="text" name="cpf" class="form-control cpf" v-el="cpf"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row" v-show="membro.exibir">
    <div class="col-sm-12">
        <form action="" v-on="submit:addMembro">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" required="required" class="form-control" v-el="membroNome" v-model="membro.data.nome"/>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" readonly class="form-control" v-model="membro.data.cpf"/>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="titulacao">Titulação</label>
                        {!! Form::select('titulacao', $titles, null, ['class' => 'form-control', 'required', 'v-el' => 'membroTitulo', 'v-model' => 'membro.data.titulacao_id']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="instituicao">Instituição</label>
                        <input type="text" name="instituicao" required="required" class="form-control" v-el="membroInstituicao" v-model="membro.data.instituicao"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="categoria">Categoria Funcional</label>
                        {!! Form::select('categoria', $categories, null, ['class' => 'form-control', 'required', 'v-el' => 'membroCategoria', 'v-model' => 'membro.data.categoria_id']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cargaHoraria">Carga Horária</label>
                        <input type="text" name="cargaHoraria" required="required" class="form-control" v-model="membro.data.cargaHoraria"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-danger" v-on="click:clearMembro"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <a class="btn btn-default btn-sm" href="#div5"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
    </div>

    <div class="col-sm-5">
        <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
    </div>

    <div class="col-sm-2 text-right">
        <a class="btn btn-default btn-sm" href="#div7">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>