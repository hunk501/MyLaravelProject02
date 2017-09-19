

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Claims Monitoring</h1>                    
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
                        <a href="{{ url('/cm/create') }}"><i class="fa fa-plus"></i> Add New</a>                            
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 8pt;">
                            <thead>
                                <tr>                   
                                    <th>Claims No.</th>
                                    <th>Assured Name</th>
                                    <th>Policy No.</th>                                   
                                    <th>LOA</th>
                                    <th>PG</th>
                                    <th>PR</th>
                                    <th>AR</th>
                                    <th>OR/CR</th>
                                    <th>DL</th>
                                    <th>PI</th>
                                    <th>RE</th>
                                    <th>CNC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr>
                                    <td>{{ $record->claims_no }}</td>
                                    <td>{{ $record->assured_name }}</td>
                                    <td>{{ $record->policy_no }}</td>                                   
                                    @if(!empty($record->loa))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->loa) }}"><i class="fa fa-check"></i> View</a></td>                                    
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($record->premium_guarantee))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->premium_guarantee) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif                                   
                                    @if(!empty($record->police_report))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->police_report) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($record->affidavet_report))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->affidavet_report) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif 
                                    @if(!empty($record->or_cr))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->or_cr) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($record->drivers_license))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->drivers_license) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif  
                                    @if(!empty($record->picture_incident))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->picture_incident) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif   
                                    @if(!empty($record->repair_estimate))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->repair_estimate) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(!empty($record->cnc))
                                        <td><a target="_blank" href="{{ url('uploads/'.$record->cnc) }}"><i class="fa fa-check"></i> View</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a href="{{ url('cm/'.$record->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a></td>
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
        
        // Table click
        $("table > tbody > tr").on("click", function(){
            var row_id = $(this).attr("row-id");
            var url = $("base").attr("href");
            if(row_id != null) {
                //location.href = url +"/ir/"+ row_id;
            }           
        });
    });
</script>
@endsection