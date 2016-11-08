function messagesend(_this){
  document.getElementById('message-send')
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

function bold()
{
  $('input[type=button]').on('click',function(){
    var cursorPos=$('#message-send').prop('selectionStart');
    var v = $('#message-send').val(); 
    var textBefore = v.substring(0,cursorPos);
    var textAfter = v.substring(cursorPos,v.length);
    $('#message-send').val(textBefore + '[b][/b]' + textAfter); 
}

function underline()
{
  $('input[type=button]').on('click',function(){
    var cursorPos=$('#message-send').prop('selectionStart');
    var v = $('#message-send').val(); 
    var textBefore = v.substring(0,cursorPos);
    var textAfter = v.substring(cursorPos,v.length);
    $('#message-send').val(textBefore + '[u][/u]' + textAfter); 
}

function italic()
{
  $('input[type=button]').on('click',function(){
    var cursorPos=$('#message-send').prop('selectionStart');
    var v = $('#message-send').val(); 
    var textBefore = v.substring(0,cursorPos);
    var textAfter = v.substring(cursorPos,v.length);
    $('#message-send').val(textBefore + '[i][/i]' + textAfter); 
}
