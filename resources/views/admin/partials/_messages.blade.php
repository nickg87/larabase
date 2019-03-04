@if (Session::has('success'))

    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endif

@if (Session::has('warning'))


    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Warning</span>
        {{Session::get('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if (Session::has('error'))
    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Warning</span>
        {{Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif