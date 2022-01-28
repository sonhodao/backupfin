    <html><head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-language" content="vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thông báo lỗi 404</title>
    <meta name="description" content="">
	<meta name="robots" content="noindex,nofollow">
    <meta name="keywords" content="404">
    <meta name="news_keywords" content="404">
    <meta name="revisit-after" content="1 days">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            height: 100vh;
            overflow: hidden;
            font-family: 'Roboto', sans-serif;
            width: 100%;
            margin: 0;
        }
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            width: 100%;
        }
        .btn-404 {
            text-decoration: none;
            color: #ffffff;
            display: inline-block;
            padding: 8px 20px;
            background-color: #000000;
            border-radius: 8px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            line-height: 18px;
        }
        .image-404 {
            max-height: 350px;
            margin-bottom: 20px;
            width: 100%;
        }
		.holder-text {
			margin-bottom: 20px;
			font-size: 18px;
			line-height: 24px;
		}
    </style>
</head>
<body>
    <div class="container">
		<div class="holder-text">Nội dung này đã bị gỡ hoặc không tồn tại</div>
        <div class="holder-img"><img src="{{ asset('theme/assets/images/4041.gif') }}" alt="" class="image-404"></div>
        <a href="/" title="Trang chủ" class="btn-404">Quay về trang chủ</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        pic = new Array(
            '<img src="{{ asset('theme/assets/images/404.png') }}" alt="" class="image-404">',
            '<img src="{{ asset('theme/assets/images/4041.gif') }}" alt="" class="image-404">',
            '<img src="{{ asset('theme/assets/images/4042.png') }}" alt="" class="image-404">',
            '<img src="{{ asset('theme/assets/images/4043.png') }}" alt="" class="image-404">',
        );
        n = Math.floor(Math.random() * 4);

        $(".holder-img").html(pic[n]);
    </script>

</body></html>

