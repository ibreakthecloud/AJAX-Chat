setInterval(refreshChat, 2000);
var chatRequest = new XMLHttpRequest();
var chatstr = '';
chatRequest.open('GET','chat.json','false');
chatRequest.onload = function() {
	var chatData = JSON.parse(chatRequest.responseText);
	for(var key in chatData)
	{
		chatstr = chatstr + '<div class="input panel panel-success"><div class="panel-heading"><h5><img class = "img-circle" src="images/user.png" height = "9%" width = "5%">'+chatData[key].name+'</h5></div>'+'<div class="panel-body">'+chatData[key].msg+'</div></div>';
	
	}
	document.getElementById('panelChat').innerHTML = chatstr;

	var panelChat = document.getElementById('panelChat');
		panelChat.scrollTop = panelChat.scrollHeight;
};
chatRequest.send();
// var elem = document.getElementById('panelChat');
// elem.scrollTop = elem.scrollHeight;
////////////////////////////////////////////////////////

function refreshChat()

{
	// var panelUsers = document.getElementById('panelUsers');
	// 	panelUsers.reload();
	// $('#panelUsers').empty();
	// $('#panelUsers').load(document.URL +  ' #panelUsers');
	// var panelChat = document.getElementById('panelChat');
	// 	panelChat.scrollTop = panelChat.scrollHeight;
	var chatRequest = new XMLHttpRequest();
	var chatstr = '';
	chatRequest.open('GET','chat.json');
	chatRequest.onload = function() {
	var chatData = JSON.parse(chatRequest.responseText);
	for(var key in chatData)
	{
		chatstr = chatstr + '<div class="input panel panel-success"><div class="panel-heading"><h5><img class = "img-circle" src="images/user.png" height = "9%" width = "5%"> '+chatData[key].name+'</h5></div>'+'<div class="panel-body">'+chatData[key].msg+'</div></div>';
	}
	document.getElementById('panelChat').innerHTML = chatstr;
};
chatRequest.send();
//document.getElementById("chats").scrollTop = document.getElementById("chats").scrollHeight;

}

////////////////////////////////////////////////////////////

function push()
{
	
	 var name = document.getElementById('name').value.trim();
	 var msg = document.getElementById('msg').value.trim();
	 document.getElementById('msg').value = "";
 if (name == null || name =="" && msg == null || msg == "") 
  {
  	alert('Message Cannot be empty!');

  }
 else
  {
	 	var chatPush = new XMLHttpRequest();
	 	chatPush.open("GET", "send.php?name=" + name + "&msg=" + msg, true);
	 	chatPush.send();



		// var chatRequest = new XMLHttpRequest();
		// var chatstr = '';
		// chatRequest.open('GET','chat.json');
		// chatRequest.onload = function() {
		// var chatData = JSON.parse(chatRequest.responseText);
		// for(var key in chatData)
		// {
		// 	chatstr = chatstr + chatData[key].name + ': ' + chatData[key].msg + '\n' ;
		// }
		// document.getElementById('chats').innerHTML = chatstr;
		// };
		// chatRequest.send();
		// document.getElementById("chats").scrollTop = document.getElementById("chats").scrollHeight;
	}
}
