<?php
  var_dump($_GET);
  var_dump($_POST);
?>		

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>My First HTML Form</title>
	</head>

	<body>

		<section calls="form">
			<h2>User Login</h2>
			<form method="POST" action="/my_first_form.php">

				<p>
			    	<label for="username">Username</label>
			    	<input id="username" name="username" type="text" placeholder="username" autofocus required>
			    </p>
			    <p>
				    <label for="password">Password</label>
				    <input id="password" name="password" type="password" placeholder="password" required>
				</p>

				<p>
				    <button>Login</button>
				</p>

			</form>
		</section>

		<section class="form">
			<h2>Compose An Email</h2>
			<form method="POST" action="/my_first_form.php">

				<p>
					<label for="to">To</label>
					<input id="to" name="to" type="text" placeholder="To" required>
				</p>
				<p>
					<label for="from">From</label>
					<input id="from" name="from" type="text" placeholder="From" required>
				</p>
				<p>
					<label for="subject">Subject</label>
					<input id="subject" name="subject" type="text" placeholder="Subject" required>
				</p>
				<p>
					<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="This is where your message goes!"></textarea>
				</p>
				
				<input type="checkbox" id="save_email_to_sent_folder" name="save_email_to_sent_folder" value="yes" checked>
				<label for="save_email_to_sent_folder">Would you like to save a copy of your email in your Sent Folder?</label>

				<p>
					<button>Send</button>
				</p>

			</form>
		</section>

		<section class="form">
			<h2>Multiple Choice Test</h2>
			<form method="POST" action="/my_first_form.php">

				<p>What does the variable "c" stand for in Einstein's Famous E=Mc^2 equation?</p>
				<label>
					<input type="radio" name="q1" value="Cats!">
					Cats
				</label>
				<label>
					<input type="radio" name="q1" value="Cansas! Right? Wait...">
					Cansas! Right? Wait...
				</label>
				<label>
					<input type="radio" name="q1" value="The Speed of Light">
					The Speed of Light
				</label>
				<label>
					<input type="radio" name="q1" value="Acceleration">
					Acceleration
				</label>

				<p>In what year did Einstein publish his works on General Relativity?</p>
				<label>
					<input type="radio" name="q2" value="1900">
					1900
				</label>
				<label>
					<input type="radio" name="q2" value="1914">
					1914
				</label>
				<label>
					<input type="radio" name="q2" value="1985">
					1985
				</label>
				<label>
					<input type="radio" names="q2" value="2007">
					2007
				</label>

				<p>Which, of the following physicists, worked closely with Albert Einstein?</p>
				<label><input type="checkbox" id="phys1" name="phys[]" value="Minkowski">Minkowski</label>
				<label><input type="checkbox" id="phys2" name="phys[]" value="Bohr">Bohr</label>
				<label><input type="checkbox" id="phys3" name="phys[]" value="T'hooft">T'hooft</label>

				<p>
					<label for="quotes">Which, of the following, are actual quotes from Albert Einstein?</label> <br>

					<select id="quotes" name="quotes[]" multiple>
						<option value="1">You can't blame gravity for falling in love.</option>
						<option value="2">God doesn't play dice!</option>
						<option value="3">You have to learn the rules of the game. And then you have to play better than anyone else.</option>
					</select>
				</p>

				<p>
				<button>Submit Answers</button>
				</p>

			</form>
		</section>

		<section>
			<h2>Select Testing</h2>
			<form method="POST" action="/my_first_form.php">
				<p>
					<label for="terms">Do you agree to the Terms of Service?</label>
					<select id="terms" name="terms">
						<option value="1">Yes</option>
						<option selected value="0">No</option>
					</select>

					<button>Submit</button>
				</p>
			</form>
		</section>

	</body>

</html>