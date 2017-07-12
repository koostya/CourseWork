<?php
	require_once 'Model/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8"></meta>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="js/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="staff__body">
	<div class="wrapper wrapper__staff">
		<div class="inner inner__staff">
			<div class="wrap__header wrap__header__staff" id="wrap__header">
				<div class="header">
					<ul class="header__menu">
						<li class="menu__item"><a href="index.php">Музеи</a><span></span></li>
						<li class="menu__item"><a href="excursion.php">Экскурсии</a><span></span></li>
						<li class="menu__item"><a href="staff.php">Сотрудники</a><span></span></li>
						<li class="menu__item"><a>О нас</a><span></span></li>
					</ul>
				</div>
			</div>
			<div class="staff__wrap staff__wrapper" id="print__staff">
				<div class="staff__inner">
					<div class="staff__title">STAFF</div>
					<table class="staff__table">
						<tr>
							<td>ID:</td>
							<td>Имя:</td>
							<td>Фамилия:</td>
							<td>Отчество:</td>
							<td>Телефон:</td>
							<td>Похвалы:</td>
							<td>Выговоры:</td>
							<td>Логин:</td>
							<td>Пароль:</td>
							<td>id музея:</td>
							<td>Штраф:</td>
						</tr>
						<?php $sql_data2 = mysqli_query($conn, "SELECT * FROM staff WHERE 1"); ?>
						<?php while($row2 = mysqli_fetch_assoc($sql_data2)): ?>
							<tr class="staff__tr__colored" ondblclick="open_get_update__staff(<?=$row2['id']; ?>);">
								<td class="id_staff"><?=$row2['id']; ?></td>
								<td class="staff__name"><?=$row2['name_s']; ?></td>
								<td class="staff__surname"><?=$row2['surname']; ?></td>
								<td class="staff__sursurname"><?=$row2['sursurname']; ?></td>
								<td class="staff__telephone"><?=$row2['telephone']; ?></td>
								<td class="staff__praise"><?=$row2['praise']; ?></td>
								<td class="staff__rebuke"><?=$row2['rebuke']; ?></td>
								<td class="staff__login"><?=$row2['login']; ?></td>
								<td class="staff__password"><?=$row2['password']; ?></td>
								<td class="staff__id_mus"><?=$row2['id_mus']; ?></td>
								<td class="staff__pay"></td>
							</tr>
						<?php endwhile; ?>
					</table>
				</div>
			</div>
			<div class="staff__but__wrap">
				<div class="staff__but__add" id="staff__add__but">
					ADD
				</div>
				<div class="staff__but__delete" id="staff__delete__but">
					DELETE
				</div>
				<div class="staff__but__print" id="staff__but__print">
					PRINT
				</div>
			</div>
			<div class="chart__staff__wrap" style="width: 600px; height: 400px; margin: 100px auto; position: relative; display: block;">
				<canvas id="myChart"></canvas>
			</div>
			<div class="chart__staff__wrap" style="width: 300px; height: 400px; margin: -130px auto; position: relative; display: block;">
				<canvas id="myChart2"></canvas>
			</div>
			<div class="chart__staff__wrap" style="width: 600px; height: 400px; margin: 100px auto; position: relative; display: block;">
				<canvas id="myChart3"></canvas>
			</div>
		</div>
	</div>	



