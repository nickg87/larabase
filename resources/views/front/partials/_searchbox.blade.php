<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search this site</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
        {!! Form::open(['route' => 'search', 'class'=>'form-a','role'=>'search' ]) !!}
        <form class="form-a" action="/search" method="POST" >
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        {{Form::text('q', null, array('class'=>'form-control form-control-lg form-control-a','required'=>'','minlength'=>'3','maxlength'=>'255','placeholder'=>(isset($keyword) && !empty($keyword))?$keyword:'what to search for..'))}}
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<!--/ Form Search End /-->