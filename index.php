<?php
//Dashboard
require_once('header.php');

if($isSession){
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3>Total Active User: 22</h3>
			<h3>Total Amount: 2,00,00 TK</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>List of payment Per month(last 10 month)</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Month</th>
						<th>Number of participant</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>January, 2020</td>
						<td>22</td>
						<td>2,00,000</td>
					</tr>
					<tr>
						<td>December, 2019</td>
						<td>21</td>
						<td>2,00,000</td>
					</tr>
					<tr>
						<td>November, 2019</td>
						<td>23</td>
						<td>2,00,000</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php

}else{
	?>
	<div class="container">
		<a href="login.php"> Log In </a>
	</div>
	<?php 
}
require_once('footer.php');