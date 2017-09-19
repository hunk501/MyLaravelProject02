

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ledger</h1>                    
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
                            {!! Form::open(['url'=>'policy_ledger/search','method'=>'POST']) !!}
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
                                    <td><input type="text" name="search_value" class="form-control"/></td>
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
                                    <th>Year Model</th>
                                    <th>Insurance Comp.</th>
                                    <th>Inception Date</th>                                                                        
                                    <th>Value</th>
                                    <th>Financing</th>
                                    <th>Premium</th>
                                    <th>Net Premium</th>
                                    <th>Income</th>
                                    <th>Commission</th>
                                    <th>Agent</th>
                                    <th>Policy No.</th>
                                    <th>PR No.</th>
                                    <th>Check Voucher</th>
                                    <th>Remarks</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr row-id="{{ $record->id }}">											                                    
                                    <td>{{ $record->date_issue }}</td>
                                    <td>{{ $record->assured_name }}</td>
                                    <td>{{ $record->contact_no }}</td>
                                    <td>{{ $record->year_model }}</td>
                                    <td>{{ $record->insurance_company }}</td>
                                    <td>{{ date('M d, Y', strtotime($record->inception_date_from)) }} - {{ date('M d, Y', strtotime($record->inception_date_to)) }}</td>                                    
                                    <td>{{ $record->value }}</td>
                                    <td>{{ $record->financing }}</td>
                                    <td>{{ $record->premium }}</td>
                                    <td>{{ $record->net_premium }}</td>
                                    <td>Php {{ number_format($record->income, 2) }}</td>
                                    <td>Php {{ number_format($record->commission, 2) }}</td>
                                    <td>{{ $record->agent }}</td>
                                    <td><a href="{{ url('policy/'.$record->policy_id) }}">{{ $record->policy_no }}</a></td>
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
                                    <td>{{ $record->remarks }}</td>
                                    <td><a href="{{ url('policy_ledger/'.$record->id) }}"><i class="fa fa-edit"></i> Edit</a></td>
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
    });
</script>
@endsection