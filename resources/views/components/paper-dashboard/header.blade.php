<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel Test') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->
    <link href="{{ url('paper-dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ url('paper-dashboard/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('paper-dashboard/css/demo.css') }}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="{{ url('fonts&icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('fonts&icons/fonts.googleapis.com.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('paper-dashboard/css/themify-icons.css') }}" rel="stylesheet">
</head>
