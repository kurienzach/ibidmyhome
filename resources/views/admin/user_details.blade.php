@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Details
                </div>
                <div class="panel-body">
                    <form class="form">
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Name</label>
                            <p class="col-sm-8">{{ $user->name }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Email</label>
                            <p class="col-sm-8">{{ $user->email }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Payment Status</label>
                            <p class="col-sm-8"><?php if ($user->payment_done) print('Success'); else print('Awaiting Payment'); ?></p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Project</label>
                            <p class="col-sm-8">{{ $user->project->name }}</p>
                        </div>
                        @if ($user->payment != null)
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Mobile</label>
                            <p class="col-sm-8">{{ $user->mobile or '<br>'}}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Pan No</label>
                            <p class="col-sm-8">{{ $user->payment()->first()->panno }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Address</label>
                            <p class="col-sm-8">{{ $user->address }},<br>{{ $user->city }},<br>{{ $user->state }},<br>{{ $user->country }} - {{ $user->pincode }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Heard From</label>
                            <p class="col-sm-8">{{ $user->payment->heard_src }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">{{ $user->payment->heard_src }} Name</label>
                            <p class="col-sm-8">{{ $user->payment->heard_field1 }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">{{ $user->payment->heard_src }} Mobile</label>
                            <p class="col-sm-8">{{ $user->payment->heard_field2 }}</p>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 --> 
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bid Details
                </div>
                <div class="panel-body">
                    <form class="form">
                        @if ($user->bid != null)
                        <?php $unit = $user->bid->project_unit()->first(); ?>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Unit Type</label>
                            <p class="col-sm-8">{{ $unit->unit_type }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Area</label>
                            <p class="col-sm-8">{{ $unit->area }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Bid Value</label>
                            <p class="col-sm-8">{{ $user->bid->bid_value }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Total Price</label>
                            <p class="col-sm-8">{{ $user->bid->total_price }}</p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Want Higher Floor?</label>
                            <p class="col-sm-8">
                            @if ($user->bid->higher_floor == 0)
                                Not Speficied
                            @elseif ($user->bid->higher_floor == -1)
                                No
                            @elseif ($user->bid->higher_floor == 1)
                                Yes
                            @endif
                            </p>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-4">Want Premeium View?</label>
                            <p class="col-sm-8">
                            @if ($user->bid->premium_view == 0)
                                Not Speficied
                            @elseif ($user->bid->premium_view == -1)
                                No
                            @elseif ($user->bid->premium_view == 1)
                                Yes
                            @endif
                            </p>
                        </div>
                        @else
                            <p>No Bid Placed</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 --> 
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="{{ url('admin/users') }}" class="btn btn-primary">Back to Users</a>
        </div>
    </div>
@endsection
