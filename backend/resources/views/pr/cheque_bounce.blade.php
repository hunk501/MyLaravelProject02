

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bounce Cheque</h1>                    
            </div>
            <!-- /.col-lg-12 -->
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Table
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 9pt;">
                            <thead>
                                <tr>                                    
                                    <th>PR No.</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Bank</th>
                                    <th>Check No.</th>
                                    <th>Branch</th>                                            
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr row-id="{{ $record->pr_id }}" row-remarks="{{ $record->remarks }}" style="cursor: pointer;">											
                                    <td>{{ $record->pr_account_id }}</td>
                                    <td>{{ date("M-d-Y", strtotime($record->cur_date)) }}</td>
                                    <td>Php {{ number_format($record->amount, 2) }}</td>
                                    <td>{{ $record->bank }}</td>
                                    <td>{{ $record->check_no }}</td>
                                    <td>{{ $record->branch }}</td>                                    
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">Activate</h4>
			</div>
			<div class="modal-body">
			<form id="myForm">
				<div class="form-group">
					<label>Remarks:</label>
					<textarea name="remarks" class="form-control"></textarea>
				</div>
				<input type="hidden" name="pr_id"/>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success">Activate Cheque</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function () {
        var base = $("base").attr('href');
        
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
        // Table click
        $("table > tbody > tr").on("click", function(){
            var row_id = $(this).attr("row-id");
            var remarks = $(this).attr("row-remarks");
            var url = $("base").attr("href");
            $("input[name='pr_id']").val(row_id);
            $("textarea[name='remarks']").val(remarks);
            if(row_id != null) {
                //location.href = url +"/pr/"+ row_id +"/edit";
				$("#myModal").modal();
                //alert(row_id);
            }           
        });
		
        // Btn Success
        $(".btn-success").on('click', function(){			
			var _data = {"pr_id":$("input[name='pr_id']").val(), "remarks":$("textarea[name='remarks']").val(), "_token":$("input[name='_token']").val()};
			$.ajax({
				type:"POST",
				url: base +"/updateBounce",
				dataType: 'json',
				data: _data,
				success: function(json){
					console.log(json);
					if(json['status']) {
						location.href = base +"/pr_bounce";
					}
				},
				error: function(err){
					alert(err.responseText);
				}
			});
        });
    });
</script>
@endsection