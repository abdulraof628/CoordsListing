@extends('components.paper-dashboard.main')

@section('main')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-semibold">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" autofocus="" required="" placeholder="e.g. email@example.com">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="text-semibold">Name</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required="" placeholder="e.g. Carol Pearson" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-md-6">


                            <div class="form-group">
                                <label class="text-semibold">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="off" autofocus="" required="" placeholder="e.g. password123" value="">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="text-semibold">Password</label>
                                <input type="password" class="form-control" name="password_confirmation" autocomplete="off" autofocus="" required="" placeholder="e.g. password123" value="">
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