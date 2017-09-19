
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Create</h1>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/cm') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['url'=>'cm','files'=>true]) !!}
                                <div class="form-group">
                                    <label>Assured Name</label>
                                    <input type="text" name="assured_name" class="form-control"/>
                                    @if($errors->has('assured_name'))
                                    <p class="help-block">{{ $errors->first('assured_name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Policy No.</label>
                                    <input type="text" name="policy_no" class="form-control"/>
                                    @if($errors->has('policy_no'))
                                    <p class="help-block">{{ $errors->first('policy_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Claims No.</label>
                                    <input type="text" name="claims_no" class="form-control">
                                    @if($errors->has('claims_no'))
                                    <p class="help-block">{{ $errors->first('claims_no') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Police Report</label>
                                    <input type="file" name="police_report" class="form-control">
                                    @if($errors->has('police_report'))
                                    <p class="help-block">{{ $errors->first('police_report') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Affidavit Report</label>
                                    <input type="file" name="affidavet_report" class="form-control">                                            
                                    @if($errors->has('affidavit_report'))
                                    <p class="help-block">{{ $errors->first('affidavit_report') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>OR/CR</label>
                                    <input type="file" name="or_cr" class="form-control">                                            
                                    @if($errors->has('or_cr'))
                                    <p class="help-block">{{ $errors->first('or_ccr') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Driver's License</label>
                                    <input type="file" name="drivers_license" class="form-control">                                            
                                    @if($errors->has('drivers_license'))
                                    <p class="help-block">{{ $errors->first('drivers_license') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Picture(Incident)</label>
                                    <input type="file" name="picture_incident" class="form-control">                                            
                                    @if($errors->has('picture_incident'))
                                    <p class="help-block">{{ $errors->first('picture_incident') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Repair Estimate</label>
                                    <input type="file" name="repair_estimate" class="form-control">                                            
                                    @if($errors->has('repair_estimate'))
                                    <p class="help-block">{{ $errors->first('repair_estimate') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Claims Office</label>
                                    <input type="text" name="claims_officer" class="form-control">                                            
                                    @if($errors->has('claims_officer'))
                                    <p class="help-block">{{ $errors->first('claims_officer') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control"></textarea>
                                    @if($errors->has('remarks'))
                                    <p class="help-block">{{ $errors->first('remarks') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>LOA</label>
                                    <input type="file" name="loa" class="form-control">
                                    @if($errors->has('loa'))
                                    <p class="help-block">{{ $errors->first('loa') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Premium Guarantee</label>
                                    <input type="file" name="premium_guarantee" class="form-control">
                                    @if($errors->has('premium_guarantee'))
                                    <p class="help-block">{{ $errors->first('premium_guarantee') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>CNC</label>
                                    <input type="file" name="cnc" class="form-control">
                                    @if($errors->has('cnc'))
                                    <p class="help-block">{{ $errors->first('cnc') }}</p>
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
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
        $( "#inception_date" ).datepicker();
    });
</script>
@endsection