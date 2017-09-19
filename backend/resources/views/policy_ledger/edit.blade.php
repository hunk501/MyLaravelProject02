
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ledger Edit</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('policy_ledger') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['method'=>'PUT','url'=>'policy_ledger/'.$id,'files'=>true]) !!}
                                <div class="form-group">
                                    <label>Date Issue</label>
                                    <input type="text" name="date_issue" placeholder="YYYY-MM-DD" class="datepicker form-control" value="{{ $record['date_issue'] }}" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('date_issue'))
                                    <p class="help-block">{{ $errors->first('date_issue') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Assured Name</label>
                                    <input type="text" name="assured_name" class="form-control" value="{{ $record['assured_name'] }}">
                                    @if($errors->has('assured_name'))
                                    <p class="help-block">{{ $errors->first('assured_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" name="contact_no" class="form-control" value="{{ $record['contact_no'] }}">
                                    @if($errors->has('contact_no'))
                                    <p class="help-block">{{ $errors->first('contact_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Year Model</label>
                                    <input type="text" name="year_model" class="form-control" value="{{ $record['year_model'] }}">
                                    @if($errors->has('year_model'))
                                    <p class="help-block">{{ $errors->first('year_model') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Insurance Comp.</label>
                                    <select name="insurance_company" class="form-control">
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
                                    <input type="text" class="form-control" value="{{ $record['policy_no'] }}" readonly="true">
                                    @if($errors->has('policy_no'))
                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Inception Date</label>
                                    <input type="text" name="inception_date" class="datepicker form-control" value="{{ $record['inception_date_from'] }}" placeholder="YYYY-MM-DD" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('inception_date'))
                                    <p class="help-block">{{ $errors->first('inception_date') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Financing</label>
                                    <input type="text" name="financing" class="form-control" value="{{ $record['financing'] }}">                                            
                                    @if($errors->has('financing'))
                                    <p class="help-block">{{ $errors->first('financing') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="text" name="value" class="number_only form-control" value="{{ $record['value'] }}">                                            
                                    @if($errors->has('value'))
                                    <p class="help-block">{{ $errors->first('value') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Premium</label>
                                    <input type="text" name="premium" class="number_only form-control" value="{{ $record['premium'] }}">                                            
                                    @if($errors->has('premium'))
                                    <p class="help-block">{{ $errors->first('premium') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Net Premium</label>
                                    <input type="text" name="net_premium" class="number_only form-control" value="{{ $record['net_premium'] }}">                                            
                                    @if($errors->has('net_premium'))
                                    <p class="help-block">{{ $errors->first('net_premium') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Agent</label>
                                    <input type="text" name="agent" class="form-control" value="{{ $record['agent'] }}">                                            
                                    @if($errors->has('agent'))
                                    <p class="help-block">{{ $errors->first('agent') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Commission</label>
                                    <input type="text" name="commission" class="number_only form-control" value="{{ $record['commission'] }}">                                            
                                    @if($errors->has('commission'))
                                    <p class="help-block">{{ $errors->first('commission') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Income</label>
                                    <input type="text" name="income" class="number_only form-control" value="{{ $record['income'] }}">                                            
                                    @if($errors->has('income'))
                                    <p class="help-block">{{ $errors->first('income') }}</p>
                                    @endif
                                </div>                                
                                <div class="form-group">
                                    <label>PR No.</label>
                                    <input type="text" name="pr_no" class="form-control" value="{{ $record['pr_no'] }}">                                            
                                    @if($errors->has('pr_no'))
                                    <p class="help-block">{{ $errors->first('pr_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>
                                        Check Voucher: 
                                        @if(!empty($record['cv_no']))
                                            @foreach($record['cv_no'] as $cv)
                                            <span><a target="_blank" href="{{ url('uploads/'.$cv->uploaded_file) }}">{{ $cv->cv_no }}</a></span>
                                            @endforeach
                                        @endif
                                    </label>
                                    <p>
                                        <span><a id="add_file" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                        <span><a id="remove_file" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                    </p>
                                    <div id="file_div">                                   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" name="remarks" class="form-control" value="{{ $record['remarks'] }}">                                            
                                    @if($errors->has('remarks'))
                                    <p class="help-block">{{ $errors->first('remarks') }}</p>
                                    @endif
                                </div>
                                <input type="submit" name="submit" value="Update Change" class="btn btn-primary">                                                                               
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
        var count = 0;
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
        
        // Add File
        $("#add_file").on('click', function(){
            count++;                       
            var _txt = "<div class='form-group file_div_"+ count +"'><table><tr><td><input type='text' name='cv_no[]' placeholder='CV Number' class='form-control'></td><td><input type='file' name='cv_uploaded_files[]' class='form-control'></td></tr></table></div>";            
            $("#file_div").append(_txt);
            
            console.log("Add:", count);
        });
        // Remove File
        $("#remove_file").on('click', function(){
            $(".file_div_"+ count).remove();
            if(count > 0) {
                count--;
            } else {
                count = 0;
            }
            console.log("remove:", count);
        });
        
    });
</script>
@endsection