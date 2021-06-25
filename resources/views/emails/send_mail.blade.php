<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{session('msg')}}
    <form action="send-email" method="POST">
    	@csrf
        <label>Title</label>
        <input type="text" class="form-control" name="title">
        <label>Message</label>
        <textarea class="form-control" name="body"></textarea>
        <label>From</label>
        <input type="text" class="form-control" name="from">
        <input type="submit" name="submit">
    </form>
</body>
</html>