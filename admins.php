
<!DOCTYPE html>
<html lang="ru">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ViceLand RP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ViceLand Role Play</a>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">Главная</a></li>
            <li class="active"><a href="admins.php">Администрация</a></li>
			<li><a href="rich.php">Богачи</a></li>
			<li><a href="cars.php">Транспорт</a></li>
			<li><a href="houses.php">Свободные дома</a></li>
			<li><a href="leaders.php">Лидеры</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Список администрации</h1>
	<div class="row placeholders">
            <?php 
			// определяем начальные данные
			$db_host = 'db1.myarena.ru';
			$db_name = 'vcslon_vcbd';
			$db_username = 'vcslon_jopaslona';
			$db_password = 't9SrSxUn';
			$db_table_to_show = 'accounts';

			// соединяемся с сервером базы данных
			$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
				or die("Could not connect: " . mysql_error());

			// подключаемся к базе данных
			mysql_select_db($db_name, $connect_to_db)
				or die("Could not select DB: " . mysql_error());

			// выбираем все значения из таблицы "student"
			$qr_result = mysql_query("select * from " . $db_table_to_show . " where admin > 0 ORDER BY `adminm` DESC")
				or die(mysql_error());

			// выводим на страницу сайта заголовки HTML-таблицы
			echo '<div class="table-responsive">';
			echo '<table class="table table-striped">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>ID</th>';
			echo '<th>Никнейм</th>';
			echo '<th>Админ Время</th>';
			echo '<th>Уровень админки</th>';
			echo '<th>Посл. заход</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			
		   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
			while($data = mysql_fetch_array($qr_result)){ 
				echo '<tr>';
				echo '<td>' . $data['id'] . '</td>';
				echo '<td>' . $data['nickname'] . '</td>';
				echo '<td>' . $data['adminm'] . '</td>';
				echo '<td>' . $data['admin'] . '</td>';
				echo '<td>' . date("Y-m-d g:i:s a",$data['last']) . '</td>';
				echo '</tr>';
			}
			
			echo '</tbody>';
			echo '</table>';
			echo '</div>';

			// закрываем соединение с сервером  базы данных
			mysql_close($connect_to_db);
		?>
          </div>
      
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
