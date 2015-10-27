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

/*jQuery('textarea.publicacao').summernote({height: 300});*/

Vue.http.headers.common['X-CSRF-TOKEN'] = jQuery('meta[name=csrf-token]').attr('content');

var app = new Vue({
    el: "#app",

    data : {
        form: '',
        projeto: '',
        membro: {
            data: {
                idMembro: '',
                nome: '',
                cpf: '',
                titulacao_id: '',
                instituicao: '',
                categoria_id: '',
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
        }
    },

    methods: {

        doPost: function() {
            jQuery('#loading').modal('toggle');
            var self = this;
            self.$http.post('/researcher/project/api/save', self.projeto, function(data){
                this.$set('projeto', data);
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

            dataFinal = moment(dataInicial).add(duracao, 'months');

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
                    if(dataFinal.isSame(dataAux)) {
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
                    if(data.data.nome != '') {
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
                var member = {
                    nome_membro: self.membro.data.nome,
                    cpf: self.membro.data.cpf,
                    instituicao: self.membro.data.instituicao,
                    titulacao_id: self.membro.data.titulacao_id,
                    categoria_id: self.membro.data.categoria_id
                }
                self.$http.post('/researcher/project/api/membro/save', member, function(data){
                    self.membro.data.idMembro = data.data.idMembro;
                    //console.log(data.data.idMembro);
                });
            }
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
        }
    },

    ready: function() {
        var self = this;
        jQuery('#loading').modal('toggle');
        self.$http.get('/researcher/project/api/dados', function(data){
            self.$set('projeto', data)
            self.createFormCronograma(null, self.projeto.projetoDatas.dataInicio, self.projeto.projetoDatas.duracao);
            self.getGruposPesquisa();
            jQuery('#loading').modal('toggle');
        });
    },

    attached: function() {
        var self = this;
        jQuery("#cep").mask("0000-000");
        jQuery(".telefone").mask("(00) 0000-0000");
        jQuery(".cpf").mask("000.000.000-00");

        jQuery(window).on('hashchange', function(){
            self.$set('form', window.location.hash);
            window.scrollTo(0,0);
        });

        if(window.location.hash === '') {
            self.$set('form', '#div1');
            window.location.hash = '#div1';
        }
        else {
            self.$set('form', window.location.hash);
        }
    }
});
