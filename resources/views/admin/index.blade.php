@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header clearfix">Bids
            <a href="{{url('/admin/bid_csv')}}" class="btn btn-primary" style="display: right; float: right;">Download CSV</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Bids
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Unit Type</th>
                                    <th>User Name</th>
                                    <th>Bid Value</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $even=true; ?>
                                @foreach($bids as $bid)
                                @if ($even)
                                <tr class="even">
                                @else
                                <tr class="odd">
                                @endif
                                    <td>{{ $bid->project_unit()->first()->project()->first()->name }}</td>
                                    <td>{{ $bid->project_unit()->first()->unit_type }} ({{ $bid->project_unit()->first()->area }})</td>
                                    <td>{{ $bid->user()->first()->name }}</td>
                                    <td class="center">Rs {{ $bid->bid_value }}</td>
                                    <td class="center"><a href="{{ url('admin/bid/' . $bid->id) }}" class="btn btn-sm btn-primary">Details</a></td>
                                </tr>
                                <?php $even=!$even; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
@parent
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>
@endsection
