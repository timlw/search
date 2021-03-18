<head>
    @livewireScripts
    @livewireStyles
</head>

<style>
	body {
		margin:1% auto !important;
		width:100%;
		display:block;
		text-align:center !important;
	}
</style>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<body>
    @yield('content')
	
	@livewire('products')
</body>