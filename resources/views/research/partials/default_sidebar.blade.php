<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="{{ route('researcher.dashboard') }}">Área do Pesquisador</a></li>
        <li><a href="{{ route('researcher.researcher.edit', 1) }}">Editar meu Cadastro</a></li>
        <li><a href="{{ route('researcher.grupopesquisa.index') }}">Meus Grupos de Pesquisa</a></li>
        <li><a href="{{ route('researcher.password.edit') }}">Alterar minha Senha</a></li>
    </ul>

    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">Projetos</a></li>
        <li><a href="#">Meus Projetos de Pesquisa Cadastrados</a></li>
        <li><a href="{{ route('project.create') }}">Cadastrar Projeto de Pesquisa</a></li>
        <li><a href="#">Relatórios de Projeto de Pesquisa</a></li>
        <li><a href="#">Relatorias <span class="badge">2</span></a></li>
    </ul>
</div>