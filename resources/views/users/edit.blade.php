@extends('components.paper-dashboard.main')

@section('main')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <form action="{{ route('user.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf      
                    @method('put')      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-semibold">Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" autocomplete="off" autofocus="" required="" placeholder="e.g. email@example.com" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="text-semibold">Name</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required="" placeholder="e.g. Carol Pearson" value="{{ $user->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('user.index') }}" class="btn btn success btn-fill">
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