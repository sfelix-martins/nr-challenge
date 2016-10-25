<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="/nr-challenge/public/licitacoes/insert">New Bidding</a></li>
				<li><a href="/nr-challenge/public/licitacoes/update">Update Bidding</a></li>
				<li><a href="/nr-challenge/public/licitacoes/delete">Delete Bidding</a></li>
			</ul>
		</nav>
	</header>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
