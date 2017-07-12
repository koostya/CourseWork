window.onload = ready;

	
	function ready() {
		var mouse = document.getElementById('mouse');
		var height = document.getElementById('wrap__header').offsetHeight;
		mouse.addEventListener('click', function c() {
			window.scrollTo(0, height);
		});

		var add_mus = document.getElementById('addMuseum__but');
		var add__mus__modal = document.getElementById('modal__add-museum');
		var open__mus__modal = document.getElementById('open__mus__modal');
		var close__museum__modal = document.getElementById('close__museum__modal');

		close__museum__modal.addEventListener('click', function() {
			add__mus__modal.style.display = 'none';
		});
		open__mus__modal.addEventListener('click', function() {
			add__mus__modal.style.display = 'block';
		});
		add_mus.addEventListener('click', function() {
			add__mus__modal.style.display = 'none';
		});

		
		
		var search = document.getElementById('search_mus_by_name');
		search.oninput = search_mus;

		var order_by_mus_name = document.getElementById('order_by_mus_name');
		var countForMusOrder = 0;
		order_by_mus_name.addEventListener('click',
			function() {
					countForMusOrder++;
					var selNormal = document.getElementById('wrap__museums__all1');
					var selOrdered = document.getElementById('wrap__museums__ordered1');
					if(countForMusOrder%2 == 1) {
						selNormal.style.display = 'none';
						selOrdered.style.display = 'block';
						order_by_mus_name.innerHTML = 'Return';
					}
					if(countForMusOrder%2 == 0) {
						selNormal.style.display = 'block';
						selOrdered.style.display = 'none';
						order_by_mus_name.innerHTML = 'Order by name';
					}
			}
		);	
	}	
		
	function delete_post(post_id) {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', '/Controll/deleteMuseum.php?post_id='+post_id, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();
		}
		xhr.send();
	}
	function add_post() {
		var post_name2 = document.getElementById('input__museum__name');
		var post_description2 = document.getElementById('input__museum__description');
		var mus__img__input = document.getElementById('mus__img__input');
		var mus_img_file = document.getElementById('mus__img__file').files[0];

		var temp_path = URL.createObjectURL(mus_img_file);


		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/Controll/addMuseum.php', true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();
		}
		var body = 'name='+post_name2.value+'&description='+post_description2.value+'&img='+mus__img__input.value+'&file='+temp_path;
		
		xhr.send(body);
	}
	
	function open_get_update(post_id) {
		var add__mus__modal2 = document.getElementById('modal__add-museum2');
		var close__museum__modal = document.getElementById('close__museum__modal2');
		var add_mus = document.getElementById('addMuseum__but2');

		var xhr = new XMLHttpRequest();

		xhr.open('GET', '/Controll/updateMuseum.php?post_id='+post_id, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			add__mus__modal2.style.display = 'block';
			var id = JSON.parse(xhr.responseText).id;
			var name = JSON.parse(xhr.responseText).name;
			var description = JSON.parse(xhr.responseText).description;
			var img_catalog = JSON.parse(xhr.responseText).img_catalog;
			var img_filename = JSON.parse(xhr.responseText).img_filename;

			add_mus.addEventListener('click', function() {
				add__mus__modal2.style.display = 'none';
				close_post_update(post_id);
			});
			close__museum__modal2.addEventListener('click', function() {
				add__mus__modal2.style.display = 'none';
			});

			var input_name = document.getElementById('input__museum__name2');
			var input_description = document.getElementById('input__museum__description2');

			input_name.value = name;
			input_description.value = description;
		}
		xhr.send();
	}
	function close_post_update(post_id) {
		var post_name = document.getElementById('input__museum__name2');
		var post_description = document.getElementById('input__museum__description2');

		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/Controll/updateMuseum.php', true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return false;
			document.location.reload();
		}
		var body = 'post_id='+post_id+'&name='+post_name.value+'&description='+post_description.value;
		xhr.send(body);
	}
	function search_mus() {
		var names = document.querySelectorAll('.museum__name');
		var search = document.getElementById('search_mus_by_name');

		var check__mus__filter = document.getElementById('test5');
		var museums__wrap = document.querySelectorAll('.museums__wrap');

		if(!check__mus__filter.checked){
			for(var j = 0; j < names.length; j++) {
				var name = names[j].innerHTML;
				if(name.indexOf(search.value) + 1){
					names[j].style.color = 'black';
				}
				else if(name.indexOf(search.value)){
						names[j].style.color = 'red';
					}	
			}
		}	
		if(check__mus__filter.checked){
			for(var j = 0; j < names.length; j++) {
				var name = names[j].innerHTML;
				if(name.indexOf(search.value) + 1){
					museums__wrap[j].style.display = 'block';
				}
				else if(name.indexOf(search.value)){
						museums__wrap[j].style.display = 'none';
					}	
			}
		}	
	}
	function orderByMusName() {
		countForMusOrder++;
		var selNormal = document.getElementById('wrap__museums__all1');
		var selOrdered = document.getElementById('wrap__museums__ordered1');
			if(countForMusOrder%2 == 1) {
				selNormal.style.display = 'none';
				selOrdered.style.display = 'block';
			}
			if(countForMusOrder%2 == 0) {
				selNormal.style.display = 'block';
				selOrdered.style.display = 'none';
			}
	}