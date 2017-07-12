<?php
	require_once 'Model/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="js/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<meta charset="utf-8"></meta>
</head>
<body>
	<div class="wrapper">
		<div class="inner">
			<div class="wrap__header" id="wrap__header">
				<div class="header">
					<ul class="header__menu">
						<li class="menu__item"><a href="index.php">Музеи</a><span></span></li>
						<li class="menu__item"><a href="excursion.php">Экскурсии</a><span></span></li>
						<li class="menu__item"><a href="staff.php">Сотрудники</a><span></span></li>
						<li class="menu__item"><a>О нас</a><span></span></li>
					</ul>
				</div>
				<div class="wrap__header__black-back"></div>
				<div class="wrap__header__text">
					Kharkow <br> museums
				</div>
				<div class="mouse" id="mouse">
					<span></span>
				</div>
				
			</div>	
			<div class="content" id="content">
			<div class="wrap__search">
				<p class="checkbox__mus_filter">
      				<input type="checkbox" id="test5" />
      				<label for="test5">Filter</label>
    			</p>
				<div class="input-field search__mus_name">
		          <input id="search_mus_by_name" type="text" class="validate">
		          <label for="search_mus_by_name">Type name of the museum</label>
		        </div>
		        <a class="waves-effect waves-light btn order_by_mus_name" id="order_by_mus_name">Order by name</a>
		    </div>  

			<!--ALL MUSEUMS-->
		    <div class="wrap__museums__all" id="wrap__museums__all1">  
				<?php 
					$sql_data = mysqli_query($conn, "SELECT id, name, description, img_catalog, img_filename FROM museum");
				?>
				<?php while($row = mysqli_fetch_assoc($sql_data)): ?>
					<div class="museums__wrap" id="museums__wrap">
						<div class="museums__number">№ <?=$row['id'];?></div>
						<div class="image__wrap">
							<img src="<?=$row['img_filename'];?>" alt="" class="image__img">
						</div>
						<div class="museum__aside">	
							<div class="museum__name"><?=$row['name']; ?></div>
							<div class="museum__description"><?=$row['description']; ?></div>
							<div class="museum__buttons">
								<div onclick="open_get_update(<?=$row['id']; ?>);" class="buttons__change musbut">Изменить</div>
								<div onclick="delete_post(<?=$row['id']; ?>);" class="buttons__delete musbut">Удалить</div>
							</div>
						</div>
						<div class="staff__wrap">
							<div class="staff__inner">
								<div class="staff__title">STAFF</div>
								<table class="staff__table">
									<tr>
										<td>Имя:</td>
										<td>Фамилия:</td>
										<td>Отчество:</td>
										<td>Телефон:</td>
										<td>Похвалы:</td>
										<td>Выговоры:</td>
										<td>Логин:</td>
										<td>Пароль:</td>
										<td>id музея:</td>
									</tr>
									<?php $sql_data2 = mysqli_query($conn, "SELECT * FROM staff WHERE id_mus = {$row['id']}"); ?>
									<?php while($row2 = mysqli_fetch_assoc($sql_data2)): ?>
										<tr>
											<td><?=$row2['name_s']; ?></td>
											<td><?=$row2['surname']; ?></td>
											<td><?=$row2['sursurname']; ?></td>
											<td><?=$row2['telephone']; ?></td>
											<td><?=$row2['praise']; ?></td>
											<td><?=$row2['rebuke']; ?></td>
											<td><?=$row2['login']; ?></td>
											<td><?=$row2['password']; ?></td>
											<td><?=$row2['id_mus']; ?></td>
										</tr>
									<?php endwhile; ?>
									

								</table>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

			<!-- ORDERED MUSEUMS -->
			<div class="wrap__museums__ordered" id="wrap__museums__ordered1">  
				<?php 
					$sql_data = mysqli_query($conn, "SELECT id, name, description, img_catalog, img_filename FROM museum ORDER BY name");
				?>
				<?php while($row = mysqli_fetch_assoc($sql_data)): ?>
					<div class="museums__wrap">
					<div class="museums__number">№ <?=$row['id'];?></div>
						<div class="image__wrap">
							<img src="<?=$row['img_filename'];?>" alt="" class="image__img">
						</div>
						<div class="museum__aside">	
							<div class="museum__name"><?=$row['name']; ?></div>
							<div class="museum__description"><?=$row['description']; ?></div>
							<div class="museum__buttons">
								<div onclick="open_get_update(<?=$row['id']; ?>);" class="buttons__change musbut">Изменить</div>
								<div onclick="delete_post(<?=$row['id']; ?>);" class="buttons__delete musbut">Удалить</div>
							</div>
						</div>	
						<div class="staff__wrap">
							<div class="staff__inner">
								<div class="staff__title">STAFF</div>
								<table class="staff__table">
									<tr>
										<td>Имя:</td>
										<td>Фамилия:</td>
										<td>Отчество:</td>
										<td>Телефон:</td>
										<td>Похвалы:</td>
										<td>Выговоры:</td>
										<td>Логин:</td>
										<td>Пароль:</td>
										<td>id музея:</td>
									</tr>
									<?php $sql_data2 = mysqli_query($conn, "SELECT * FROM staff WHERE id_mus = {$row['id']}"); ?>
									<?php while($row2 = mysqli_fetch_assoc($sql_data2)): ?>
										<tr>
											<td><?=$row2['name_s']; ?></td>
											<td><?=$row2['surname']; ?></td>
											<td><?=$row2['sursurname']; ?></td>
											<td><?=$row2['telephone']; ?></td>
											<td><?=$row2['praise']; ?></td>
											<td><?=$row2['rebuke']; ?></td>
											<td><?=$row2['login']; ?></td>
											<td><?=$row2['password']; ?></td>
											<td><?=$row2['id_mus']; ?></td>
										</tr>
									<?php endwhile; ?>
									

								</table>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>	

			<div class="add-mus_button" id="open__mus__modal">ADD</div>

			</div>
		</div>
	</div>






