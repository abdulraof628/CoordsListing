@extends('components.paper-dashboard.main')

@section('main')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <form action="{{ route('listing.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-semibold">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off" autofocus="" required="" placeholder="e.g. Starbucks @ Mid Valley">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="text-semibold">Address</label>
                                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-semibold">Latitude</label>
                                <input type="text" class="form-control" name="latitude" autocomplete="off" autofocus="" required="" placeholder="e.g. 3.117880" value="{{ old('latitude') }}">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="text-semibold">Longitude</label>
                                <input type="text" class="form-control" name="longitude" autocomplete="off" autofocus="" required="" placeholder="e.g. 101.676749" value="{{ old('longitude') }}">
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('listing.index') }}" class="btn btn success btn-fill">
                            Back
                        </a>
                        <button type="submit" class="btn btn-success btn-fill">Submit <i class="icon-circle-right2"></i></button>

                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection