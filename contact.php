<?php
	include_once("header.php");
?>
<div id="body">
		<div id="featured">
			<h3>Customers are contact us on following address:</h3>
		</div>
		<div id="content">
			<div id="contact">
				<p>
					At SN tailor, We dispel the myth that quality bespoke suits come at a heavy price. We operate with conviction, that high end bespoke tailoring should be accessible to all. Our custom tailoring offer a modern cut but are made using age old hand-tailoring techniques, whilst delivered with personal touch.
We do not over complicate things, operating from small but intimate premises with our highly experienced cutters, stitches, We offer tailored to suit full canvas, semi and full hand stitched or semi hand stitched, All our custom clothing start with fabric selection, style selection, measurement, pattern creation, cutting, fitting, stitching and for future order retained your sizes.
				</p>
				<div>
					<div>
						<h3>Shop details</h3>
						<h3>Location</h3>
						<p>
							M.G.Road,Telikhunt,Ahmednagar,Dist.Ahmednagar
						</p>
						<h3>Email</h3>
						<p>
							sntailor@gmail.com
						</p>
						<h3>Call</h3>
						<p>
							987 654 3210<br>765 432 1098<br>210 987 6543
						</p>
						<h3>Bussiness hours</h3>
						<p>
							Monday to Friday : 9AM - 8PM
						</p>
					</div>
					<form action="sendmail.php" method="post">
						<h3>Send a Message <span> <?php if($_REQUEST['msg']) echo "Message send ".$_REQUEST['msg'];?></span></h3>
						<label for="name"><span>Your Name:</span>
							<input type="text" id="name" name="name" />
						</label>
						<label for="email"><span>Email:</span>
							<input type="text" id="email" name="email" />
						</label>
						<label for="subject"><span>Subject: </span>
							<input type="text" id="subject" name="subject" />
						</label>
						<label for="message"><span class="message">Message:</span>
							<textarea name="message" id="message" cols="30" rows="10"></textarea>
						</label>
						<input type="submit" id="submit" name="submit" value="Send message">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
include_once("footer.php");
?>