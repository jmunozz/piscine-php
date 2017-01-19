

function	get_cookie_nb() {
	if (document.cookie) {
		var matchl
		if ((match = document.cookie.match("/cookie_nb=*;/"))) {
			console.log(match[0]);
			return (parseInt(match[0]));
		}
		else {
		document.cookie = "cookie_nb=0 ; expires=Mon, 18 Dec 1995 17:28:35 GMT";
		}
	}
	else
		return (0);
}

function	delete_cookie(todo_id) {

	document.cookie = todo_id+"= ; expires=Mon, 18 Dec 1995 17:28:35 GMT";
	document.cookie = "cookie_nb="+(get_cookie_nb()--)
}

function	add_cookie(todo_id, todo_str) {
	console.log(todo_id);
	console.log(todo_str);
	todo_str.replace("/;/", "%%");
	var n_date = new Date();
	n_date.setTime(n_date.getTime() + (7*86400000));
	var expires = "; expires="+n_date.toUTCString();
	document.cookie = todo_id+"="+todo_str+expires;
	document.cookie = "cookie_nb="+(get_cookie_nb()++)
}

function	insert_todo() {
	var ft_list = document.getElementById("ft_list");
	var todo = document.createElement("div");
	var text = prompt("Please indicate what you have todo!");
	todo.innerHTML = text;
	todo.className = "todo";
	todo.id = "todo_"+get_cookie_nb();
	todo.onclick = function() {
		if (confirm("Etes-vous sûr ?") == true) {
			this.parentNode.removeChild(this)
			delete_cookie(this.id);
		}
	}
	if (ft_list.childElementCount == 0) {
		ft_list.appendChild(todo);
	   add_cookie(todo.id, todo.innerHTML);
	}
	else {
		ft_list.insertBefore(todo, ft_list.firstChild);
		add_cookie(todo.innerHTML);
	}
}




