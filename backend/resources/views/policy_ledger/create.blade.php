
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ledger Create</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('policy_ledger') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'policy_ledger','files'=>true]) !!}
                                <div class="form-group">
                                    <label>Date Issue</label>
                                    <input type="text" name="date_issue" placeholder="YYYY-MM-DD" class="datepicker form-control" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('date_issue'))
                                    <p class="help-block">{{ $errors->first('date_issue') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Assured Name</label>
                                    <input type="text" name="assured_name" class="form-control">
                                    @if($errors->has('assured_name'))
                                    <p class="help-block">{{ $errors->first('assured_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_no" class="form-control">                                            
                                    @if($errors->has('contact_no'))
                                    <p class="help-block">{{ $errors->first('contact_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Year Model</label>
                                    <input type="text" name="year_model" class="form-control">
                                    @if($errors->has('year_model'))
                                    <p class="help-block">{{ $errors->first('year_model') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Insurance Comp.</label>
                                    <select name="insurance_company" class="form-control">
                                        <option>FPG</option>
                                        <option>Peoples</option>
                                        <option>Standard</option>                                        
                                    </select>
                                    @if($errors->has('insurance_company'))
                                    <p class="help-block">{{ $errors->first('insurance_company') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Policy No.</label>
                                    <input type="text" name="policy_no" class="form-control">
                                    @if($errors->has('policy_no'))
                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Inception Date</label>
                                    <input type="text" name="inception_date" class="datepicker form-control" placeholder="YYYY-MM-DD" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('inception_date'))
                                    <p class="help-block">{{ $errors->first('inception_date') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Financing</label>
                                    <input type="text" name="financing" class="form-control">                                            
                                    @if($errors->has('financing'))
                                    <p class="help-block">{{ $errors->first('financing') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="text" name="value" class="number_only form-control">                                            
                                    @if($errors->has('value'))
                                    <p class="help-block">{{ $errors->first('value') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Premium</label>
                                    <input type="text" name="premium" class="number_only form-control">                                            
                                    @if($errors->has('premium'))
                                    <p class="help-block">{{ $errors->first('premium') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Net Premium</label>
                                    <input type="text" name="net_premium" class="number_only form-control">                                            
                                    @if($errors->has('net_premium'))
                                    <p class="help-block">{{ $errors->first('net_premium') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Agent</label>
                                    <input type="text" name="agent" class="form-control">                                            
                                    @if($errors->has('agent'))
                                    <p class="help-block">{{ $errors->first('agent') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Commission</label>
                                    <input type="text" name="commission" class="number_only form-control">                                            
                                    @if($errors->has('commission'))
                                    <p class="help-block">{{ $errors->first('commission') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Income</label>
                                    <input type="text" name="income" class="number_only form-control">                                            
                                    @if($errors->has('income'))
                                    <p class="help-block">{{ $errors->first('income') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>PR No.</label>
                                    <input type="text" name="pr_no" class="form-control">                                            
                                    @if($errors->has('pr_no'))
                                    <p class="help-block">{{ $errors->first('pr_no') }}</p>
                                    @endif
                                </div>
                                <!--
                                <div class="form-group">
                                    <label>Check Voucher</label>
                                    <input type="file" name="cv_no" class="form-control">                                            
                                    @if($errors->has('cv_no'))
                                    <p class="help-block">{{ $errors->first('cv_no') }}</p>
                                    @endif
                                </div>
                                -->
                                <div class="form-group">
                                    <label>Check Voucher</label>
                                    <p>
                                        <span><a id="add_file" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                        <span><a id="remove_file" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                    </p>
                                    <div id="file_div">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><input type='text' name='cv_no[]' placeholder='CV Number' class='form-control'></td>
                                                    <td><input type="file" name="cv_uploaded_files[]" class="form-control"></td>
                                                </tr>
                                            </table>                                                                                   
                                        </div>                                    
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label>Endorsement</label>
                                    <p>
                                        <span><a id="add_file2" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                        <span><a id="remove_file2" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                    </p>
                                    <div id="file_div2">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><input type='text' name='end_no[]' placeholder='Endorsement Number' class='form-control'></td>
                                                    <td><input type="file" name="end_uploaded_files[]" class="form-control"></td>
                                                </tr>
                                            </table>                                                                                   
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>TPL</label>
                                    <p>
                                        <span><a id="add_file3" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                        <span><a id="remove_file3" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                    </p>
                                    <div id="file_div3">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><input type='text' name='tpl_no[]' placeholder='TPL Number' class='form-control'></td>
                                                    <td><input type="file" name="tpl_uploaded_files[]" class="form-control"></td>
                                                </tr>
                                            </table>                                                                                   
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" name="remarks" class="form-control">                                            
                                    @if($errors->has('remarks'))
                                    <p class="help-block">{{ $errors->first('remarks') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Banks Submitted</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">No
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option2">Yes, please add file
                                        </label>
                                        <br><br>                                      
                                        <div class="banks_files">
                                            
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
        var count = 0;
        var count2 = 0;
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
        
        // -------- 1 Add File
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
        
        //------- 2 Add File2
        $("#add_file2").on('click', function(){
            count2++;                       
            var _txt = "<div class='form-group file_div2_"+ count2 +"'><table><tr><td><input type='text' name='end_no[]' placeholder='Endorsement Number' class='form-control'></td><td><input type='file' name='end_uploaded_files[]' class='form-control'></td></tr></table></div>";            
            $("#file_div2").append(_txt);
            
            console.log("Add:", count2);
        });
        // Remove File
        $("#remove_file2").on('click', function(){
            $(".file_div2_"+ count2).remove();
            if(count2 > 0) {
                count2--;
            } else {
                count2 = 0;
            }
            console.log("remove:", count2);
        });
        
        //------- 3 Add File3
        $("#add_file3").on('click', function(){
            count3++;                       
            var _txt = "<div class='form-group file_div3_"+ count3 +"'><table><tr><td><input type='text' name='tpl_no[]' placeholder='TPL Number' class='form-control'></td><td><input type='file' name='tpl_uploaded_files[]' class='form-control'></td></tr></table></div>";            
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
        
        
        // Banks
        $("input[name='optionsRadios']").change(function(){
            var val = $(this).val();
            if(val == 'option2') {
                $(".banks_files").html("<input type='file' name='banks_file' />");
            } else {
                $(".banks_files").html("");
            }
        });
        $("#optionsRadios1").attr("checked","checked");
    });
</script>
@endsection