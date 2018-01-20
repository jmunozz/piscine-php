
let date = new Date();
date = date.setTime(date.getTime() + 864000000);
let EXPIRES = `expires=${date.toString()}`;
let KILL = `expires= Mon, 18 Dec 1995 17:28:35 GMT`;
let cookie_nb = 0;
const ft_list = document.getElementById("ft_list");

recover_todo();


// Get All Cookies and transform them into todo list.
function recover_todo() {

	const allCookiesArray = document.cookie.split('; ').filter((cookie) => {
			return cookie.substring(0, 5) == 'todo_'});
	if (allCookiesArray.length > 0) {
		let last_cookie_id; 
		allCookiesArray.forEach(cookie => {
			const c = cookie.split('=')
			cookie_id = c[0];
			cookie_content = c[1];
			console.log(cookie_id, cookie_content);
			let todo = create_todo(cookie_id, cookie_content);
			insert_todo(todo);
			last_cookie_id = cookie_id;
		})
		cookie_nb = parseInt(last_cookie_id.substring(5)) + 1;
		console.log(cookie_nb);
	}
}

function create_todo(id, content) {


		// Create all elements
		let todo = document.createElement("div");
		let contentNode = document.createTextNode(content);

		// Add all elements to DOM element.
		todo.className = "todo";
		todo.id = id;
		todo.appendChild(contentNode);
		todo.onclick = function() {
			if (confirm("Etes-vous sur ?") == true) {
				k = this.id;
				this.parentNode.removeChild(this);
				deleteOneCookie(id);
			}
		};
		return (todo);
}

function insert_todo(todo) {
		if (ft_list.childElementCount === 0) ft_list.appendChild(todo);
		else ft_list.insertBefore(todo, ft_list.firstChild);
}
			

function f() {

	//Get todo content
	let content = prompt("What to do ?")
	if(content && content.trim() !== "") {
		let id = `todo_${cookie_nb++}`;
		//Create todo element
		let todo = create_todo(id, content.trim());
		//Insert todo element
		insert_todo(todo);
		insertOneCookie(id, content.trim());
	}
}

function deleteOneCookie(id) {
	document.cookie = `${id}=delete; ${KILL}`
}

function insertOneCookie(id, content) {
	document.cookie = `${id}=${content}; ${EXPIRES}`;
}