<!-- ADD MUSEUM MODAL -->
<div class="modal__add-museum" id="modal__add-museum">
	<div class="add-museum__inner">
		<div class="add-museum__inner__name">New museum</div>
		<form onsubmit="return false;" class="add-museum__form">
			<div class="form__mus-name__txt">NAME</div>
			<input name="nameOfMuseum" type="text" class="mus-name" id="input__museum__name">
			<div class="form__mus-descr__txt">DESCRIPTION</div>
			<textarea name="discritionMuseum" class="mus-descr" id="input__museum__description"></textarea>
			<div class="file-field input-field">
		      <div class="btn">
		        <span>File</span>
		        <input type="file" id="mus__img__file" name="user_img">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate"  type="text" placeholder="Upload one or more files" id="mus__img__input">
		      </div>
    		</div>
			<button onclick='add_post();' type="submit" class="addMuseum__but" id="addMuseum__but">ADD</button>
		</form>
		<div class="close__modal" id="close__museum__modal">
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</div>
</div>
<!-- CHANGE MUSEUM MODAL -->
<div class="modal__add-museum2" id="modal__add-museum2">
	<div class="add-museum__inner">
		<div class="add-museum__inner__name">Update museum</div>
		<form onsubmit="return false;" class="add-museum__form">
			<div class="form__mus-name__txt">NAME</div>
			<input name="nameOfMuseum" type="text" class="mus-name" id="input__museum__name2">
			<div class="form__mus-descr__txt">DESCRIPTION</div>
			<textarea name="discritionMuseum" class="mus-descr" id="input__museum__description2"></textarea>
			<div class="file-field input-field">
		      <div class="btn">
		        <span>File</span>
		        <input type="file" multiple>
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text" placeholder="Upload one or more files" id="mus__img__input">
		      </div>
    		</div>
			<button type="submit" class="addMuseum__but" id="addMuseum__but2">UPDATE</button>
		</form>
		<div class="close__modal" id="close__museum__modal2">
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>