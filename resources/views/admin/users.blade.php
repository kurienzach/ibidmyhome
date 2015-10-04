@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registered Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Selected Project</th>
                                    <th>Payment Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $even=true; ?>
                                @foreach($users as $user)
                                @if ($even)
                                <tr class="even">
                                @else
                                <tr class="odd">
                                @endif
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->project->name }}</td>
                                    <td><?php if ($user->payment_done) print('Success'); else print('Awaiting Payment'); ?></td>
                                    <td class="center"><a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-sm btn-primary">Details</a></td>
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