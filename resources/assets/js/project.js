/**
 * Created by vinicius on 07/10/15.
 */
var app = new Vue({
    el: "#app",

    data : {
        form: '',
        projeto: {
            dadosPessoais: {
                nome: "Vinicius Fernandes Brito",
                matricula: "200811722003",
                cpf: "022.181.461-26",
                rg: "1960244-8 SSP MT",
                dataNasc: "19/04/1989",
                endereco: {
                    cep: "78600000",
                    rua: "Rua 27",
                    numero: "74",
                    complemento: "Prox Escadaria",
                    bairro: "Santo Antonio",
                    cidade: "Barra do Garças",
                    uf: "MT",

                },
                fone: "6634014730",
                celular: "6699317500",
                fax: "6634014730",
                email: "vinicius.fernandes.brito@gmail.complemento",
                categoria: "ALUNO",
                titulacao: "GRADUADO"
            },
            localTrabalho: {
                unidade: "Campus Universitário do Araguaia",
                fone: "6634014730",
                regime: "ALUNO"
            },
            enquadramento: {},
            caracterizacao: "",
            objetivos: "",
            metodologia: "",
            equipe: {},
            orcamento: {},
            cronograma: {},
            referencias: "",
            anexos: {}
        }
    },

    methods: {
        doNext: function(ev, form) {
            this.$set('form', form);
        }
    },

    attached: function() {
        var self = this;
        jQuery("#cep").mask("0000-000");
        jQuery(".telefone").mask("(00) 0000-0000");

        jQuery(window).on('hashchange', function(){
            self.$set('form', window.location.hash);
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
