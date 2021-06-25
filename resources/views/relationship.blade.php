<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @foreach($get_products as $g)
    <p>{{$g->product_name}}</p>
    <p>{{$g->categories->category_name}}</p>
    @endforeach
</body>
</html>