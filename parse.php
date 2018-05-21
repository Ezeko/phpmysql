<?php

$title = 'Personal Assistant';

//include header template
require('layout/header.php'); 
//if form has been submitted process it
if(isset($_POST['submit'])){

    if (!isset($_POST['referrer'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['rating'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['rating1'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['rating2'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['rating3'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['comments'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['subscribe'])) $error[] = "Please fill out all fields";
    
    $referrer=$_POST['referrer'];
    $rating=$_POST['rating'];
    $rating1=$_POST['rating1'];
    $rating2=$_POST['rating2'];
    $rating3=$_POST['rating3'];
    $comments=$_POST['comments'];
    $subscribe=$_POST['subscribe'];
try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO review (referrer,rating,rating1,rating2, rating3,comments, subscribe) VALUES (:referrer, :rating, :rating1, :rating2, :rating3, :comments, :subscribe)');
			$stmt->execute(array(
				':referrer' => $referrer,
				':rating' => $rating,
				':rating1' => $rating1,
				':rating2' => $rating2,
				':rating3' => $rating3,
				':comments' => $comments,
				':subscribe' => $subscribe
			));
			//send email
			$to = $_POST['email'];
			$subject = "Review Confirmation";
			$body = "<p>Thank you for your review at Persornalassistant.com.ng.</p>
			<p>Personal Assistant promises to keep intouch.</p>
			<p>For more information you can write to us  via Email Persona1@personalassistant.com.ng </p>
			<p>Regards Assistant Ogunmoye Segun</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: memberpage.php?action=success');
			exit;
				//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
}


?>
	<h2> Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
				<p><a href='logout.php'>Logout</a></p>
				<hr>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-"
	    
	    >
	        <form role="form" method="post" action="" autocomplete="on">
			
			<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'success'){
					echo "<h4 class='bg-success'>Your Review was successful, please check your email for your comfirmation account.</h4>";
				}
				?>
<fieldset>
<legend>
Your Details:
</legend>
<label>
Name: <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?>
</label>
<br/>
<label>
Email:<?php $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		print '<pre>'.$row.'</pre>';
     ?>
		
</label>
</fieldset>

<br/>
<fieldset>
<legend>
Your Review:
</legend>
<p>
<label for="referrer">
How did you  hear  about <bold>Personal Assistant</bold>?
</label>
<select name="referrer" id="referrer">
<option value="Google">Google</option>
<option value="Facebook">Facebook</option>
<option value="Friend">Friend</option>
<option value="Advert">Advert</option>
<option value="Other">Other</option>
</select>
</p>
<br/>

<p>
<label for='referrer'>Does the word Personal Assistant sound <b>Appealing</b> to you? </label>
<br/>
<label><input type="radio" name="rating" value="yes" />Yes</label>

<label><input type="radio" name="rating" value="no" />No</label>

<label><input type="radio" name="rating" value="donotknow" />Do not know</label>
</p>
<br/>

<p>
<label for='rating1'>Would you love to be MR Mark's Personal Assistant for a little amount of cash?</label>
<br/>
<label><input type="radio" name="rating1" value="yes" />Yes</label>
<label><input type="radio" name="rating1" value="no" />No</label>
<label><input type="radio" name="rating1" value="do not know" />Do not know</label>
</p>
<br/>

<p>
<label for='rating2'>Would you love MR Mark be your Personal Assistant for a little amount of cash?</label>
<br/>
<label><input type="radio" name="rating2" value="yes" />Yes</label>
<label><input type="radio" name="rating2" value="no" />No</label>
<label><input type="radio" name="rating2" value="donotknow" />Do not know</label>
</p>
<br/>

<p>
<label for='rating3'>Would you visit again?</label>
<br/>
<label><input type="radio" name="rating3" value="yes" />Yes</label>
<label><input type="radio" name="rating3" value="no" />No</label>
<label><input type="radio" name="rating3" value="maybe" />Maybe</label>
</p>
<br/>

<p>
<label for="comments">Comments:</label>
<br/>
<textarea rows="4" cols="40" id="comments" name=comments>
</textarea>
</p>
<br/>

<label for='subscribe'><input type="checkbox" name="subscribe" checked="checked" />Sign me up for Email updates</label>
<br/>
</fieldset>
<button type="submit" name='submit' value='submit'>Submit</button>

</form>
<hr>
&copy Personalassistant.com.ng

		</div>
	</div>

	?>