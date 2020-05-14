@extends('components.paper-dashboard.main')

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content row">
                <div class="col-xs-12">
                    <h6>
                        {{ get_day_type() }} {{ Auth::user()->name }}! Have a nice day.
                    </h6>
                </div>
            </div>
        </div> <!-- end card -->
    </div> <!-- 
</div>
@endsection