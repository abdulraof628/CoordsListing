@extends('components.paper-dashboard.main')

@section('main')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-semibold">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $list->list_name }}" autocomplete="off" autofocus="" required="" placeholder="e.g. Starbucks @ Mid Valley" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="text-semibold">Address</label>
                            <textarea class="form-control" name="address" readonly="">{{ $list->address }}</textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-semibold">Latitude</label>
                            <input type="text" class="form-control" name="latitude" autocomplete="off" autofocus="" required="" placeholder="e.g. 3.117880" value="{{ $list->latitude }}" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="text-semibold">Longitude</label>
                            <input type="text" class="form-control" name="longitude" autocomplete="off" autofocus="" required="" placeholder="e.g. 101.676749" value="{{ $list->longitude }}" readonly="">
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <a href="{{ route('listing.index') }}" class="btn btn success btn-fill">
                        Back
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection