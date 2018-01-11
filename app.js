
var chatRequest = new XMLHttpRequest();
var chatstr = '';
chatRequest.open('GET','chat.json');
chatRequest.onload = function() {
	var chatData = JSON.parse(chatRequest.responseText);
	for(var key in chatData)
	{
		chatstr = chatstr + chatData[key].name + ': ' + chatData[key].msg + '\n' ;
		 console.log(chatData[key]);
	}
	document.getElementById('chats').innerHTML = chatstr;
};
chatRequest.send();

document.getElementById("chats").scrollTop = document.getElementById("chats").scrollHeight;
////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////

function push()
{
	
	 var name = document.getElementById('name').value;
	 var msg = document.getElementById('msg').value;
	 document.getElementById('msg').value = "";
 if (name == "" || name ==" ") 
  {
  	alert('Name cannot be left blank!');

  }

 else
  {
	 	var chatPush = new XMLHttpRequest();
	 	chatPush.open("GET", "send.php?name=" + name + "&msg=" + msg, true);
	 	chatPush.send();



		var chatRequest = new XMLHttpRequest();
		var chatstr = '';
		chatRequest.open('GET','chat.json');
		chatRequest.onload = function() {
		var chatData = JSON.parse(chatRequest.responseText);
		for(var key in chatData)
		{
			chatstr = chatstr + chatData[key].name + ': ' + chatData[key].msg + '\n' ;
		}
		document.getElementById('chats').innerHTML = chatstr;
		};
		chatRequest.send();
		document.getElementById("chats").scrollTop = document.getElementById("chats").scrollHeight;
	}
}