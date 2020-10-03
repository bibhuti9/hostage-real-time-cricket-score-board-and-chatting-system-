



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- The core Firebase JS SDK is always required and must be listed first -->
<!-- <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script> -->
<!-- <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script> -->

<!-- <script type="text/javascript" src="firebase.js"> </script> -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration

</script>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->
     
     
<script>
  // Your web app's Firebase configuration
</script>


<script type="text/javascript">
  window.onload=function(){
    render();
  }
  function render(){
    window.recaptchaVerifier =new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
  }
  function phoneAuth(){
   var number=document.getElementById('number').value;
    number="+91"+number;
    firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function(confirmationResult){
      window.confirmationResult=confirmationResult;
      coderesult=confirmationResult;
      console.log(coderesult);
      alert("Message Sent");
    }).catch(function(error){
      alert(error.message);
    });
  }
  function codeverify(){
    var code=document.getElementById('verificationCode').value;
    var number=document.getElementById('number').value;
    coderesult.confirm(code).then(function(result){
      alert("sucessfull sent");
      var user=result.user;
      console.log(user);
        
      $.ajax({
        url:'check.php',
        type:'get',
        data:'number='+number,
        success:function(data){
          if(data=="1"){
            window.location.assign("index.php");            
          }if(data=="0"){
            alert("phone number is not set");
          }
        }
      });   
    }).catch(function(error){
      alert(error.message);
    });
  }
</script>
</head>
<body>
    <h1>Enter your mobile no</h1>
    <form>
      <input type="text" id="number" placeholder="Enter Your mobile no..">
      <div id="recaptcha-container"></div>
      <button type="button" onclick="phoneAuth();">Send Code</button>
    </form>
    <br>
    <h1>Enter Verification Code  </h1><br>


    <form>
      <input type="text" id="verificationCode" placeholder="Enter verificationCode code" name="">
      <button type="button" onclick="codeverify();">Verify Code</button>
    </form>
</body>
</html>