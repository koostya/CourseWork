window.onload = ready;
$(document).ready(function() {
    $('select').material_select();
  });
function ready() {

		var modal__add__staff = document.getElementById('modal__add-staff');
		var close__staff__modal = document.getElementById('close__staff__modal');
		var addStaff__but__modal = document.getElementById('addStaff__but_modal');
		var addStaff__but__open = document.getElementById('addStaff__but__open');

		var staff__add__but = document.getElementById('staff__add__but');
		var staff__delete__but = document.getElementById('staff__delete__but');

		var staff__pay = document.querySelectorAll('.staff__pay'),
			staff__praise = document.querySelectorAll('.staff__praise'),
			staff__rebuke = document.querySelectorAll('.staff__rebuke');

		var staff__count = 0;
		var staff__table = document.querySelectorAll('.staff__tr__colored');
		var post_id_all = document.querySelectorAll('.id_staff');

		for(var i = 0; i < staff__rebuke.length; i++){
			var rebuke = parseInt(staff__rebuke[i].innerHTML, 10);
			var praise = parseInt(staff__praise[i].innerHTML, 10);
			if(rebuke > praise){
				staff__pay[i].innerHTML = (rebuke - praise)*200;
			}
			else {
				staff__pay[i].innerHTML = '-';
			}
		}

		close__staff__modal.addEventListener('click', function(){
			modal__add__staff.style.display = 'none';
		});
		addStaff__but__modal.addEventListener('click', function(){
			modal__add__staff.style.display = 'none';
		});


		staff__add__but.addEventListener('click', function() {
				modal__add__staff.style.display = 'block';
		});
		staff__delete__but.addEventListener('click', function(){
			staff__count++;
			if(staff__count%2 == 1){
				staff__delete__but.innerHTML = 'CANCEL';
				staff__delete__but.style.backgroundColor = '#FFAA00';
				for(var i = 0; i < staff__table.length; i++){
					staff__table[i].style.transition = 'all .3s';
					staff__table[i].style.backgroundColor = '#FFAA00';
					staff__table[i].style.cursor = 'pointer';
					staff__table[i].addEventListener('mouseover', function(){
						this.style.backgroundColor = '#A66800';
					});
					staff__table[i].addEventListener('mouseleave', function(){
						this.style.backgroundColor = '#FFAA00';
					});
					var id = parseInt(post_id_all[i].innerHTML, 10);
					staff__table[i].addEventListener('click', delete_staff.bind(id));
				}
			}
			if(staff__count%2 == 0){
				staff__delete__but.innerHTML = 'DELETE';
				staff__delete__but.style.backgroundColor = '#FD0006';
				for(var i = 0; i < staff__table.length; i++){
					staff__table[i].style.transition = 'all .3s';
					staff__table[i].style.cursor = 'auto';
					if(i%2 == 1){
						staff__table[i].style.backgroundColor = '#ccc';
					}
					if(i%2 == 0){
						staff__table[i].style.backgroundColor = 'white';
					}
				}
				document.location.reload();
			}
		});


		//charts
		var staff_surname = document.querySelectorAll('.staff__surname');
		var staff__pay = document.querySelectorAll('.staff__pay');
		var labels__surnames = [];
		var data__pay = [];
		var colors = [];
		for(var i = 0; i < staff_surname.length; i++){
			labels__surnames.push(staff_surname[i].innerHTML);
			data__pay.push(parseInt(staff__pay[i].innerHTML, 10));
			colors.push(color());
		}

		var ctx = document.getElementById("myChart");
		var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: labels__surnames,
		        datasets: [{
		            label: 'Statistic of fines',
		            data: data__pay,
		            backgroundColor: colors,
		            borderColor: colors,
		            borderWidth: 1
		        }]
		    },
		    options: {
		    	scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
		});
		var ctx2 = document.getElementById("myChart2");
		var myBarChart2 = new Chart(ctx2, {
		    type: 'doughnut',
		    data: {
		        labels: labels__surnames,
		        datasets: [{
		            label: 'Statistic of fines',
		            data: data__pay,
		            backgroundColor: colors,
		            borderColor: colors,
		            borderWidth: 1
		        }]
		    },
		    options: {
		    	scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
		});
		var ctx3 = document.getElementById("myChart3");
		var myBarChart3 = new Chart(ctx3, {
		    type: 'line',
		    data: {
		        labels: labels__surnames,
		        datasets: [{
		            label: 'Statistic of fines',
		            data: data__pay,
		            backgroundColor: colors,
		            borderColor: colors,
		            borderWidth: 1
		        }]
		    },
		    options: {
		    	scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
		});


		//print

		var print__but = document.getElementById('staff__but__print');
		var staff__pay = document.querySelectorAll('.staff__pay');
		var staff__tr__colored = document.querySelectorAll('.staff__tr__colored');
		print__but.addEventListener('click', function() {
			for(var i = 0; i < staff__pay.length; i++){
				if(staff__pay[i].innerHTML == '-'){
					staff__tr__colored[i].style.display = 'none';
				}
			}
			var printContents = document.getElementById('print__staff').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
			for(var i = 0; i < staff__pay.length; i++){
				if(staff__pay[i].innerHTML != '-'){
					staff__tr__colored[i].style.display = 'block';
				}
			}
			window.location.reload();
		});
	}
	function color() {
        var r = Math.floor(Math.random()*256);
        var g = Math.floor(Math.random()*256);
        var b = Math.floor(Math.random()*256);
        var rgba = 'rgba(' + r + ',' + g + ',' + b + ',' + 1 + ')';
        return rgba;
    }
	function add_post_staff() {
		var staff__name = document.getElementById('input__museum__staff__name'),
			staff__surname = document.getElementById('input__museum__staff__surname'),
			staff__sursurname = document.getElementById('input__museum__staff__sursurname'),
			staff__telephone = document.getElementById('input__museum__staff__telephone'),
			staff__praise = document.getElementById('input__museum__staff__praise'),
			staff__rebuke = document.getElementById('input__museum__staff__rebuke'),
			staff__login = document.getElementById('input__museum__staff__login'),
			staff__password = document.getElementById('input__museum__staff__password'),
			staff__id_mus = document.getElementById('number__of__museum__staff');


		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/Controll/addStaff.php', true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();

		}
		var body = 'name_s='+staff__name.value+'&surname='+staff__surname.value+'&sursurname='+staff__sursurname.value+'&telephone='+staff__telephone.value+'&praise='+staff__praise.value+'&rebuke='+staff__rebuke.value+'&login='+staff__login.value+'&password='+staff__password.value+'&id_mus='+staff__id_mus.value;
		
		xhr.send(body);
	}
	function delete_staff() {
		var post_id = this.post_id;
		console.log(this);
		var xhr = new XMLHttpRequest();
		xhr.open('GET', '/Controll/deleteStaff.php?post_id='+this, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();
		}
		xhr.send();
	}
	function open_get_update__staff(post_id) {
		var modal = document.getElementById('modal__update-staff'),
			button = document.getElementById('addStaff__but_modal2'),
			close_modal = document.getElementById('close__staff__modal2');


		var xhr = new XMLHttpRequest();

		xhr.open('GET', '/Controll/updateStaff.php?post_id='+post_id, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			modal.style.display = 'block';
			var name = JSON.parse(xhr.responseText).name_s;
			var surname = JSON.parse(xhr.responseText).surname;
			var sursurname = JSON.parse(xhr.responseText).sursurname;
			var telephone = JSON.parse(xhr.responseText).telephone;
			var praise = JSON.parse(xhr.responseText).praise;
			var rebuke = JSON.parse(xhr.responseText).rebuke;
			var login = JSON.parse(xhr.responseText).login;
			var password = JSON.parse(xhr.responseText).password;
			var id_mus = JSON.parse(xhr.responseText).id_mus;

			button.addEventListener('click', function() {
				modal.style.display = 'none';
				close_post_update__staff(post_id);
			});
			close_modal.addEventListener('click', function() {
				modal.style.display = 'none';
			});

			var input__museum__staff__name2 = document.getElementById('input__museum__staff__name2'),
				input__museum__staff__surname2 = document.getElementById('input__museum__staff__surname2'),
				input__museum__staff__sursurname2 = document.getElementById('input__museum__staff__sursurname2'),
				input__museum__staff__telephone2 = document.getElementById('input__museum__staff__telephone2'),
				input__museum__staff__praise2 = document.getElementById('input__museum__staff__praise2'),
				input__museum__staff__rebuke2 = document.getElementById('input__museum__staff__rebuke2'),
				input__museum__staff__login2 = document.getElementById('input__museum__staff__login2'),
				input__museum__staff__password2 = document.getElementById('input__museum__staff__password2'),
				number__of__museum__staff2 = document.getElementById('number__of__museum__staff2');

			input__museum__staff__name2.value = name;
			input__museum__staff__surname2.value = surname;
			input__museum__staff__sursurname2.value = sursurname;
			input__museum__staff__telephone2.value = telephone;
			input__museum__staff__praise2.value = praise;
			input__museum__staff__rebuke2.value = rebuke;
			input__museum__staff__login2.value = login;
			input__museum__staff__password2.value = password;
			number__of__museum__staff2.value = id_mus;	
			console.log(name);
		}
		xhr.send();
	}
	function close_post_update__staff(post_id) {

		var staff__name = document.getElementById('input__museum__staff__name2'),
			staff__surname = document.getElementById('input__museum__staff__surname2'),
			staff__sursurname = document.getElementById('input__museum__staff__sursurname2'),
			staff__telephone = document.getElementById('input__museum__staff__telephone2'),
			staff__praise = document.getElementById('input__museum__staff__praise2'),
			staff__rebuke = document.getElementById('input__museum__staff__rebuke2'),
			staff__login = document.getElementById('input__museum__staff__login2'),
			staff__password = document.getElementById('input__museum__staff__password2'),
			staff__id_mus = document.getElementById('number__of__museum__staff2');

		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/Controll/updateStaff.php', true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();
		}
		var body = 'post_id='+post_id+'&name_s='+staff__name.value+'&surname='+staff__surname.value+'&sursurname='+staff__sursurname.value+'&telephone='+staff__telephone.value+'&praise='+staff__praise.value+'&rebuke='+staff__rebuke.value+'&login='+staff__login.value+'&password='+staff__password.value+'&id_mus='+staff__id_mus.value;
		xhr.send(body);
	}