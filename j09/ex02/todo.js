var cookie_lifespan = 10;
var d = new Date;
d.setTime(d.getTime() + (cookie_lifespan * 86400000));
var expires = "; expires="+d.toString();
console.log("BEGIN"+expires);
var kill = "; expires= Mon, 18 Dec 1995 17:28:35 GMT";
var ft_list = document.getElementById("ft_list");
var cookie_string = document.cookie;
var cookie_nb;

//delete_cookie();
recover_todo();

function	recover_todo() {
	ar = {};
	console.log(cookie_string);
	if (cookie_string.length > 0) {
		console.log("OJDSD");
		console.log(cookie_string);
		var c = cookie_string.split(';');
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
	else {
		cookie_nb = 0;
		}
}

function	create_todo(id, content) {
		console.log("CREATE_CONTENT= "+content);
		console.log("CREATE_ID= "+id);
		content = document.createTextNode(content);
		var todo = document.createElement("div");
		todo.className = "todo";
		todo.id = id;
		todo.appendChild(content);
		todo.onclick = function() {
			if (confirm("Etes-vous sûr ?") == true) {
				k = this.id;
				this.parentNode.removeChild(this);
				document.cookie = k+"=''"+kill;
				cookie_nb--;
				console.log("DELETE_COOKIE_NB= "+cookie_nb);
				document.cookie = "cookie_nb="+cookie_nb;
				console.log("DELETE_COOKIE_STRING= "+document.cookie);
			}
		};
		return (todo);
}

function	insert_todo(todo) {
		if (ft_list.childElementCount === 0) {
			ft_list.appendChild(todo);
			document.cookie = todo.id+"="+todo.textContent+expires;
			console.log("INSERT_COOKIE_STRING= "+document.cookie);
		}
		else {
			ft_list.insertBefore(todo, ft_list.firstChild);
			document.cookie = todo.id+"="+todo.textContent+expires;
			console.log("INSERT_COOKIE_STRING= "+document.cookie);
		}

}
			

function f() {
	var content = prompt("What to do ?")
	if (content === null) {
		return ;
	}
	content = content.trim();
	if (content.length > 0){
		console.log("f_COOKIE_NB = "+cookie_nb);
		var todo = create_todo(cookie_nb, content);
		insert_todo(todo);
		cookie_nb++;
		document.cookie = "cookie_nb="+cookie_nb;
		console.log("F__COOKIE_STRING= "+document.cookie);
	}
}

function delete_cookie() {
	var res = document.cookie.split(';');
	res.forEach(function (x) {
		console.log(x+kill);
		document.cookie =x+kill;});
}
