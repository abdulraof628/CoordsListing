<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{ url('paper-dashboard/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('paper-dashboard/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('paper-dashboard/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ url('paper-dashboard/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="{{ url('paper-dashboard/js/jquery.validate.min.js') }}"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ url('paper-dashboard/js/es6-promise-auto.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ url('paper-dashboard/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ url('paper-dashboard/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ url('paper-dashboard/js/bootstrap-selectpicker.js') }}"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ url('paper-dashboard/js/bootstrap-switch-tags.js') }}"></script>

<!-- Circle Percentage-chart -->
<script src="{{ url('paper-dashboard/js/jquery.easypiechart.min.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ url('paper-dashboard/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ url('paper-dashboard/js/bootstrap-notify.js') }}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ url('paper-dashboard/js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{ url('paper-dashboard/js/jquery-jvectormap.js') }}"></script>

<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

<!-- Wizard Plugin    -->
<script src="{{ url('paper-dashboard/js/jquery.bootstrap.wizard.min.js') }}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ url('paper-dashboard/js/bootstrap-table.js') }}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ url('paper-dashboard/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{ url('paper-dashboard/js/fullcalendar.min.js') }}"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ url('paper-dashboard/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ url('paper-dashboard/js/demo.js') }}"></script>



<!-- GLOBAL SCRIPT -->


<script type="text/javascript">
	$('body').on('click', '.ajaxDeleteButton', function(e){
		e.preventDefault();

		var url = $(this).attr('href');

		swal({
			title: 'Are you sure?',
			text: "This data will not be re-usable!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonClass: 'btn btn-success btn-fill',
			cancelButtonClass: 'btn btn-danger btn-fill',
			confirmButtonText: 'Yes, delete it!',
			buttonsStyling: false
		}).then(function(response) {
			if (response.value) {
				$.ajax({
					url: url,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					type: 'DELETE',
					dataType: 'json',
					success: function (response) {
					console.log(response)
						if(response.status == 'ok') {
							swal({
							    title: "Success!",
							    text: "Data has been deleted.",
							    type: "success",
							    timer: 500,
							    showConfirmButton: false,
							});
							window.location = '{{ request()->url() }}';
						}else{
							swal("Failed!", "Data was unsuccessfully deleted.", "error");
						}
					}
				});
				return false;
			}

		});
	});
</script>