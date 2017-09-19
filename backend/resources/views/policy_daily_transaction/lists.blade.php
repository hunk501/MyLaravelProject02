

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Daily Transaction</h1>                    
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
                        Table
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"style="font-size: 8pt;">
                            <thead>
                                <tr>
                                    <th>Date Issue</th>
                                    <th>Assured Name</th>
                                    <th>Contact</th>
                                    <th>Policy No.</th>
                                    <th>Inception Date</th>
                                    <th>Insurance Comp.</th>                                    
                                    <th>Remarks</th>                                   
                                    <th>Premium</th>                                    
                                    <th>Agent</th>
                                    <th>Delivery By</th>
                                    <th>Location</th>
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
                                    <td>{{ $record->policy_no }}</td>
                                    <td>{{ date('M d, Y',strtotime($record->inception_date_from)) }} - {{ date('M d, Y',strtotime($record->inception_date_to)) }}</td>
                                    <td>{{ $record->insurance_company }}</td>                                                                        
                                    <td>{{ $record->remarks }}</td>                                    
                                    <td>{{ $record->premium }}</td>
                                    <td>{{ $record->agent }}</td>
                                    <td>{{ $record->delivery_by }}</td>                                    
                                    <td>{{ $record->location }}</td>
                                    <td><a href="{{ url('policy_daily_transaction/'.$record->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a></td>
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
        
    });
</script>
@endsection