<!-- ADD STAFF MODAL -->
	<div class="modal__add-museum modal__add-staff" id="modal__add-staff">
	<div class="add-museum__inner add-staff__inner">
		<div class="add-museum__inner__name">New staff</div>
		<form onsubmit="return false;" class="add-museum__form add-staff__form">
		<div class="name__wrap">
			<div class="form__mus-name__txt form__staff-name__txt">NAME</div>
			<input name="nameOfMuseum" type="text" class="mus-name staff-name" id="input__museum__staff__name">
		</div>	
		<div class="name__wrap">
			<div class="form__mus-name__txt">SURNAME</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__surname">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">SURSURNAME</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__sursurname">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">TELEPHONE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__telephone">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">PRAISE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__praise">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">REBUKE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__rebuke">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">LOGIN</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__login">
		</div>	
		<div class="name__wrap">
			<div class="form__mus-name__txt">PASSWORD</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__password">
		</div>
		<div class="name__wrap form__last__div" id="form__last__div">
			<div class="form__mus-name__txt">MUSEUM NUMBER</div>
			<!-- <input name="" type="text" class="mus-name staff-name" id="input__museum__staff__id_mus"> -->
			
		<div class="input-field col s12 selection">
		    <select id='number__of__museum__staff'>
		      <option value="" disabled selected>Choose museum</option>
		      <?php $sql_data3 = mysqli_query($conn, "SELECT * FROM museum WHERE 1"); ?>
		      <?php while($row3 = mysqli_fetch_assoc($sql_data3)): ?>
		      <option value="<?=$row3[id]?>"><?=$row3[id]?></option>
		      <?php endwhile;?>
		    </select>
		  </div>
		</div>
			<button onclick='add_post_staff();' type="submit" class="addMuseum__but" id="addStaff__but_modal">ADD</button>

			<div class="recomended__museums">
				<div class="recommended__title">RECOMENDED MUSEUMS</div>
				<?php $sql_data4 = mysqli_query($conn, "SELECT id
FROM ( SELECT museum.id, COUNT( * ) AS c FROM museum LEFT JOIN staff ON staff.id_mus = museum.id GROUP BY museum.id ) AS avgs1 WHERE c < (  SELECT AVG( c )  FROM ( SELECT museum.id, COUNT( * ) AS c FROM museum LEFT JOIN staff ON staff.id_mus = museum.id GROUP BY museum.id ) AS avgs2 )"); ?>
		      	<?php while($row4 = mysqli_fetch_assoc($sql_data4)): ?>
					<div class="museum__wrap__number"><?=$row4[id]?></div>
				<?php endwhile;?>
			</div>

		</form>
		<div class="close__modal" id="close__staff__modal">
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</div>
</div>

<!-- UPDATE STAFF MODAL -->
<div class="modal__add-museum modal__update-staff" id="modal__update-staff">
	<div class="add-museum__inner add-staff__inner">
		<div class="add-museum__inner__name">Update staff</div>
		<form onsubmit="return false;" class="add-museum__form add-staff__form">
		<div class="name__wrap">
			<div class="form__mus-name__txt form__staff-name__txt">NAME</div>
			<input name="nameOfMuseum" type="text" class="mus-name staff-name" id="input__museum__staff__name2">
		</div>	
		<div class="name__wrap">
			<div class="form__mus-name__txt">SURNAME</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__surname2">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">SURSURNAME</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__sursurname2">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">TELEPHONE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__telephone2">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">PRAISE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__praise2">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">REBUKE</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__rebuke2">
		</div>
		<div class="name__wrap">
			<div class="form__mus-name__txt">LOGIN</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__login2">
		</div>	
		<div class="name__wrap">
			<div class="form__mus-name__txt">PASSWORD</div>
			<input name="" type="text" class="mus-name staff-name" id="input__museum__staff__password2">
		</div>
		<div class="name__wrap form__last__div" id="form__last__div">
			<div class="form__mus-name__txt">MUSEUM NUMBER</div>
			<!-- <input name="" type="text" class="mus-name staff-name" id="input__museum__staff__id_mus"> -->
			
		<div class="input-field col s12 selection">
		    <select id='number__of__museum__staff2'>
		      <option value="" disabled selected>Choose museum</option>
		      <?php $sql_data3 = mysqli_query($conn, "SELECT * FROM museum WHERE 1"); ?>
		      <?php while($row3 = mysqli_fetch_assoc($sql_data3)): ?>
		      <option value="<?=$row3[id]?>"><?=$row3[id]?></option>
		      <?php endwhile;?>
		    </select>
		  </div>
		</div>
			<button type="submit" class="addMuseum__but" id="addStaff__but_modal2">update</button>
		</form>
		<div class="close__modal" id="close__staff__modal2">
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize/js/materialize.min.js"></script>
<script src="js/chart.js/dist/Chart.js"></script>
<script type="text/javascript" src="js/staff.js"></script>
</body>
</html>			
