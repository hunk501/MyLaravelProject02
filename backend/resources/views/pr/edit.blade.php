
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Cheque</h4>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/pr/'.$pr_account_id) }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                    	<div class="row">
                    		{!! Form::open(['method'=>'PUT', 'url'=>'pr/'.$records['pr_id'], 'files'=>true ]) !!}
                    		
                    		<div class="col-lg-12">
                    			<ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
                                    <li><a href="#uploaded-files" data-toggle="tab">Uploaded Files</a></li>
                                </ul>
                                
                                <div class="tab-content">
                    				<div class="tab-pane fade in active" id="home">
                    					<br>                 		
                    					<table>
	                                    	<tbody>                                        		
	                                        	<tr><td style="padding: 7px;font-weight: bold;">Date:</td><td> {{ date('M d, Y', strtotime($records['cur_date'])) }} </td></tr>
	                                        	<tr><td style="padding: 7px;font-weight: bold;">Bank:</td><td> {{ strtoupper($records['bank']) }} </td></tr>
	                                        	<tr><td style="padding: 7px;font-weight: bold;">Branch:</td><td> {{ strtoupper($records['branch']) }} </td></tr>
	                                        	<tr><td style="padding: 7px;font-weight: bold;">Check No.:</td><td> {{ strtoupper($records['check_no']) }} </td></tr>
	                                        	<tr><td style="padding: 7px;font-weight: bold;">Amount:</td><td> Php {{ number_format($records['amount'], 2) }}</td></tr>	                                        	                                      
	                                   		</tbody>
	                                   </table>
	                                   <br>
	                                   <div class="form-group">
					                       <label>Payment Status</label>
					                       <label class="radio-inline">
					                       		<input type="radio" name="payment_status" value="partial" <?php echo ($records['payment_status'] == 'partial') ? 'checked':''; ?> > Partial
					                       </label>
					                       <label class="radio-inline">
					                       		<input type="radio" name="payment_status" value="full" <?php echo ($records['payment_status'] == 'full') ? 'checked':''; ?> > Full
					                       </label>
				                       </div>
	                    			</div>
	                    			<div class="tab-pane fade in" id="uploaded-files">
	                    				<br>
	                    				<div class="row">
	                    					@if(!empty($records['uploaded_files']))
	                    						@foreach($records['uploaded_files'] as $file)
	                    							<div class="col-lg-4">	                                        	
			                                            <a href="{{ url('uploads/'.$file->uploaded_file) }}" target="_blank"><img src="{{ url('uploads/'.$file->uploaded_file) }}" style="width: 300px;height: 300px;"/></a>
			                                        </div>
	                    						@endforeach
	                    					@endif 		                    			
                                        </div>
                                        <br><br>
                                        <div class="row">
		                    				<div class="form-group">
												<label>Upload File</label>
			                                    <p>
			                                        <span><a id="add_file3" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
			                                        <span><a id="remove_file3" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
			                                        </p>
			                                    <div id="file_div3">
			                                        <div class="form-group">
			                                        	<input type="file" name="uploaded_files[]">                                                                                 
			                                        </div>                                    
			                                    </div>
			                                </div>
		                                </div>
	                    			</div>
                    			</div>
                    			<br>
                    			<div class="form-group">
                    				<label>Remarks</label>
                    				<textarea name="remarks" class="form-control">{{ $records['remarks'] }}</textarea>
                    			</div>
                    			<br>
                    			<input type="hidden" name="pr_account_id" value="{{ $records['pr_account_id'] }}"/>
                                <input type="submit" name="update" value="Update Change" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="bounce_cheque" value="Bounce Cheque" class="btn btn-success">
                    			
                    		</div>                    	
                    		
                    		{!! Form:: close() !!}                    		
                    	</div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function () {
        var count3 = 0;
        
        $("#change_file").on("click", function(e){
            e.preventDefault();            
            var txt = $(this).text();
            if(txt == 'Change') {
                $("#uploaded_file").toggle().removeAttr("disabled");
                $(this).text("Cancel");
            } else {
                $("#uploaded_file").toggle().attr("disabled","disabled");
                $(this).text("Change");
            }
        });

        // Date Picker
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
        })
        .on('changeDate', function(){
            $(this).datepicker('hide');
        });

        // Numbers Only
        $(".number_only").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });


     	// Upload File
        $("#add_file3").on('click', function(){
            count3++;                       
            var _txt = "<div class='form-group file_div3_"+ count3 +"'><input type='file' name='uploaded_files[]'></div>";            
            $("#file_div3").append(_txt);
            
            console.log("Add:", count3);
        });
        // Remove File
        $("#remove_file3").on('click', function(){
            $(".file_div3_"+ count3).remove();
            if(count3 > 0) {
                count3--;
            } else {
                count3 = 0;
            }
            console.log("remove:", count3);
        });

		$("input[name='bounce_cheque']").submit(function(){
			alert('dvsdv');
			return false;
		});
    });
</script>
@endsection