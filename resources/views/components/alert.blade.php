@if (session('success'))
<div class="row justify-content-end">
    <div class="col-md-4">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span><b> Success - </b> {{ session('success') }}</span>
        </div>
    </div>
</div>
@endif

@if (session('error'))
    <div class="row justify-content-end">
    <div class="col-md-4">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span><b> Error - </b> {{ session('error') }}</span>
        </div>
    </div>
</div>
@endif