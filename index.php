<?php 
include 'dbconnect.php';
include 'main.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width,initial-scale=1"> 
		<title>Только для друзей</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Заметки и планы 32 летних ...</h1>
			<div class="test">В разработке !</div>
			<?php
			foreach (($arr_paginator[$_GET["page"] - 1]) as $row) {?>
				<div class="note">
					<p>
						<span class="date"><?=$row['date']?></span>
						<span class="name"><?=$row['name']?></span>
					</p>
					<p class="text"><?=$row['text']?></p>
				</div>	
			<?php }?>

				<div class="info alert alert-info <?=$send?'':'none'?>"  >
					Запись успешно сохранена!
				</div>
			<div>
				<nav>
				  <ul class="pagination">
					<li class="<?=$_GET['page'] == 1?'disabled':''?>">
						<a <?=$_GET['page'] == 1?'':('href="?page=' . ($_GET['page'] - 1) . '"')?> aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<?php $page_start = 0;
					$page_end = 0;
					$number_pages = count(array_keys($arr_paginator));
					foreach (array_keys($arr_paginator) as $key => $value) {
						if (($key + 4) == $_GET['page']) { 
							if ($page_start === 0) {?>
								<li ><a href="?page=1">1</a></li>								 	
							<?php $page_start++;
							}
						} elseif (($key + 4) < $_GET['page']) {
							if ($page_start === 0) {?>
								<li ><a href="?page=1">1</a></li>
								<li ><a>...</a></li>
							<?php $page_start++;  
							}
						}
							 if ( ($key + 4) > $_GET['page'] && ($key - 2) < $_GET['page']) { ?>
						<li class="<?=(($key + 1) == $_GET['page'])?'active':'';?>"><a href="<?='?page='.($key + 1)?>"><?=$key + 1?></a></li>
					<?php }
						if (($key - 2) == $_GET['page'] && $number_pages == ($_GET['page'] + 3)) { 
							if ($page_end === 0) {?>
								<li ><a href="<?='?page=' . $number_pages?>"><?=$number_pages?></a></li>								 	
							<?php $page_end++;
							}
						} elseif (($key - 2) > $_GET['page']) {
							if ($page_end === 0) {?>
								<li ><a>...</a></li>
								<li ><a href="<?='?page=' . $number_pages?>"><?=$number_pages?></a></li>
							<?php $page_end++;  
							}
						}} ?>
					<li class="<?=$_GET['page'] == $number_pages?'disabled':''?>">
						<a <?=$_GET['page'] == $number_pages?'':'href="?page=' . ($_GET['page'] + 1) . '"'?> aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				  </ul>
				</nav>
			</div>
			
			<div id="form">
				<form action="" method="POST" id="form-post" >
					<input class="form-control" name="name" placeholder="Ваше имя" value="<?=$_COOKIE['name']??''?>" required>
					<textarea class="form-control" name="text" placeholder="Ваш ответ" id='text' tabindex="1" required></textarea>
					<input type="hidden" name="date" value="<?=date('d.m.Y H:i:s');?>">
					<input type="submit" class="btn btn-info btn-block" value="Отправить">
				</form>
			</div>
		</div>
		<script src="js/backend.js"></script>
	</body>
</html>


