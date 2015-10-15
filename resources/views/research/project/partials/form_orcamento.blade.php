<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive table-bordered">
                <tbody>
                    <tr class="text-center">
                        <td colspan="2">Custeio</td>
                    </tr>
                    <tr>
                        <td>Item</td>
                        <td>Valores em Reais (apenas números)</td>
                    </tr>
                    <tr>
                        <td>(3490-30) Material de Consumo</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.materialConsumo"/></td>
                    </tr>
                    <tr>
                        <td>(3490-36) Serviços de Terceiros - Pessoa Física</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.servicosPessoaFisica"/></td>
                    </tr>
                    <tr>
                        <td>(3490-39) Serviços de Terceiros - Pessoa Jurídica</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.servicosPessoaJuridica"/></td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">Capital</td>
                    </tr>
                    <tr>
                        <td>Item</td>
                        <td>Valores em Reais (apenas números)</td>
                    </tr>
                    <tr>
                        <td>(4590-51) Obras e Instalações</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.obrasInstalacoes"/></td>
                    </tr>
                    <tr>
                        <td>(4590-52) Equipamento e Material Permanente</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.equipamentoMaterial"/></td>
                    </tr>
                    <tr>
                        <td>Total Geral</td>
                        <td><input type="text" class="form-control orcamento" v-model="projeto.orcamento.total"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-default btn-sm" href="#div6"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
        </div>

        <div class="col-sm-5">
            <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default btn-sm" href="#div8">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>