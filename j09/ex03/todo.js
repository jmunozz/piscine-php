var ft_list = $('#ft_list');
var list_nb;


$(function() {
	
	$.get('select.php', function(data, status){
		if (data == 'KO' || data === ""){
			list_nb = 0;
		}
		else {
			var line = data.split('\n');
			console.log(data.length);
			for (var i = 0; i < line.length ; i++) {
				var	d = line[i].split(';');
				if (d[1] && d[0]) {
					var todo = create_todo(d[0].trim(), d[1]);
					insert_todo(todo, 0);
				}
			}
			list_nb = line.length;
			console.log("list_nb="+list_nb);
		}
	});
});

function	create_todo(id, content) {
		var todo = $('<div>').text(content);
		$(todo).attr('class', 'todo');
		$(todo).attr('id', id);
		$(todo).click(function() {
			if (confirm("Etes-vous sûr ?") == true) {
				var k = $(this).attr('id');
				$(this).remove();
				console.log('delete.php?id='+k);
				$.get('delete.php?id='+k);
				list_nb--;
			}
		});
		return (todo);
}

function	insert_todo(todo, write) {
			ft_list.prepend(todo);
			if (write) {
				$.get('insert.php?id='+$(todo).attr('id')+'&value='+$(todo).text());
			}
}
			

$('#button').click(function() {
	var content = prompt("What to do ?")
	if (content === null) {
		return ;
	}
	content = content.trim();
	if (content.length > 0){
		var todo = create_todo(list_nb, content);
		insert_todo(todo, 1);
		list_nb++;
	}
});

