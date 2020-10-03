<?php
  session_start();
  if(isset($_SESSION['number'])){}else{
    header("location:login.php");
  }
?>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<!-- <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script> -->
<!-- <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script> -->

<!-- <script type="text/javascript" src="firebase.js"> </script> -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->





<link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

        <link rel="stylesheet" href="css/style.css">

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->



<table border="1px solid black" cellpadding="2" cellspacing="5">
		<tr>
			<th>Match Name</th>
			<th>Match Run</th>
			<th>Match Wicket</th>
			<th>Match Over</th>
		</tr>
		<tr>
			<td id="get_match_name"></td>
			<td id="get_match_run"></td>
			<td id="get_match_wicket"></td>
			<td id="get_match_over"></td>
		</tr>
	</table>


	
	<script>
  // Your web app's Firebase configuration
  
  
  </script>
  
  
  <script>
  
  function deleteMessage(self) {
    var messageId = self.getAttribute("data-id");
    firebase.database().ref("messages").child(messageId).remove();
  }

  function sendMessage() {
    var message = document.getElementById("message").value;
    firebase.database().ref("messages").push().set({
      "message": message,
      "sender": myName
    });
    return false;
  }
</script>

<style>
  figure.avatar {
    bottom: 0px !important;
  }
  .btn-delete {
    background: red;
    color: white;
    border: none;
    margin-left: 10px;
    border-radius: 5px;
  }
</style>






<div class="chat">
  <div class="chat-title">
    <h1>Chat Room</h1>
    <h2>Firebase</h2>
    <figure class="avatar">
      <img src="https://p7.hiclipart.com/preview/349/273/275/livechat-online-chat-computer-icons-chat-room-web-chat-others.jpg" /></figure>
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" id="message" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>

</div>
<div class="bg"></div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>

        <script>
          
          
          var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

var myName = "";

$(window).load(function() {
  $.ajax({
    url:'get_number.php',
    type:'get',
    success:function(data){
        myName=data;
    }

  });
  $messages.mCustomScrollbar();

  firebase.database().ref("messages").on("child_added", function (snapshot) {
    if (snapshot.val().sender == myName) {
      $('<div class="message message-personal"><figure class="avatar"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpdX6tPX96Zk00S47LcCYAdoFK8INeCElPeJrVDrh8phAGqUZP_g" /></figure><div id="message-' + snapshot.key + '">' + snapshot.val().message + '<button class="btn-delete" data-id="' + snapshot.key + '" onclick="deleteMessage(this);">Delete</button></div></div>').appendTo($('.mCSB_container')).addClass('new');
      $('.message-input').val(null);
    } else {
      $('<div class="message new"><figure class="avatar"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpdX6tPX96Zk00S47LcCYAdoFK8INeCElPeJrVDrh8phAGqUZP_g" /></figure><div id="message-' + snapshot.key + '">' + snapshot.val().sender + ': ' + snapshot.val().message + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
    }
    
    setDate();
    updateScrollbar();
  });
  
  const database =firebase.database();
	const firstmatch=database.ref('1');

  	firstmatch.child('match_name').on('value',snapshot => {
  		document.getElementById("get_match_name").innerHTML=snapshot.val();
  		
  		alert("from")
  	});
  	firstmatch.child('match_run').on('value',snapshot => {
  		document.getElementById("get_match_run").innerHTML=snapshot.val();
  	});
  	firstmatch.child('match_wicket').on('value',snapshot => {
  		document.getElementById("get_match_wicket").innerHTML=snapshot.val();
  	});
  	firstmatch.child('match_over').on('value',snapshot => {
  		document.getElementById("get_match_over").innerHTML=snapshot.val();
  	});

});

function updateScrollbar() {
  $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
    scrollInertia: 10,
    timeout: 0
  });
}

function setDate(){
  d = new Date()
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
  }
}

function insertMessage() {
  msg = $('.message-input').val();
  if ($.trim(msg) == '') {
    return false;
  }

  sendMessage();
}

$('.message-submit').click(function() {
  insertMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    insertMessage();
    return false;
  }
});
          
        </script>