var cookie_lifespan = 10;
var d = new Date;
d.setTime(d.getTime() + (cookie_lifespan * 86400000));
var expires = "; expires="+d.toString();
console.log("BEGIN"+expires);
var kill = "; expires= Mon, 18 Dec 1995 17:28:35 GMT";
var ft_list = $('#ft_list');
var cookie_nb;

//delete_cookie();

$(function() {

	ar = {};
	if (document.cookie != undefined) {
		var c = document.cookie.split(';');
		for (var i = 0; i < c.length; i++) {
			var	d = c[i].split('=');
			if (d[1] && d[0]) {
				ar[d[0].trim()] = d[1];
			}
		}
		cookie_nb = ar.count;
		for (key in ar) {
			if (key == "cookie_nb") {
				cookie_nb = ar[key];
			}
			else {
				var todo = create_todo(key, ar[key]);
				insert_todo(todo);
			}
		}
	}
	else
		cookie_nb = 0;
});

function	create_todo(id, content) {
		var todo = $('<div>').text(content);
		$(todo).attr('class', 'todo');
		$(todo).attr('id', id);
		$(todo).click(function() {
			if (confirm("Etes-vous sûr ?") == true) {
				var k = $(todo).attr('id');
				$(this).remove();
				document.cookie = k+"=''"+kill;
				cookie_nb--;
				document.cookie = "cookie_nb="+cookie_nb;
			}
		});
		return (todo);
}

function	insert_todo(todo) {
			ft_list.prepend(todo);
			document.cookie = $(todo).attr('id')+"="+$(todo).text()+expires;
}
			

$('#button').click(function() {
	var content = prompt("What to do ?")
	if (content === null) {
		return ;
	}
	content = content.trim();
	if (content.length > 0){
		var todo = create_todo(cookie_nb, content);
		insert_todo(todo);
		cookie_nb++;
		document.cookie = "cookie_nb="+cookie_nb;
	}
});

function delete_cookie() {
	var res = document.cookie.split(';');
	res.forEach(function (x) {
		console.log(x+kill);
		document.cookie =x+kill;});
}
