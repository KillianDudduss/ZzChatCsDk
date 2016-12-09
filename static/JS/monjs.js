function messagesend(_this){
  document.getElementById('message-send');
}

$('input[type=button]').on('click',function(){
  var cursorPos=$('#message-send').prop('selectionStart');
  var v = $('#message-send').val(); 
  var textBefore = v.substring(0,cursorPos);
  var textAfter = v.substring(cursorPos,v.length);
  $('#message-send').val(textBefore+$(this).val()+textAfter);
})


function BasculeElement(_this){
      var Onglet_li = document.getElementsByTagName('LI');
      for(var i = 0; i < Onglet_li.length; i++){
        if(Onglet_li[i].id){
          if(Onglet_li[i].id == _this.id){
            Onglet_li[i].className = "active";
            document.getElementById('#' + Onglet_li[i].id).style.display = 'block';
          }
          else{
            Onglet_li[i].className = "";
            document.getElementById('#' + Onglet_li[i].id).style.display = 'none';
          }
        }
      }           
}

function BasculeLangue(_this){
  var menu = document.getElementsById('#fr');
  if (menu.style.display == 'none') menu.style.display = 'block';
  else menu.style.display = 'none';
  var menu = document.getElementsById('#en');
  if (menu.style.display == 'none') menu.style.display = 'block';
  else menu.style.display = 'none';     
}

function scrollbas(){ 
  document.getElementById('#scrollmessage').scrollTop = document.getElementById('#scrollmessage').scrollHeight; 
}

function send(){
    var texte = $("#message-send").val();
    $("#message-send").val('').focus();
    $.post("got-messages.php", {text : texte}, function(data){
        console.log(data);
    });
    updateChat();
    scrollbas();
}

function updateChat(){
    $.post("send-messages.php", function(data){
      $('#scrollmessage').html(data);
      scrollbas();
    });
}

function updateOnline(){
    $.post("online.php", function(data){
    $('#online').html(data);
    });
}


function balise(bal) 
{
	switch (bal) 
	{
		case 'bold':
			var balisePrev = '[b]';
			var balisePost = '[/b]';
		break;
		case 'italic':
			var balisePrev = '[i]';
			var balisePost = '[/i]';
		break;
		case 'underline':
			var balisePrev = '[u]';
			var balisePost = '[/u]';
		break;
		case 'link':
			var balisePrev = '<a href="">';
			var balisePost = '</a>';
		break;
		default:
			var balisePrev = '[error]';
			var balisePost = '[/error]';
	}
	$('#message-send').focus();
	var txt = balisePrev + window.getSelection() + balisePost;
	if(document.getElementById('message-send').selectionStart != undefined) 
	{
		document.getElementById('message-send').value = document.getElementById('message-send').value.substring(0, document.getElementById('message-send').selectionStart) + txt + document.getElementById('message-send').value.substring(document.getElementById('message-send').selectionEnd, document.getElementById('message-send').value.length);
	}
}


$("#message-submit").on("click", function(){
        send();
        scrollbas();
});

