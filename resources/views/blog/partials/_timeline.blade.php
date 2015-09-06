<div class="panel" ng-app="myapp" ng-controller="ContentController">
    <div class="panel-body">
        <ul class="timeline" infinite-scroll="contents.nextPage()" infinite-scroll-distance='2' infinite-scroll-disabled='contents.busy'>
            <li ng-repeat="content in contents.items">
                <div class="timeline-badge info"></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title"><legend> @{{content.title}}</legend></h4>
                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> Publicado por </small></p>
                    </div>
                    <div class="timeline-body">
                        <p>!</p>
                        <p class="text-right"><a class="btn btn-sm btn-info" href="#"> Abrir </a></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>