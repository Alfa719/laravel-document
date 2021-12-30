@if (session()->has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" style="background: rgb(56, 221, 226)">
                <button class="close" data-dismiss="alert"><small><strong>x</strong></small></button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif
