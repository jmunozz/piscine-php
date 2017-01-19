function insert_todo() {
	var ft_list = document.getElementById("ft_list");
	var todo = document.createElement("div");
	var text = prompt("Please indicate what you have todo!");
	todo.innerHTML = text;
	todo.className = "todo";
	todo.onclick = function () {this.parentNode.removeChild(this); };
	if (ft_list.childElementCount == 0) {
		ft_list.appendChild(todo); 
	}
	else
		ft_list.insertBefore(todo, ft_list.firstChild);
}

