<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ZiLong's blog</title>
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Fav-->
<link href="/images/favicon.ico" rel="shortcut icon">

<!--styles-->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">

<!--fonts google-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

@yield('style')

</head>
<body>

	@include('layouts._header')
	<div class="container-fluid" id="container-content">
		<div class="row">
			<div class="article_background" >
				<div class="col-sm-2">

				</div>
				<div class="col-sm-8">

					@yield('content')

				</div>
				<div class="col-sm-2">

				</div>
			</div>
		</div>

	</div>

	@include('layouts._footer')


<script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/main.js" type="text/javascript"></script>


@yield('script')
@yield('back')

</body>
</html>