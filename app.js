setInterval(refreshChat, 2000);


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

function refreshChat(){
    
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

}

////////////////////////////////////////////////////////////

function push()
{
	
	 var name = document.getElementById('name').value.trim();
	 var msg = document.getElementById('msg').value.trim();
	 document.getElementById('msg').value = "";
 if (name == null || name =="" && msg == null || msg == "") 
  {
  	alert('Input Your Name and Message!');

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