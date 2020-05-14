@if (Session::has('success-message') || count($errors) > 0||Session::has('warning-message') || Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function(){

        @if (Session::has('success-message'))

            $.notify({
                icon: "ti-check-box",
                message: '{{ session('success-message') }}'
            },{
                type: 'success',
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'center'
                }
            });
        @endif
        @if (Session::has('success'))
            $.notify({
                icon: "ti-check-box",
                message: '{{ session('success') }}'
            },{
                type: 'success',
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'center'
                }
            });
        @endif
        @if (Session::has('warning-message'))

           $.notify({
                icon: "ti-flag-alt",
                message: '{{ session('warning-message') }}'
            },{
                type: 'danger',
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'center'
                }
            });
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)

                $.notify({
                    icon: "ti-flag-alt",
                    message: '{{ $error }}'
                },{
                    type: 'danger',
                    timer: 2000,
                    placement: {
                        from: 'top',
                        align: 'center'
                    }
                });
            @endforeach
        @endif
        });
    </script>
@endif