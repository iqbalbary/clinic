<?php
//Deposit Lists

require_once('../header.php');
if(!$isSession ){
    header("Location: ".$base_url."index.php");
}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>List of payment</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Profile Name</th>
						<th>Amount</th>
						<th>Month</th>
						<th>......</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Md Sample</td>
						<td>10000</td>
						<td>January, 2020</td>
						<td>.....</td>
					</tr>
					<tr>
						<td>Md Sample</td>
						<td>10000</td>
						<td>January, 2020</td>
						<td>.....</td>
					</tr>
					<tr>
						<td>Md Sample</td>
						<td>10000</td>
						<td>January, 2020</td>
						<td>.....</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once('../footer.php');