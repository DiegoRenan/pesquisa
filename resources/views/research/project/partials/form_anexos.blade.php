<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            <!-- Inicio -->
            <div class="panel-body">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Selecionar arquivos...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="documento" data-token="{!! csrf_token() !!}" data-user-id="{{ Auth::user()->id }}">
                </span>
                <br>
                <br>
                <!-- The global progress bar -->
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
                @endif

                <div class="alert alert-success hide" id="upload-success">
                    Upload realizado com sucesso!
                </div>

                <table class="table table-bordered table-striped table-hover" v-show="projeto.anexos.length > 0">
                    <tbody>
                        <tr v-repeat="file:projeto.anexos">
                            <td>@{{ file.nome }}</td>
                            <td class="text-center">
                                <a href="#@{{ file.id }}" class="btn btn-success" title="Fazer download do arquivo: @{{ file.nome }}"><i class="glyphicon glyphicon-download"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="#@{{ file.id }}" class="btn btn-danger" title="Remover o arquivo: @{{ file.nome }}"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Fim -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <a class="btn btn-default btn-sm" href="#div9"><i class="glyphicon glyphicon-chevron-left"> Voltar</i></a>
        </div>

        <div class="col-sm-5">
            <buttom type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Salvar</buttom>
        </div>

        <div class="col-sm-2 text-right">
            <a class="btn btn-default btn-sm" href="#div11">Avançar <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>
</div>