@extends('components.paper-dashboard.main')

@section('main')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="toolbar">
                    <!--Here you can write extra buttons/actions for the toolbar-->
                </div>
                <div class="col-lg-12" style="padding-bottom: 50px !important;">
                    <a href="{{ route('user.create') }}">
                        <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New</button>
                    </a>
                </div>
                <div class="fresh-datatables">
                    <table id="datatables" class="table table-bordered" cellspacing="0" width="100%" style="width:100%">
                        <thead style="background-color: #949494;">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       		
                       		@foreach($users as $user)
                       			<tr >
                       				<td>{{ $user->name }}</td>
                       				<td>{{ $user->email }}</td>
                       				<td>{{ $user->created_at->toDateTimeString() }}</td>
                       				<td style="text-align: center; width: 1%; min-width: 200px;">
                       					<a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-primary btn-fill btn-sm"><span class="ti-pencil"></span></a>
                       					<a href="{{ route('user.show', [$user->id]) }}" class="btn btn-default btn-fill btn-sm"><span class="ti-eye"></span></a>
                       					<a href="{{ route('user.destroy', [$user->id]) }}" class="btn btn-danger btn-sm btn-fill ajaxDeleteButton">
								                  <span class="ti-trash"></span>
								                </a>
                       				</td>
                       			</tr>
                       		@endforeach
                       </tbody>
                    </table>
                </div>


            </div>
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
            search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
</script>
@endsection