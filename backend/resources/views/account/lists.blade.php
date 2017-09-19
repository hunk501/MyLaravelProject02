

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @if(Session::has('success'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('policy/create') }}"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::open(['url'=>'policy/search','method'=>'POST']) !!}
                            <table>
                                <tr>
                                    <td>
                                        <select name="search_name" class="form-control">
                                            <option value="policy_no">Policy No.</option>
                                            <option value="assured_name">Assured Name</option>
                                            <option value="contact_no">Contact No.</option>
                                            <option value="address">Address</option>
                                            <option value="agent">Agent</option>
                                            <option value="pr_no">PR No.</option>
                                            <option value="cv_no">CV No.</option>
                                            <option value="endorsement_no">Endorsement No.</option>
                                            <option value="bank">Bank</option>
                                            <option value="pr_status_payment">Payment Status</option>
                                            <option value="remarks">Remarks</option>
                                        </select>
                                    </td>
                                    <td id="srch_txt"><input type="text" name="search_value" class="form-control"/></td>
                                    <td><input type="submit" name="search" value="Search" class="btn btn-success form-control"/></td>
                                </tr>
                            </table>
                            {!! Form::close() !!}
                        </div>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"style="font-size: 8pt;">
                            <thead>
                                <tr>
                                    <th>Date Issue</th>
                                    <th>Assured Name</th>
                                    <th>Contact</th>                                    
                                    <th>Agent</th>
                                    <th>Policy No.</th>
                                    <th>PR No.</th>
                                    <th>CV No.</th>
                                    <th>Endorsement No.</th>
                                    <th>Remarks</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr row-id="{{ $record->id }}">											                                    
                                    <td>{{ $record->date_issue }}</td>
                                    <td>{{ strtoupper($record->assured_name) }}</td>
                                    <td>{{ strtoupper($record->contact_no) }}</td>                                    
                                    <td>{{ strtoupper($record->agent) }}</td>
                                    <td>{{ strtoupper($record->policy_no) }}</td>
                                    <td><a href="{{ (!empty($record->pr_no_url) ? $record->pr_no_url : '') }}">{{ $record->pr_no }}</a></td>
                                    @if(!empty($record->cv_no))
                                        <td>
                                            @foreach($record->cv_no as $cv_no)
                                            <a target="_blank" href="{{ url('uploads/'.$cv_no->uploaded_file) }}">{{ $cv_no->cv_no }}</a> &nbsp;
                                            @endforeach                                           
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($record->endorsement))
                                        <td>
                                            @foreach($record->endorsement as $endorsement)
                                            <a target="_blank" href="{{ url('uploads/'.$endorsement->uploaded_file) }}">{{ $endorsement->end_no }}</a> &nbsp;
                                            @endforeach                                           
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{ strtoupper($record->remarks) }}</td>
                                    <td>
                                    	<a href="{{ url('policy/'.$record->id) }}"><i class="fa fa-edit"></i> View</a> &nbsp; 
                                    	<a href="{{ url('policy_ledger/'.$record->id.'/edit') }}"><i class="fa fa-pencil"></i> Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif	                                    	                                   
                            </tbody>
                        </table>
                    </div><!-- /.panel-body -->                        
                </div><!-- /.panel -->                    
            </div><!-- /.col-lg-12 -->                
        </div><!-- /.row -->

    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function () {
        
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
        $(".dataTables_filter").hide();

		// Search Name
        $("select[name='search_name']").on('change', function(){
			if($(this).val() == "pr_status_payment") {
				$("#srch_txt").html("<select name='search_value' class='form-control'><option value='partial'>Partial Payment</option><option value='full'>Fully Paid</option><option value='unpaid'>Unpaid</option></select>");
			} else if($(this).val() == "bank") {
				$("#srch_txt").html("<select name='search_value' class='form-control'><option value='1'>Yes, Submitted</option><option value='2'>No</option></select>");
			} else {
				$("#srch_txt").html("<input type='text' name='search_value' class='form-control' />");
			}
       	});
        
    });
</script>
@endsection