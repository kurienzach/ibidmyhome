@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Coupons</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Coupons
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('admin/coupons') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>Enter Coupons to Add (Separated by comma eg. Coupon1, Coupon2)</label>
                            <textarea class="form-control" rows="3" name="coupons"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    Existing Coupons
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Code</th>
                                    <th>Used</th>
                                    <th>Used User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $even=true; ?>
                                @foreach($coupons as $coupon)
                                @if ($even)
                                <tr class="even">
                                @else
                                <tr class="odd">
                                @endif
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td><?php if ($coupon->used) print('Yes'); else print('No');?></td>
                                    <td><?php if ($coupon->used) print($coupon->user->name); ?></td>
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
