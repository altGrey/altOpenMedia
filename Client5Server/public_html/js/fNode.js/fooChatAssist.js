var socket;

function init(){
  var host = "ws://208.109.101.135:8016";
  try{
    socket = new WebSocket(host);
    log('WebSocket - status '+socket.readyState);
    socket.onopen    = function(msg){ log("Welcome - status "+this.readyState); };
    socket.onmessage = function(msg){ log("Received: "+msg.data); };
    socket.onclose   = function(msg){ log("Disconnected - status "+this.readyState); };
  }
  catch(ex){ log(ex); }
  $("msg").focus();
}

function send(){
  var txt,msg;
  txt = $("msg");
  msg = txt.value;
  if(!msg){ alert("Message can not be empty"); return; }
  txt.value="";
  txt.focus();
  try{ socket.send(msg); log('Sent: '+msg); } catch(ex){ log(ex); }
}
function quit(){
  log("Goodbye!");
  socket.close();
  socket=null;
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg){ $("log").innerHTML+="<br>"+msg; }
function onkey(event){ if(event.keyCode==13){ send(); } }

