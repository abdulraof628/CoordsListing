<div class="sidebar"  data-active-color="danger">
<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->
	<div class="logo">
		<a href="{{ url('/') }}" class="simple-text logo-normal text-center">
			{{ env('APP_NAME', 'Laravel Test') }}
		</a>
	</div>
	<div class="sidebar-wrapper">
        
        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : ''  }}">
                <a href="{{ route('home') }}">
                    <i class="ti-desktop"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('user') ? 'active' : ''  }}">
                <a href="{{ route('user.index') }}">
                    <i class="ti-user"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="{{ Request::is('listing*') ? 'active' : ''  }}">
                <a href="{{ route('listing.index') }}">
                    <i class="ti-list"></i>
                    <p>Listing</p>
                </a>
            </li>
        </ul>
	</div>
</div>