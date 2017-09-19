
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('policy_daily_transaction') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                        
                        	{!! Form::open(['method'=>'PUT','url'=>'policy_daily_transaction/'.$id,'files'=>true]) !!}
                        	
                        	<div class="col-lg-12">
                    			<ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
                                    <li><a href="#uploaded-files" data-toggle="tab">Receiving Copy</a></li>
                                </ul>
                                
                                <div class="tab-content">
                    				<div class="tab-pane fade in active" id="home">
                    					<br>                 		
                    					<div class="form-group">
		                                    <label>Date Issue</label>
		                                    <input type="text" placeholder="YYYY-MM-DD" class="form-control" value="{{ $record['date_issue'] }}" disabled>
		                                    @if($errors->has('date_issue'))
		                                    <p class="help-block">{{ $errors->first('date_issue') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Assured Name</label>
		                                    <input type="text" class="form-control" value="{{ $record['assured_name'] }}" disabled>
		                                    @if($errors->has('assured_name'))
		                                    <p class="help-block">{{ $errors->first('assured_name') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Insurance Comp.</label>
		                                    <select name="insurance_company" class="form-control" disabled>
		                                        <option <?php echo ($record['insurance_company'] == 'FPG') ? 'selected':''; ?> >FPG</option>
		                                        <option <?php echo ($record['insurance_company'] == 'Peoples') ? 'selected':''; ?> >Peoples</option>
		                                        <option <?php echo ($record['insurance_company'] == 'Standard') ? 'selected':''; ?> >Standard</option>                                        
		                                    </select>
		                                    @if($errors->has('insurance_company'))
		                                    <p class="help-block">{{ $errors->first('insurance_company') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Policy No.</label>
		                                    <input type="text" class="form-control" value="{{ $record['policy_no'] }}" disabled>
		                                    @if($errors->has('policy_no'))
		                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Premium</label>
		                                    <input type="text" class="number_only form-control" value="{{ $record['premium'] }}" disabled>                                            
		                                    @if($errors->has('premium'))
		                                    <p class="help-block">{{ $errors->first('premium') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Agent</label>
		                                    <input type="text" name="agent" class="form-control" value="{{ $record['agent'] }}" disabled>                                            
		                                    @if($errors->has('agent'))
		                                    <p class="help-block">{{ $errors->first('agent') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Remarks</label>
		                                    <input type="text" name="remarks" class="form-control" value="{{ $record['remarks'] }}">                                            
		                                    @if($errors->has('remarks'))
		                                    <p class="help-block">{{ $errors->first('remarks') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Delivery By</label>
		                                    <input type="text" name="delivery_by" class="form-control" value="{{ $record['delivery_by'] }}">                                            
		                                    @if($errors->has('delivery_by'))
		                                    <p class="help-block">{{ $errors->first('delivery_by') }}</p>
		                                    @endif
		                                </div>
		                                <div class="form-group">
		                                    <label>Location</label>
		                                    <input type="text" name="location" class="form-control" value="{{ $record['location'] }}">                                            
		                                    @if($errors->has('location'))
		                                    <p class="help-block">{{ $errors->first('location') }}</p>
		                                    @endif
		                                </div>
	                    			</div>
	                    			<div class="tab-pane fade in" id="uploaded-files">
	                    				<br>
	                    				<div class="row">
	                    					@if(!empty($record['receiving_copy']))
	                    						@foreach($record['receiving_copy'] as $file)
	                    							<div class="col-lg-4">	                                        	
			                                            <a href="{{ url('uploads/'.$file->receiving_copy_file) }}" target="_blank"><img src="{{ url('uploads/'.$file->receiving_copy_file) }}" style="width: 300px;height: 300px;"/></a>
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
                                <input type="submit" name="submit" value="Update Change" class="btn btn-primary">
                    			
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
        
    });
</script>
@endsection