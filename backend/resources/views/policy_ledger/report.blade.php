<html>
<head>
	<title>Report</title>
	<style type="text/css">
		table {
			font-size: 8pt;
			font-family: arial;
		}
		table > thead > tr > th {
			padding: 5px;
		}
		table > tbody > tr {
				
		}
		td {
			border-top: 1px;
			border-color: red;
		}
	</style>
</head>
<body>
	<div style="width: 100%;height: 100%;margin: auto;">
		<table style="width: 50%;">
			<tr><td><h4>DATE: 
			@if(isset($inputs['start']) && isset($inputs['end']))
				{{ date('M d, Y', strtotime($inputs['start'])) ." - ". date('M d, Y', strtotime($inputs['end'])) }}
			@else
				ALL
			@endif
			</h4></td><td><h4>LEDGER</h4></td></tr>
		</table>
		<table>
			<thead>
				<tr>
					<th>Ledger ID</th>
					<th>Date Issue</th>
					<th>Assured Name</th>
					<th>Contact</th>
					<th>Year Model</th>
					<th>Insurance Comp.</th>
					<th>Inception Date</th>
					<th>Value</th>
					<th>Financing</th>
					<th>Premium</th>
					<th>Net Premium</th>
					<th>Income</th>
					<th>Commission</th>
					<th>Agent</th>
					<th>Policy No.</th>
					<th>PR No.</th>
					<th>CV No.</th>
					<th>Remarks</th>					
				</tr>
			</thead>
			<tbody>
				@if(!empty($records))
					@foreach($records as $k => $record) 
						<tr>
							<td>{{ $record['ledger_id'] }}</td>
							<td>{{ $record['date_issue'] }}</td>
							<td>{{ strtoupper($record['assured_name']) }}</td>
							<td>{{ $record['contact_no'] }}</td>
							<td>{{ $record['year_model'] }}</td>
							<td>{{ $record['insurance_company'] }}</td>
							<td>{{ $record['inception_date_from']." - ". $record['inception_date_to'] }}</td>
							<td>{{ $record['value'] }}</td>
							<td>{{ strtoupper($record['financing']) }}</td>
							<td>{{ $record['premium']}}</td>
							<td>{{ $record['net_premium'] }}</td>
							<td>{{ $record['income'] }}</td>
							<td>{{ $record['commission'] }}</td>
							<td>{{ strtoupper($record['agent']) }}</td>
							<td>{{ $record['policy_no'] }}</td>
							<td>{{ $record['pr_no'] }}</td>
							<td>
							@foreach($record['cv'] as $cv)
								{{ $cv->cv_no.", " }}
							@endforeach
							</td>
							<td>{{ strtoupper($record['remarks']) }}</td>							
						</tr>
					@endforeach
				@endif				
			</tbody>
		</table>
	</div>
</body>
</html>