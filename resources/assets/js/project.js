/**
 * Created by vinicius on 07/10/15.
 */

$('#removerModal').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

    /* Pass form reference to modal for submission on yes/ok */
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});
/* Form confirm (yes/ok) handler, submits form */
$('#removerModal').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});

//jQuery('textarea.publicacao').summernote({height: 300});

Vue.http.headers.common['X-CSRF-TOKEN'] = jQuery('meta[name=csrf-token]').attr('content');

var app = new Vue({
    el: "#app",

    data : {
        form: '',
        projeto: '',
        membro: {
            data: {
                idMembro: '',
                nome_membro: '',
                cpf: '',
                instituicao: '',
                titulacao_id: '',
                titulacao: '',
                categoria_id: '',
                categoria: '',
                cargaHoraria: ''
            },
            exibir: false
        },
        atividade: {
            nome: '',
            anos: []
        },
        gruposPesquisa: [],
        novoGrupo: {
            name: '',
            error: false
        },
        subAreas: [],
        convenios: [],
        novoConvenio: {
            nome: '',
            error: false
        },
        financiadores: [],
        novoFinanciador: {
            nome: '',
            error: false
        },
        palavraChave: {
            "idPalavra": null,
            "palavra": ''
        },
        response: {'show': false,"error": false, "msg":[]}
    },

    methods: {

        doPost: function() {
            jQuery('#loading').modal('toggle');

            var self = this;

            self.$http.post('/researcher/project/api/save', self.projeto, function(data){
                self.alerta(false, {'msg': ['Projeto salvo com sucesso!']});
                self.$set('projeto', data);
                window.location.pathname = '/researcher/project/'+data.idProjeto+'/edit';
                jQuery('#loading').modal('toggle');

            }).error(function(data) {
                self.alerta(true, data);
                jQuery('#loading').modal('toggle');
            });
        },

        doClean: function() {
            jQuery(this.$$.nomeAtividade).val('');
            jQuery('input:checkbox').removeAttr('checked');
        },

        remAtividade: function(ev, index) {
            this.projeto.cronograma.$remove(index);
        },

        transforma: function(i) {
            if(i == '1')
                return 'glyphicon glyphicon-ok';
            else
                return 'glyphicon glyphicon-remove';
        },

        addAtividade: function(ev) {
            ev.preventDefault();
            var self = this, qt = 0, aux = '', j = 1;
            var auxD = self.projeto.projetoDatas.duracao;
            var auxA =  moment(self.projeto.projetoDatas.dataInicio).get('year');
            var i =  moment(self.projeto.projetoDatas.dataInicio).get('month')+1;
            var nome = self.$$.nomeAtividade.value;
            self.atividade.nome = nome;
            while(j <= auxD) {
                for(i; i <= 12; i++) {
                    if(j > auxD)
                        break;
                    if(jQuery('#ck-'+j).is(':checked'))
                        aux += '1';
                    else
                        aux += '0';
                    j++;
                }
                self.atividade.anos.push({'ano':auxA, 'meses':aux});
                aux = ''; i = 1; auxA++; qt++;
            }
            //add atividade ao atividades
            self.projeto.cronograma.push(jQuery.extend({}, self.atividade));
            //limpando atividade
            self.atividade.nome = '';
            self.atividade.anos = [];
            self.doClean();
            self.$$.nomeAtividade.focus();
        },

        createFormCronograma: function(ev, di, du) {
            var mes = new Array('AA','jan','fev','mar','abr','mai','jun','jul','ago','set','out', 'nov', 'dez');

            if(di == '' || du == '')
                return;

            var dataInicial = moment(di);
            var dataAux = moment(di);
            var duracao = du;

            var self = this, y, m, texto, aux = true, i = 1;

            var dataFinal = moment(dataInicial).add(duracao, 'months');

            divMeses = self.$$.meses;

            jQuery(divMeses).empty();



            while(aux) {
                y = dataAux.get('year');
                texto = '<tr class="text-center"><td>'+y+'</td>';
                do
                {
                    m = mes[dataAux.get('month')+1];
                    texto += '<td><b>'+m+'</b><br/><input type="checkbox" name="'+y+'_'+m+'" id="ck-'+i+'"/><br/>Mês '+i+'</td>';
                    dataAux.add(1, 'month');
                    i++;
                    if(dataFinal.isSame(dataAux, 'month')) {
                        m = 'dez';
                        aux = false;
                    }
                } while(m != 'dez');
                texto += '</tr>';
                jQuery(divMeses).append(texto);
            }
        },

        searchMembro: function(ev) {
            ev.preventDefault();
            var self = this;
            var cpf = self.$$.cpf;
            if(cpf.value.length == 14) {
                self.$http.post('/researcher/project/api/membro/search', {'cpf': cpf.value}, function(data){
                    self.$set('membro', data);
                    cpf.value = '';
                    if(data.data.nome_membro != '') {
                        jQuery(self.$$.membroNome).prop('readonly', true);
                        jQuery(self.$$.membroInstituicao).prop('readonly', true);
                        jQuery(self.$$.membroTitulo).prop('disabled', true);
                        jQuery(self.$$.membroCategoria).prop('disabled', true);
                        jQuery(self.$$.membroCargaH).focus();
                    }
                });
            }
            else {
                console.log('CPF inválido');
            }
        },

        delMembro: function(ev, index) {
            this.projeto.membros.$remove(index);
        },

        addMembro: function(ev) {
            ev.preventDefault();
            var self = this;
            if(self.membro.data.idMembro == '') {
                self.$http.post('/researcher/project/api/membro/save', self.membro.data, function(response){
                    self.membro.$set('data', response.data);
                    self.projeto.membros.push(jQuery.extend({}, self.membro.data));
                });
            }
            else
                self.projeto.membros.push(jQuery.extend({}, self.membro.data));
            self.clearMembro(ev);
        },

        clearMembro: function(ev) {
            ev.preventDefault();
            this.membro.exibir = false;
            this.membro.data.idMembro = '';
            this.membro.data.nome = '';
            this.membro.data.cpf = '';
            this.membro.data.titulacao_id = '';
            this.membro.data.instituicao = '';
            this.membro.data.categoria_id = '';
            this.membro.data.cargaHoraria = '';
            jQuery(this.$$.membroNome).removeProp('readonly');
            jQuery(this.$$.membroInstituicao).removeProp('readonly');
            jQuery(this.$$.membroTitulo).removeProp('disabled');
            jQuery(this.$$.membroCategoria).removeProp('disabled');
        },

        doNext: function(ev, form) {
            this.$set('form', form);
        },

        getGruposPesquisa: function() {
            var self = this;
            self.$http.get('/researcher/project/api/groups', function(data){
                self.$set('gruposPesquisa', data);
            });
        },

        addGrupoPesquisa: function(ev) {
            ev.preventDefault();
            var self = this;
            self.$http.post('/researcher/grupopesquisa', self.novoGrupo, function(){
                self.getGruposPesquisa();
                self.novoGrupo.$set('error', false);
                self.novoGrupo.$set('name', '');
                jQuery('#newGroup').modal('toggle');
            }).error(function(){
                self.novoGrupo.$set('error', true);
            });
        },

        cancelGrupoPesquisa: function() {
            var self = this;
            self.novoGrupo.$set('error', false);
            self.novoGrupo.$set('name', '');
            jQuery('#newGroup').modal('toggle');
        },

        addFinanciador: function(ev) {
            ev.preventDefault();
            var self = this;
            self.$http.post('/researcher/project/api/financiador', self.novoFinanciador, function(){
                self.getFinanciadores();
                self.novoFinanciador.$set('error', false);
                self.novoFinanciador.$set('nome', '');
                jQuery('#newFinanciador').modal('toggle');
            }).error(function(){
                self.novoFinanciador.$set('error', true);
            });
        },

        cancelFinanciador: function() {
            var self = this;
            self.novoFinanciador.$set('error', false);
            self.novoFinanciador.$set('nome', '');
            jQuery('#newFinanciador').modal('toggle');
        },

        getFinanciadores: function() {
            var self = this;
            self.$http.get('/researcher/project/api/financiadores', function(data){
                self.$set('financiadores', data);
            });
        },

        addConvenio: function(ev) {
            ev.preventDefault();
            var self = this;
            self.$http.post('/researcher/project/api/convenio', self.novoConvenio, function(){
                self.getConvenios();
                self.novoConvenio.$set('error', false);
                self.novoConvenio.$set('nome', '');
                jQuery('#newConvenio').modal('toggle');
            }).error(function(){
                self.novoConvenio.$set('error', true);
            });
        },

        cancelConvenio: function() {
            var self = this;
            self.novoConvenio.$set('error', false);
            self.novoConvenio.$set('nome', '');
            jQuery('#newConvenio').modal('toggle');
        },

        getConvenios: function() {
            var self = this;
            self.$http.get('/researcher/project/api/convenios', function(data){
                self.$set('convenios', data);
            });
        },

        remAnexo: function(ev,index) {
            ev.preventDefault();
            var self = this, anexo = this.projeto.anexos[index];
            self.$http.delete('/researcher/project/api/anexos/'+anexo.idAnexo, function(data) {
                this.projeto.anexos.$remove(index);
            });
        },

        addPalavra: function(ev) {
            ev.preventDefault();
            var self = this;
            self.projeto.palavrasChave.push(jQuery.extend({}, self.palavraChave));
            self.palavraChave.palavra = '';
        },

        remPalavra: function(ev, index) {
            ev.preventDefault();
            var self = this, palavra = this.projeto.palavrasChave[index];
            jQuery('#close-palavra-'+index).html('<i class="fa fa-refresh fa-spin"></i>');
            if(palavra.idPalavra == null) {
                this.projeto.palavrasChave.$remove(index);
            }
            else {
                self.$http.delete('/researcher/project/api/palavra/'+palavra.idPalavra, function(data) {
                    self.projeto.palavrasChave.$remove(index);
                }).error(function() {
                    jQuery('#close-palavra-'+index).html('&times;');
                });
            }
        },

        alerta: function(error, msg) {
            var self = this;
            self.response.$set('error', error);
            self.response.$set('msg', msg);
            self.response.$set('show', true);
            if(!self.response.error)
                setTimeout(function(){ self.response.$set('show', false);}, 5000);
        }
    },

    ready: function() {
        var self = this, url;
        /* Abrindo o loading */
       // jQuery('#loading').modal('toggle');

        /* Verificando se eh novo projeto ou edicao de projeto */
        var param = window.location.pathname.split( '/' )[3];
        if(param == 'create') {
            url = '/researcher/project/api/dados';
        } else {
            url = '/researcher/project/api/dados/'+param;
        }

        /* buscando dados de grupos de pesquisa do pesquiasdor, covenios e financiadores cadastrados */
        self.getGruposPesquisa();
        self.getConvenios();
        self.getFinanciadores();

        /* Buscando a URL */
        self.$http.get(url, function(data){
            /* Adicionando os dados retornados */
            self.$set('projeto', data);

            /* Preparando o formulario de cronograma */
            self.createFormCronograma(null, self.projeto.projetoDatas.dataInicio, self.projeto.projetoDatas.duracao);

            /* Fechando o loading */
            //jQuery('#loading').modal('toggle');

            /*Upload Anexos Projeto*/
            var fileUpload = jQuery('#fileupload');
            fileUpload.fileupload({
                url: '/researcher/project/api/anexos/upload',
                dataType: 'json',
                formData: {
                    _token: jQuery('meta[name=csrf-token]').attr('content'),
                    userId: fileUpload.data('userId'),
                    projetoId: self.projeto.idProjeto
                },
                done: function (e, data) {
                    self.projeto.anexos.push(data.result);
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    jQuery('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
            /* Fim do upload de anexos */

        });
    },

    attached: function() {
        var self = this;
        jQuery("#cep").mask("0000-000");
        jQuery(".telefone").mask("(00) 0000-0000");
        jQuery(".cpf").mask("000.000.000-00");

        jQuery(window).on('hashchange', function() {
            self.$set('form', window.location.hash);
            window.scrollTo(0,0);
        });

        if(self.projeto.idProjeto == null){
            self.$set('form', '#div2');
            window.location.hash = '#div2';
        }
        else if(window.location.hash === '') {
            self.$set('form', '#div1');
            window.location.hash = '#div1';
        }
        else {
            self.$set('form', window.location.hash);
        }
    }
});