

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
                        Table
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"style="font-size: 8pt;">
                            <thead>
                                <tr>                                                                       
                                    <th>Assured Name</th>
                                    <th>Agency</th>
                                    <th>Date Issue</th>
                                    <th>Policy No.</th>
                                    <th>Total Premium</th>
                                    <th>Branch</th>
                                    <th>Inception Date</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records))
                                @foreach($records as $key => $record)
                                <tr row-id="{{ $record->ir_id }}">											                                    
                                    <td>{{ $record->assured_name }}</td>
                                    <td>{{ $record->agency }}</td>
                                    <td>0000-00-00</td>
                                    <td>{{ $record->policy_no }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $record->inception_date }}</td>
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