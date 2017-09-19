
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Cheque</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/pr/'.$pr_account_id) }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'pr/validate_new_check/'.$pr_account_id,'files'=>true]) !!}
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="cur_date" class="datepicker form-control" placeholder="yyyy-mm-dd" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('cur_date'))
                                    <p class="help-block">{{ $errors->first('cur_date') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input type="text" name="bank" class="form-control">                                            
                                    @if($errors->has('bank'))
                                    <p class="help-block">{{ $errors->first('bank') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Branch</label>
                                    <input type="text" name="branch" class="form-control">                                            
                                    @if($errors->has('branch'))
                                    <p class="help-block">{{ $errors->first('branch') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Check No.</label>
                                    <input type="text" name="check_no" class="form-control">                                            
                                    @if($errors->has('check_no'))
                                    <p class="help-block">{{ $errors->first('check_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="amount" class="number_only form-control">                                            
                                    @if($errors->has('amount'))
                                    <p class="help-block">{{ $errors->first('amount') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Prepared By</label>
                                    <input type="text" name="prepared_by" class="form-control">                                            
                                    @if($errors->has('prepared_by'))
                                    <p class="help-block">{{ $errors->first('prepared_by') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Received By</label>
                                    <input type="text" name="received_by" class="form-control">                                            
                                    @if($errors->has('received_by'))
                                    <p class="help-block">{{ $errors->first('received_by') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control"></textarea>                                            
                                    @if($errors->has('received_by'))
                                    <p class="help-block">{{ $errors->first('received_by') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file" name="uploaded_file" class="form-control">                                            
                                    @if($errors->has('uploaded_file'))
                                    <p class="help-block">{{ $errors->first('uploaded_file') }}</p>
                                    @endif
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
        
    });
</script>
@endsection