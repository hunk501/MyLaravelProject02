
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit</h3>                    
            </div>                
        </div><!-- /.col-lg-12 -->
        
        @if(Session::has('error'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ Session::get('error') }}
                </div>
            </div>
        </div>
        @endif
        
        {!! Form::open(['method'=>'PUT','url'=>'policy_ledger/'.$id,'files'=>true]) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('policy') }}"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Form #1</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                            <label>Policy No.:</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="policy_no" class="form-control" value="{{ $record['policy_no'] }}" readonly>
                                                @if($errors->has('policy_no'))
                                                <p class="help-block">{{ $errors->first('policy_no') }}</p>
                                                @endif
                                            </label>                                                                                   
                                        </div>
                                        <div class="form-group">
                                            <label>Class of Insurance</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="class_insurance" class="form-control" value="{{ $record['class_insurance'] }}">
                                                @if($errors->has('class_insurance'))
                                                <p class="help-block">{{ $errors->first('class_insurance') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Date Issue</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="date_issue" class="datepicker form-control" placeholder="YYYY-MM-DD" class="datepicker form-control" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);" value="{{ $record['date_issue'] }}">                                            
                                                @if($errors->has('date_issue'))
                                                <p class="help-block">{{ $errors->first('date_issue') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Agency/Broker</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="agency_broker" class="form-control" value="{{ $record['agency_broker'] }}">                                            
                                                @if($errors->has('agency_broker'))
                                                <p class="help-block">{{ $errors->first('agency_broker') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Assured Name</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="assured_name" class="form-control" value="{{ $record['assured_name'] }}">                                            
                                                @if($errors->has('assured_name'))
                                                <p class="help-block">{{ $errors->first('assured_name') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No.</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="contact_no" class="form-control" value="{{ $record['contact_no'] }}">                                            
                                                @if($errors->has('contact_no'))
                                                <p class="help-block">{{ $errors->first('contact_no') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <label class="checkbox-inline">
                                                <textarea name="address" class="form-control">{{ $record['address'] }}</textarea>                                                                                       
                                                @if($errors->has('address'))
                                                <p class="help-block">{{ $errors->first('address') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Inception Date</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="inception_date_from" class="datepicker form-control" placeholder="From" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);" value="{{ $record['inception_date_from'] }}">                                            
                                                @if($errors->has('inception_date_from'))
                                                <p class="help-block">{{ $errors->first('inception_date_from') }}</p>
                                                @endif
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="inception_date_to" class="datepicker form-control" placeholder="To" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);" value="{{ $record['inception_date_to'] }}">
                                                @if($errors->has('inception_date_to'))
                                                <p class="help-block">{{ $errors->first('inception_date_to') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Year Make Model</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="year_model" class="form-control" value="{{ $record['year_model'] }}">                                            
                                                @if($errors->has('year_model'))
                                                <p class="help-block">{{ $errors->first('year_model') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Insurance Comp.</label>
                                            <label class="checkbox-inline">
                                                <select name="insurance_company" class="form-control" value="{{ $record['insurance_company'] }}">
                                                    <option>FPG</option>
                                                    <option>Peoples</option>
                                                    <option>Standard</option>                                        
                                                </select>
                                                @if($errors->has('insurance_company'))
                                                <p class="help-block">{{ $errors->first('insurance_company') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Form #2</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                            <label>Plate Number</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="plate_number" class="form-control" value="{{ $record['plate_number'] }}">                                            
                                                @if($errors->has('plate_number'))
                                                <p class="help-block">{{ $errors->first('plate_number') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Serial Chassis</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="serial_chassis" class="form-control" value="{{ $record['serial_chassis'] }}">                                            
                                                @if($errors->has('serial_chassis'))
                                                <p class="help-block">{{ $errors->first('serial_chassis') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Motor Engine</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="motor_engine" class="form-control" value="{{ $record['motor_engine'] }}">                                            
                                                @if($errors->has('motor_engine'))
                                                <p class="help-block">{{ $errors->first('motor_engine') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Seating Capacity</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="seating_capacity" class="number_only form-control" value="{{ $record['seating_capacity'] }}">                                            
                                                @if($errors->has('seating_capacity'))
                                                <p class="help-block">{{ $errors->first('seating_capacity') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Color</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="color" class="form-control" value="{{ $record['color'] }}">                                            
                                                @if($errors->has('color'))
                                                <p class="help-block">{{ $errors->first('color') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Deductible</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="deductible" class="form-control" value="{{ $record['deductible'] }}">                                            
                                                @if($errors->has('deductible'))
                                                <p class="help-block">{{ $errors->first('deductible') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Authorized Repair Limit</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="authorized_repair_limit" class="form-control" value="{{ $record['authorized_repair_limit'] }}">                                            
                                                @if($errors->has('authorized_repair_limit'))
                                                <p class="help-block">{{ $errors->first('authorized_repair_limit') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Towing</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="towing" class="form-control" value="{{ $record['towing'] }}">                                            
                                                @if($errors->has('towing'))
                                                <p class="help-block">{{ $errors->first('towing') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Bodily Injury</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="bodily_injured" class="form-control" value="{{ $record['bodily_injured'] }}">                                            
                                                @if($errors->has('bodily_injured'))
                                                <p class="help-block">{{ $errors->first('bodily_injured') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Property Damage</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="property_damage" class="form-control" value="{{ $record['property_damage'] }}">                                            
                                                @if($errors->has('property_damage'))
                                                <p class="help-block">{{ $errors->first('property_damage') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Mortgagee</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="mortgagee" class="form-control" value="{{ $record['mortgagee'] }}">                                            
                                                @if($errors->has('mortgagee'))
                                                <p class="help-block">{{ $errors->first('mortgagee') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Act of Nature</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="act_of_nature" value="1" <?php echo ($record['act_of_nature'] == 1) ? 'checked':''; ?> > Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="act_of_nature" value="0" <?php echo ($record['act_of_nature'] == 0) ? 'checked':''; ?> > No
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Personal Accident</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="personal_accident" class="form-control" value="{{ $record['personal_accident'] }}">                                            
                                                @if($errors->has('personal_accident'))
                                                <p class="help-block">{{ $errors->first('personal_accident') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Writing Code</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="writing_code" class="form-control" value="{{ $record['writing_code'] }}">                                            
                                                @if($errors->has('writing_code'))
                                                <p class="help-block">{{ $errors->first('writing_code') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Form #3</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        
                                        
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
                                            <label>Policy Upload</label>
                                            <p>
                                                <span><a id="add_file4" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                                <span><a id="remove_file4" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                            </p>
                                            <div id="file_div4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>                                                            
                                                            <td><input type="file" name="plc_uploaded_files[]" class="form-control"></td>
                                                        </tr>
                                                    </table>                                                                                   
                                                </div>                                    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea name="remarks" class="form-control">{{ $record['remarks'] }}</textarea>                                                                                                                                 
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
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Form #4</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                            <label>PR No.</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="pr_no" class="form-control" value="{{ $record['pr_no'] }}">                                            
                                                @if($errors->has('pr_no'))
                                                <p class="help-block">{{ $errors->first('pr_no') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Financing</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="financing" class="form-control" value="{{ $record['financing'] }}">                                            
                                                @if($errors->has('financing'))
                                                <p class="help-block">{{ $errors->first('financing') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Value</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="value" class="number_only form-control" value="{{ $record['value'] }}">                                            
                                                @if($errors->has('value'))
                                                <p class="help-block">{{ $errors->first('value') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Premium</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="premium" class="number_only form-control" value="{{ $record['premium'] }}">                                            
                                                @if($errors->has('premium'))
                                                <p class="help-block">{{ $errors->first('premium') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Net Premium</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="net_premium" class="number_only form-control" value="{{ $record['net_premium'] }}">                                            
                                                @if($errors->has('net_premium'))
                                                <p class="help-block">{{ $errors->first('net_premium') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Agent</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="agent" class="form-control" value="{{ $record['agent'] }}">                                            
                                                @if($errors->has('agent'))
                                                <p class="help-block">{{ $errors->first('agent') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Commission</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="commission" class="number_only form-control" value="{{ $record['commission'] }}">                                            
                                                @if($errors->has('commission'))
                                                <p class="help-block">{{ $errors->first('commission') }}</p>
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Income</label>
                                            <label class="checkbox-inline">
                                                <input type="text" name="income" class="number_only form-control" value="{{ $record['income'] }}">                                            
                                                @if($errors->has('income'))
                                                <p class="help-block">{{ $errors->first('income') }}</p>
                                                @endif
                                            </label>
                                        </div>                                       
                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Submit Form" class="btn btn-success"/>
                    </div>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        {!! Form::close() !!}
    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function () {
        var count = 0;
        var count2 = 0;
        var count3 = 0;
        var count4 = 0;
        
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

      //------- 4 Add File4
        $("#add_file4").on('click', function(){
            count4++;                       
            var _txt = "<div class='form-group file_div4_"+ count4 +"'><table><tr><td><input type='file' name='plc_uploaded_files[]' class='form-control'></td></tr></table></div>";            
            $("#file_div4").append(_txt);
            
            console.log("Add:", count4);
        });
        // Remove File
        $("#remove_file4").on('click', function(){
            $(".file_div4_"+ count4).remove();
            if(count4 > 0) {
                count4--;
            } else {
                count4 = 0;
            }
            console.log("remove:", count4);
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