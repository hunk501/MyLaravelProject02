
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Policy No.: {{ $record['policy_no'] }}</h3>                    
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('policy_ledger') }}"><i class="fa fa-arrow-left"></i> Back</a></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Motor Schedule</a></li>
                                    <li><a href="#check-voucher" data-toggle="tab">Check Voucher</a></li>
                                    <li><a href="#policy-receipt" data-toggle="tab">Policy Receipt</a></li>
                                    <li><a href="#endorsement" data-toggle="tab">Endorsement</a></li>
                                    <li><a href="#tpl" data-toggle="tab">TPL</a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                    <br>
                                        <table style="padding: 10px;">
                                        	<tbody>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Date Issue:</td><td>{{ date('M d, Y', strtotime($record['date_issue'])) }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Assured Name:</td><td>{{ $record['assured_name'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Contact No.:</td><td>{{ $record['contact_no'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Address:</td><td>{{ $record['address'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Year Model:</td><td>{{ $record['year_model'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Insurance Company:</td><td>{{ $record['insurance_company'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Policy No.:</td><td>{{ $record['policy_no'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Inception Date:</td><td>{{ date('M d, Y', strtotime($record['inception_date_from'])) }} - {{ date('M d, Y', strtotime($record['inception_date_to'])) }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Value:</td><td>{{ $record['value'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Financing:</td><td>{{ $record['financing'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Premium:</td><td>{{ $record['premium'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Net Premium:</td><td>{{ $record['net_premium'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Agent:</td><td>{{ $record['agent'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Commission:</td><td>{{ $record['commission'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Income:</td><td>{{ $record['income'] }}</td></tr>                                        		
                                        	</tbody>
                                        </table>
                                        <hr>
                                        <table>
                                        	<tbody>                                        		
                                        		<tr><td style="padding: 7px;font-weight: bold;">Remarks:</td><td>{{ $record['remarks'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Delivered By:</td><td>{{ $record['delivery_by'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Location:</td><td>{{ $record['location'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Class Insurance:</td><td>{{ $record['class_insurance'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Agency/Broker:</td><td>{{ $record['agency_broker'] }}</td></tr>                                        		
                                        	</tbody>
                                        </table>
                                        <hr>
                                        <table>
                                        	<tbody>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Plate Number:</td><td>{{ $record['plate_number'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Serial Chassis:</td><td>{{ $record['serial_chassis'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Motor Engine:</td><td>{{ $record['motor_engine'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Seating Capacity:</td><td>{{ $record['seating_capacity'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Color:</td><td>{{ $record['color'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Deductible:</td><td>{{ $record['deductible'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Authorized repair limit:</td><td>{{ $record['authorized_repair_limit'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Towing:</td><td>{{ $record['towing'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Bodily Injury:</td><td>{{ $record['bodily_injured'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Property Damage:</td><td>{{ $record['property_damage'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Mortgagee:</td><td>{{ $record['mortgagee'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Act of Nature:</td><td>{{ ($record['act_of_nature']) ? 'YES':'NO' }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Writing Code:</td><td>{{ $record['writing_code'] }}</td></tr>
                                        		<tr><td style="padding: 7px;font-weight: bold;">Banks:</td>
                                        			<td>
                                        				@if(!empty($record['banks_file']))
                                        					<a target="_blank" href="{{ url('./uploads/'.$record['banks_file']) }}">{{ $record['banks_file'] }}</a>
                                        				@else
                                        					NO
                                        				@endif
                                        			</td></tr>
                                        	</tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="check-voucher">
                                        <br>
                                        @if(!empty($record['cv_no']))
                                            @foreach($record['cv_no'] as $file)
                                                <div class="col-lg-4" style="border: 1px solid #ddd;">
                                                	<span>CV No.: {{ $file->cv_no }}</span>
                                                    <a href="{{ url('uploads/'.$file->uploaded_file) }}" target="_blank"><img src="{{ url('uploads/'.$file->uploaded_file) }}" style="width: 300px;height: 300px;"/></a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="policy-receipt">
                                        <br>
                                        @if(!empty($record['pr_no']))
                                        	<table>
	                                        	<tbody>                                        		
	                                        		<tr><td style="padding: 7px;font-weight: bold;">PR No.:</td><td>{{ $record['pr_no']['pr_no'] }}</td></tr>
	                                        		<tr><td style="padding: 7px;font-weight: bold;">Payment Status:</td><td></td></tr>
	                                        		<tr><td style="padding: 7px;font-weight: bold;">Total Amount:</td><td>Php {{ number_format($record['pr_no']['total_amount'], 2) }}</td></tr>
	                                        		<tr><td style="padding: 7px;font-weight: bold;">Prepared By:</td><td>{{ $record['pr_no']['prepared_by'] }}</td></tr>
	                                        		<tr><td style="padding: 7px;font-weight: bold;">Received By:</td><td>{{ $record['pr_no']['received_by'] }}</td></tr>                                        		
	                                        	</tbody>
	                                        </table>
	                                        <br>
	                                        <a href="{{ (!empty($record['pr_no']['url'])) ? $record['pr_no']['url'] : '' }}" class="btn btn-success"><i class="fa fa-edit"></i> View Details</a>
                                        @endif                                        
                                    </div>
                                    <div class="tab-pane fade" id="endorsement">
                                        <br>
                                        @if(!empty($record['endorsement']))
                                            @foreach($record['endorsement'] as $file)
                                                <div class="col-lg-4" style="border: 1px solid #ddd;">
                                                	<span>No.: {{ $file->end_no }}</span>
                                                    <a href="{{ url('uploads/'.$file->uploaded_file) }}" target="_blank"><img src="{{ url('uploads/'.$file->uploaded_file) }}" style="width: 300px;height: 300px;"/></a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="tpl">
                                        <br>
                                        @if(!empty($record['tpl']))
                                            @foreach($record['tpl'] as $file)
                                                <div class="col-lg-4" style="border: 1px solid #ddd;">
                                                	<span>No.: {{ $file->tpl_no }}</span>
                                                    <a href="{{ url('uploads/'.$file->uploaded_file) }}" target="_blank"><img src="{{ url('uploads/'.$file->uploaded_file) }}" style="width: 300px;height: 300px;"/></a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function(){
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
