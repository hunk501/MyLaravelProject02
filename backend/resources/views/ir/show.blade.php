
@extends('common.master')


@section('bodyContent')
<div id="wrapper">
    @include('common.navigation')

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                
            </div>                
        </div><!-- /.col-lg-12 -->

        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <table class="table">
                    <tbody>
                        <tr><td colspan="2">{{ date('M d, Y') }}</td></tr>
                        <tr><td style="width: 200px;">Policy No.:</td><td>{{ (!empty($record['policy_no']) ? $record['policy_no'] : '') }}</td></tr>
                        <tr><td>Nickname:</td><td>{{ (!empty($record['nickname']) ? $record['nickname'] : '') }}</td></tr>
                        <tr><td>Assured Name:</td><td>{{ (!empty($record['assured_name']) ? $record['assured_name'] : '') }}</td></tr>
                        <tr><td>Address:</td><td>{{ (!empty($record['address']) ? $record['address'] : '') }}</td></tr>
                        <tr><td>Year/Make:</td><td>{{ (!empty($record['year_make']) ? $record['year_make'] : '') }}</td></tr>
                        <tr><td>Serial No:</td><td>{{ (!empty($record['serial_no']) ? $record['serial_no'] : '') }}</td></tr>
                        <tr><td>Engine No:</td><td>{{ (!empty($record['engine_no']) ? $record['engine_no'] : '') }}</td></tr>
                        <tr><td>Inception Date:</td><td>{{ (!empty($record['inception_date_from']) ? date('M d, Y', strtotime($record['inception_date_from'])) : '') }} - {{ (!empty($record['inception_date_to']) ? date('M d, Y', strtotime($record['inception_date_to'])) : '') }}</td></tr>
                        <tr><td>Color:</td><td>{{ (!empty($record['color']) ? $record['color'] : '') }}</td></tr>
                        <tr><td>Plate No:</td><td>{{ (!empty($record['plate_no']) ? $record['plate_no'] : '') }}</td></tr>
                        <tr><td>Financing:</td><td>{{ (!empty($record['financing']) ? $record['financing'] : '') }}</td></tr>
                        <tr><td>Assured Value:</td><td>{{ (!empty($record['assured_value']) ? "Php ".number_format($record['assured_value'],2) : '') }}</td></tr>
                        @if(!empty($record['type']) && $record['type'] == 'Motor Car') 
                            <tr><td colspan="2"></td></tr>
                            <tr><td>Total Premium</td><td colspan="2"><b>{{ (!empty($record['total_premium']) ? "Php ".$record['total_premium'] : '') }} WITH AOG PA, BI & PD-200K</b></td></tr>
                        @else
                            <tr><td>Comp.</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>OD/Theft</td><td>{{ (!empty($record['od_theft_1']) ? "Php ".$record['od_theft_1'] : '') }}</td>
                                            <td>{{ (!empty($record['od_theft_2']) ? "Php ".$record['od_theft_2'] : '') }}</td>
                                        </tr>
                                        <tr><td>Bodily Injury</td><td>{{ (!empty($record['bodily_injured_1']) ? "Php ".$record['bodily_injured_1'] : '') }}</td>
                                            <td>{{ (!empty($record['bodily_injured_2']) ? "Php ".$record['bodily_injured_2'] : '') }}</td>
                                        </tr>
                                        <tr><td>Property Damage</td><td>{{ (!empty($record['property_damage_1']) ? "Php ".$record['property_damage_1'] : '') }}</td>
                                            <td>{{ (!empty($record['property_damage_2']) ? "Php ".$record['property_damage_2'] : '') }}</td>
                                        </tr>
                                        <tr><td>PA</td><td>{{ (!empty($record['pa_1']) ? "Php ".$record['pa_1'] : '') }}</td>
                                            <td>{{ (!empty($record['pa_2']) ? "Php ".$record['pa_2'] : '') }}</td></tr>
                                        <tr><td>Total Premium</td><td colspan="2"><b>{{ (!empty($record['total_premium']) ? "Php ".$record['total_premium'] : '') }}</b></td></tr>
                                    </table>
                                </td>
                            </tr>
                        @endif                       
                    </tbody>
                </table>
                
                <!-- <button id="print" class="btn btn-primary"><i class="fa fa-print"></i> Print</button> -->
                <br><br>
            </div>
        </div>

    </div><!-- /Page Wrapper -->        

</div>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
        // Print
        $("#print").on("click", function(){
            window.print();
        });
    });
</script>
@endsection