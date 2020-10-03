<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'> -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<tr>
			<th>Match Id</th>
				<td>
					<input type="text" id="match_id"  name="" placeholder="Enter Match Id">
				</td>
		</tr>
		<tr>
		<th>Match Name</th>
			<td>
				<input type="text" id="match_name" name="" placeholder="Enter Match name ">
			</td>
		</tr>

		<tr>
		<th>Match Live or not</th>
			<td>
				<input type="text" id="match_live_or_not" name="" placeholder="Enter Live or not ">
			</td>
		</tr>

		<tr>
		<th>Match Batting name</th>
			<td>
				<input type="text" id="match_batting_name" name="" placeholder="Enter Batting name ">
			</td>
		</tr>

		<tr>
		<th>Match Run</th>
			<td>
				<input type="text" id="run" name="" placeholder="Entet run">
			</td>
		</tr>
		<tr>
		<th>Match Wicket</th>
			<td>
				<input type="text" id="wicket" name="" placeholder="Wicket"> 
			</td>
		</tr>
		<tr>
		<th>Match Over</th>
			<td>
				<input type="text" id="over" name="" placeholder="over"> 
			</td>
		</tr>
		<tr>
			<td>
				<button id="btnadd">Add Match</button>
			</td>
	</table><br><br><br><br><br><br>		

	<table cellpadding="2" cellspacing="5">
		<tr>
			<th>Match Name</th>
			<th>Match Live or not</th>
			<th>Match Batting name</th>
			<th>Match Run</th>
			<th>Match Wicket</th>
			<th>Match Over</th>
			<th>Update</th>
		</tr>
		<tr>
			<td><input type="text" id="get_match_name"></td>
			<td><input type="text" id="get_match_live_or_not"></td>
			<td><input type="text" id="get_match_batting_name"></td>
			<td><input type="text" id="get_match_run"></td>
			<td><input type="text" id="get_match_wicket"></td>
			<td><input type="text" id="get_match_over"></td>
			<td><button id="update_score">Update</button></td>
		</tr>
	</table>


	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>
	<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase.js"></script>


<!-- The core Firebase JS SDK is always required and must be listed first -->



<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

	
	
	
	
<!-- Enter your firebase script code that you copy. -->



<script type="text/javascript">

	const database =firebase.database();
	const firstmatch=database.ref('1');
	var add_match=document.getElementById("btnadd");
	var match_id=document.getElementById("match_id");
	var match_name=document.getElementById("match_name");
	var match_live_or_not=document.getElementById("match_live_or_not");
	var match_batting_name=document.getElementById("match_batting_name");
	var match_run=document.getElementById("run");
	var wicket=document.getElementById("wicket");
	var over=document.getElementById("over");
  	add_match.addEventListener('click',(e)=>{
	  	e.preventDefault();
	  	database.ref(match_id.value).set({
	  		match_name:match_name.value,
	  		match_live_or_not:match_live_or_not.value,
	  		match_batting_name:match_batting_name.value,
	  		match_run:match_run.value,
	  		match_wicket:wicket.value,
	  		match_over:over.value
	  	});
  	});

  	update_score.addEventListener('click',(e)=>{
  		e.preventDefault();
  		firstmatch.update({
  			match_live_or_not:document.getElementById("get_match_live_or_not").value,
  			match_batting_name:document.getElementById("get_match_batting_name").value,
	  		match_run:document.getElementById("get_match_run").value,
	  		match_wicket:document.getElementById("get_match_wicket").value,
	  		match_over:document.getElementById("get_match_over").value
  		});
  	});
  	firstmatch.child('match_name').on('value',snapshot => {
  		document.getElementById("get_match_name").value=snapshot.val();
  	});
  	firstmatch.child('match_live_or_not').on('value',snapshot => {
  		document.getElementById("get_match_live_or_not").value=snapshot.val();
  	});
  	firstmatch.child('match_batting_name').on('value',snapshot => {
  		document.getElementById("get_match_batting_name").value=snapshot.val();
  	});
  	firstmatch.child('match_run').on('value',snapshot => {
  		document.getElementById("get_match_run").value=snapshot.val();
  	});
  	firstmatch.child('match_wicket').on('value',snapshot => {
  		document.getElementById("get_match_wicket").value=snapshot.val();
  	});
  	firstmatch.child('match_over').on('value',snapshot => {
  		document.getElementById("get_match_over").value=snapshot.val();
  	});
</script>

</body>
</html>
