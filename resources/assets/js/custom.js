$(document).ready(function() {
    $('textarea.publicacao').summernote({height: 300});

    var campus = $('#campus_id').val();

    if(typeof campus != 'undefined')
    {
        $.get("/researcher/"+campus+"/institutes",
            function (data) {
                var instituto = $('#instituto_id');
                instituto.empty();

                $("#instituto_id").append('<option value="" selected>Selecione o seu Instituto</a>');
                for ($i = 0; $i < data.length; $i++) {
                    $('#instituto_id').append('<option value="' + data[$i].id + '">' + data[$i].name + '</a>');
                }
            }
        );

        $.get("/researcher/"+campus+"/departments",
            function (data) {
                var departamento = $('#departamento_id');
                departamento.empty();

                $("#departamento_id").append('<option value="" selected>Selecione o seu Departamento</a>');
                for ($i = 0; $i < data.length; $i++) {
                    $('#departamento_id').append('<option value="' + data[$i].id + '">' + data[$i].name + '</a>');
                }
            }
        );
    }
});

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

$("#campus_id").change(function(){

    var campus = $(this).val();

    $.get("/researcher/"+campus+"/institutes",
        function (data) {
            var instituto = $('#instituto_id');
            instituto.empty();

            $("#instituto_id").append('<option value="" selected>Selecione o seu Instituto</a>');
            for ($i = 0; $i < data.length; $i++) {
                $('#instituto_id').append('<option value="' + data[$i].id + '">' + data[$i].name + '</a>');
            }
        }
    );

    $.get("/researcher/"+campus+"/departments",
        function (data) {
            var departamento = $('#departamento_id');
            departamento.empty();

            $("#departamento_id").append('<option value="" selected>Selecione o seu Departamento</a>');
            for ($i = 0; $i < data.length; $i++) {
                $('#departamento_id').append('<option value="' + data[$i].id + '">' + data[$i].name + '</a>');
            }
        }
    );
});

/*Loader infinito -----------------------------------------------------------------------------------------------------*/
var timeline = new Vue({
    el: "#timeline",

    data: {
        items: [],
        page: 1,
        searchText: ''
    },

    methods: {
        carrega: function carrega(page) {
            var self = this;
            jQuery.get('/blog/api/feed?page='+self.page).success(function(data) {
                data.forEach(function(item){
                    self.items.push(item);
                });
            });
        },

        doFilter: function(ev, tipo) {
            var self = this;
            self.$set('searchText', tipo);
            window.scrollTo(0,0);
            self.carrega(self.page);
        }
    },

    ready: function() {

        var self = this;

        jQuery.get('/blog/api/feed?page='+self.page).success(function(data) {
            data.forEach(function(item){
                self.items.push(item);
            });
        });
    },
    
    attached: function() {

        var self = this;
        
        $(window).scroll(function() { 

            var top = $(window).scrollTop();
            var current = ($(document).height() - $(window).height());

            if(top == current) {
                self.$set('page', self.page+1);
                self.carrega(self.page)
            }
        })
    },
});

/*---------------------------------------------------------------------------------------------------------------------*/