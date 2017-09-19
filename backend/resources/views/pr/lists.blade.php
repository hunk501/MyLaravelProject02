

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <br>
        </div>	
        
        @if(Session::has('success'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
        @endif
        
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<tbody>
						<tr><td><b>Name:</b> {{ strtoupper($name) }} </td><td><b>Total:</b> Php {{ number_format($total_amount, 2) }} </td></tr>
						<tr><td><b>Prepared By:</b> {{ (!empty($account['prepared_by'])) ? strtoupper($account['prepared_by']):'' }} </td><td><b>Received By:</b> {{ (!empty($account['received_by'])) ? strtoupper($account['received_by']):'' }}</td></tr>
						<tr><td><b>Payment Status:</b> {{ (!empty($account['payment_status'])) ? ucfirst($account['payment_status']):'' }} </td><td><b>Policy No.:</b> {{ (!empty($account['policy_no'])) ? $account['policy_no']:'' }} </td></tr>						
						<tr><td><b>Notes:</b> {{ (!empty($account['remarks'])) ? strtoupper($account['remarks']):'' }} </td><td><b>Premium: </b> Php {{ number_format($account['premium'], 2) }}</td></tr>
					</tbody>
				</table>
			</div>
		</div>		      

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/pr/addnewcheck/'.$pr_account_id) }}"><i class="fa fa-plus"></i> Add New</a>                            
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 8pt;">
                            <thead>
                                <tr>               
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Bank</th>
                                    <th>Check No.</th>
                                    <th>Branch</th>
                                    <th>Status</th>
                                    <th>Remarks</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
	                                @foreach($records as $key => $record)
	                                <tr row-id="{{ $record->pr_id }}" style="cursor: pointer;">
	                                    <td>{{ date("M-d-Y", strtotime($record->cur_date)) }}</td>
	                                    <td>Php {{ number_format($record->amount, 2) }}</td>
	                                    <td>{{ strtoupper($record->bank) }}</td>
	                                    <td>{{ strtoupper($record->check_no) }}</td>
	                                    <td>{{ strtoupper($record->branch) }}</td>
	                                    <td>
	                                    @if($record->bounce)
	                                    	Bounce
	                                    @else
	                                    	
	                                    @endif
	                                    </td>
	                                    <td>{{ $record->remarks }}</td>
	                                </tr>
	                                @endforeach
                                @endif	                                    	                                   
                            </tbody>
                        </table>
                    </div><!-- /.panel-body -->                        
                </div><!-- /.panel -->                    
            </div><!-- /.col-lg-12 -->                
        </div><!-- /.row -->

    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
        // Table click
        $("table > tbody > tr").on("click", function(){
            var row_id = $(this).attr("row-id");
            var url = $("base").attr("href");
            if(row_id != null) {
                location.href = url +"/pr/"+ row_id +"/edit";
            }           
        });
    });
</script>
@endsection