

@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">		
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PR Lists</h1>                    
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
                        <a href="{{ url('/pr/create') }}"><i class="fa fa-plus"></i> Add New</a>                            
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 8pt;">
                            <thead>
                                <tr>                                    
                                    <th>No.</th>
                                    <th>Policy No.</th>
                                    <th>Bank</th>
                                    <th>Check No.</th>
                                    <th>Branch</th>
                                    <th>Agency</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr row-id="{{ $record->id }}" style="cursor: pointer;">											
                                    <td>{{ $record->pr_id }}</td>
                                    <td>{{ $record->policy_no }}</td>
                                    <td>{{ $record->bank }}</td>
                                    <td>{{ $record->check_no }}</td>
                                    <td>{{ $record->branch }}</td>
                                    <td>{{ $record->payment_in }}</td>
                                    <td>{{ $record->firstname.' '.$record->middlename.' '. $record->lastname }}</td>                                  
                                    <td>{{ date("M-d-Y", strtotime($record->updated_at)) }}</td>
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
                location.href = url +"/pr/"+ row_id +"";
            }           
        });
    });
</script>
@endsection