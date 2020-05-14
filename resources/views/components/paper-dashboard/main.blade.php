<!doctype html>
<html lang="en">

@include('components.paper-dashboard.header')

<body>
	<div class="wrapper">

	@include('components.paper-dashboard.sidebar')

	    <div class="main-panel">
			@include('components.paper-dashboard.navbar')

	        <div class="content">
	            <div class="container-fluid">
	                @yield('main')
                </div>
	        </div>
			@include('components.paper-dashboard.footer')
	    </div>
	</div>
</body>

@include('components.paper-dashboard.script')
@include('components.paper-dashboard.notify')
	

@yield('script')

</html>
