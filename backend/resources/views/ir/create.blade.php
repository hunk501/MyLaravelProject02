
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">IR Create</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/ir') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'ir','files'=>true]) !!}
                                <div class="form-group">
                                    <label>Agency.</label>
                                    <select name="agency" class="form-control">
                                        <option>FPG</option>
                                        <option>Peoples</option>
                                        <option>Standard</option>                                        
                                    </select>
                                    @if($errors->has('nickname'))
                                    <p class="help-block">{{ $errors->first('agency') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Type.</label>
                                    <select name="type" class="form-control">
                                        <option>Motor Car</option>                                                                            
                                    </select>
                                    @if($errors->has('nickname'))
                                    <p class="help-block">{{ $errors->first('type') }}</p>
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
                                    <label>Nickname.</label>
                                    <input type="text" name="nickname" class="form-control">
                                    @if($errors->has('nickname'))
                                    <p class="help-block">{{ $errors->first('nickname') }}</p>
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
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control">                                            
                                    @if($errors->has('address'))
                                    <p class="help-block">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Year/Make</label>
                                    <input type="text" name="year_make" class="form-control">                                            
                                    @if($errors->has('year_make'))
                                    <p class="help-block">{{ $errors->first('year_make') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Serial No</label>
                                    <input type="text" name="serial_no" class="form-control">                                            
                                    @if($errors->has('serial_no'))
                                    <p class="help-block">{{ $errors->first('serial_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Engine No</label>
                                    <input type="text" name="engine_no" class="form-control">                                            
                                    @if($errors->has('engine_no'))
                                    <p class="help-block">{{ $errors->first('engine_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Inception Date From</label>
                                    <input type="text" id="inception_date" name="inception_date_from" class="datepicker form-control" placeholder="YYYY-MM-DD" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('inception_date_from'))
                                    <p class="help-block">{{ $errors->first('inception_date_from') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Inception Date To</label>
                                    <input type="text" id="inception_date_to" name="inception_date_to" class="datepicker form-control" placeholder="YYYY-MM-DD" readonly="true" style="cursor: pointer;background-color: rgba(255, 255, 255, 0.15);">
                                    @if($errors->has('inception_date_to'))
                                    <p class="help-block">{{ $errors->first('inception_date_to') }}</p>
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
                                    <label>Plate No</label>
                                    <input type="text" name="plate_no" class="form-control">                                            
                                    @if($errors->has('plate_no'))
                                    <p class="help-block">{{ $errors->first('plate_no') }}</p>
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
                                    <label>Assured Value</label>
                                    <input type="text" name="assured_value" class="number_only form-control">                                            
                                    @if($errors->has('assured_value'))
                                    <p class="help-block">{{ $errors->first('assured_value') }}</p>
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
        
        var _motorCarVal = "<option>Motor Car</option><option>Motor</option>";
        var _motorVal = "<option>Motor Car</option>";                
        
        // Agency
        $("select[name='agency']").on("change", function(){
            var _val = $(this).val();
            if(_val == "Standard") {
                $("select[name='type']").html(_motorCarVal);
            } else {
                $("select[name='type']").html(_motorVal);
            }
        });
        
        var cur_agency_val = $("select[name='agency']").val();
        if(cur_agency_val == "Standard") {
            $("select[name='type']").html(_motorCarVal);
        } else {
            $("select[name='type']").html(_motorVal);
        }    

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