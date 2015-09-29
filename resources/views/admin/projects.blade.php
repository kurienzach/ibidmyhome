@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Projects being Bidded
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Unit Type</th>
                                    <th>Area</th>
                                    <th>Highest Bid Value</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $even=true; ?>
                                @foreach($units as $unit)
                                @if ($even)
                                <tr class="even">
                                @else
                                <tr class="odd">
                                @endif
                                    <td>{{ $unit->project()->first()->name }}</td>
                                    <td>{{ $unit->unit_type }}</td>
                                    <td>{{ $unit->area }}</td>
                                    <td class="center">{{ $unit->highest_bid }}</td>
                                    <td class="center"><a href="{{ url('admin/unit/' . $unit->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                </tr>
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