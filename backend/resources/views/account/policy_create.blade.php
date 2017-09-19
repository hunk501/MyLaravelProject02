
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Policy Create</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('policy') }}"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'policy','files'=>true]) !!}
                                <div class="form-group">
                                    <label>Policy No.</label>
                                    <input type="text" name="policy_no" class="form-control">
                                    @if($errors->has('policy_no'))
                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Class of Insurance</label>
                                    <input type="text" name="class_insurance" class="form-control">
                                    @if($errors->has('class_insurance'))
                                    <p class="help-block">{{ $errors->first('class_insurance') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Date Issue</label>
                                    <input type="text" name="date_issue" class="datepicker form-control" placeholder="YYYY-MM-DD" class="datepicker form-control" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">                                            
                                    @if($errors->has('date_issue'))
                                    <p class="help-block">{{ $errors->first('date_issue') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Agency/Broker</label>
                                    <input type="text" name="agency_broker" class="form-control">                                            
                                    @if($errors->has('agency_broker'))
                                    <p class="help-block">{{ $errors->first('agency_broker') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Insured</label>
                                    <input type="text" name="assured_name" class="form-control">                                            
                                    @if($errors->has('assured_name'))
                                    <p class="help-block">{{ $errors->first('assured_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" name="contact_no" class="form-control">                                            
                                    @if($errors->has('contact_no'))
                                    <p class="help-block">{{ $errors->first('contact_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control">                                            
                                    @if($errors->has('address'))
                                    <p class="help-block">{{ $errors->first('address') }}</p>
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
                                    <label>Year Make Model</label>
                                    <input type="text" name="year_model" class="form-control">                                            
                                    @if($errors->has('year_model'))
                                    <p class="help-block">{{ $errors->first('year_model') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Plate Number</label>
                                    <input type="text" name="plate_number" class="form-control">                                            
                                    @if($errors->has('plate_number'))
                                    <p class="help-block">{{ $errors->first('plate_number') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Serial Chassis</label>
                                    <input type="text" name="serial_chassis" class="form-control">                                            
                                    @if($errors->has('serial_chassis'))
                                    <p class="help-block">{{ $errors->first('serial_chassis') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Motor Engine</label>
                                    <input type="text" name="motor_engine" class="form-control">                                            
                                    @if($errors->has('motor_engine'))
                                    <p class="help-block">{{ $errors->first('motor_engine') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Seating Capacity</label>
                                    <input type="text" name="seating_capacity" class="number_only form-control">                                            
                                    @if($errors->has('seating_capacity'))
                                    <p class="help-block">{{ $errors->first('seating_capacity') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" name="color" class="form-control">                                            
                                    @if($errors->has('color'))
                                    <p class="help-block">{{ $errors->first('color') }}</p>
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
                                    <label>Deductible</label>
                                    <input type="text" name="deductible" class="form-control">                                            
                                    @if($errors->has('deductible'))
                                    <p class="help-block">{{ $errors->first('deductible') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Authorized Repair Limit</label>
                                    <input type="text" name="authorized_repair_limit" class="form-control">                                            
                                    @if($errors->has('authorized_repair_limit'))
                                    <p class="help-block">{{ $errors->first('authorized_repair_limit') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Towing</label>
                                    <input type="text" name="towing" class="form-control">                                            
                                    @if($errors->has('towing'))
                                    <p class="help-block">{{ $errors->first('towing') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Bodily Injured</label>
                                    <input type="text" name="bodily_injured" class="form-control">                                            
                                    @if($errors->has('bodily_injured'))
                                    <p class="help-block">{{ $errors->first('bodily_injured') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Property Damage</label>
                                    <input type="text" name="property_damage" class="form-control">                                            
                                    @if($errors->has('property_damage'))
                                    <p class="help-block">{{ $errors->first('property_damage') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mortgagee</label>
                                    <input type="text" name="mortgagee" class="form-control">                                            
                                    @if($errors->has('mortgagee'))
                                    <p class="help-block">{{ $errors->first('mortgagee') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Act of Nature</label>
                                    <input type="text" name="act_of_nature" class="form-control">                                            
                                    @if($errors->has('act_of_nature'))
                                    <p class="help-block">{{ $errors->first('act_of_nature') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Personal Accident</label>
                                    <input type="text" name="personal_accident" class="form-control">                                            
                                    @if($errors->has('personal_accident'))
                                    <p class="help-block">{{ $errors->first('personal_accident') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Writing Code</label>
                                    <input type="text" name="writing_code" class="form-control">                                            
                                    @if($errors->has('writing_code'))
                                    <p class="help-block">{{ $errors->first('writing_code') }}</p>
                                    @endif
                                </div>                                
                                <p>
                                    <span><a id="add_file" style="cursor: pointer;"><i class="fa fa-plus"></i> File</a></span> &nbsp;&nbsp;&nbsp;
                                    <span><a id="remove_file" style="cursor: pointer;"><i class="fa fa-trash"></i> Remove</a></span>
                                </p>
                                <div id="file_div">
                                    <div class="form-group">
                                        <input type="file" name="uploaded_files[]" class="form-control">                                        
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
            var _txt = "<div class='form-group file_div_"+ count +"'><input type='file' name='uploaded_files[]' class='form-control'></div>";
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