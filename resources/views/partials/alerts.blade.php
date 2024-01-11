
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if (session('success'))
            <div class= "alert alert-success">
                    {{session('success')}}
            </div>
                @endif
                <div class="col-lg-2"></div>
        </div>
        </div>
    </div>