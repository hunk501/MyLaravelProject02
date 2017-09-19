
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PR Create</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/pr') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'pr','files'=>true]) !!}
                                <div class="form-group">
                                    <label>PR No.</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="pr_id" class="form-control">
	                                    @if($errors->has('pr_id'))
	                                    <p class="help-block">{{ $errors->first('pr_id') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Assured Name:</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="firstname" class="form-control">
	                                    @if($errors->has('firstname'))
	                                    <p class="help-block">{{ $errors->first('firstname') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="bank" class="form-control">                                            
	                                    @if($errors->has('bank'))
	                                    <p class="help-block">{{ $errors->first('bank') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Branch</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="branch" class="form-control">                                            
	                                    @if($errors->has('branch'))
	                                    <p class="help-block">{{ $errors->first('branch') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Check No.</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="check_no" class="form-control">                                            
	                                    @if($errors->has('check_no'))
	                                    <p class="help-block">{{ $errors->first('check_no') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="amount" class="number_only form-control" Placeholder="Php">                                            
	                                    @if($errors->has('amount'))
	                                    <p class="help-block">{{ $errors->first('amount') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Payment In</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="payment_in" class="form-control">                                            
	                                    @if($errors->has('payment_in'))
	                                    <p class="help-block">{{ $errors->first('payment_in') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Policy No.</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="policy_no" class="form-control">                                            
	                                    @if($errors->has('policy_no'))
	                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="cur_date" class="datepicker form-control" placeholder="YYYY-MM-DD" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
	                                    @if($errors->has('cur_date'))
	                                    <p class="help-block">{{ $errors->first('cur_date') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Prepared By</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="prepared_by" class="form-control">                                            
	                                    @if($errors->has('prepared_by'))
	                                    <p class="help-block">{{ $errors->first('prepared_by') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Received By</label>
                                    <label class="checkbox-inline">
	                                    <input type="text" name="received_by" class="form-control">                                            
	                                    @if($errors->has('received_by'))
	                                    <p class="help-block">{{ $errors->first('receved_by') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                	<label>Notes</label>
                                   	<label class="checkbox-inline">
	                                    <textarea name="remarks" class="form-control"></textarea>                                            
	                                    @if($errors->has('remarks'))
	                                    <p class="help-block">{{ $errors->first('remarks') }}</p>
	                                    @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                	<label>Remarks</label>
                                   	<label class="radio-inline">
                                       	&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_status" value="partial" checked="">Partial
                                    </label>
                                    <label class="radio-inline">
                                    	<input type="radio" name="payment_status" value="full"> Full
                                    </label>
                                </div>
                                <div class="form-group">
									<label>Upload File</label>
                                    <p>
                                        <span><a id="add_file3" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                        <span><a id="remove_file3" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                        </p>
                                    <div id="file_div3">
                                        <div class="form-group">
                                        	<input type="file" name="uploaded_files[]" class="form-control">                                                                                 
                                        </div>                                    
                                    </div>
                                </div>                                                                                                        
                                <input type="submit" name="submit" value="Submit value" class="btn btn-primary">                                                                               
                                {!! Form:: close() !!}
                            </div>
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
            var _txt = "<div class='form-group file_div3_"+ count3 +"'><input type='file' name='uploaded_files[]' class='form-control'></div>";            
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