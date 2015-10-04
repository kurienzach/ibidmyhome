@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Unit Type</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ url('admin/unit') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Highest Bid Value</label>
                    <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                    <input class="form-control" name="highest_bid" value="{{ $unit->highest_bid }}">
                    <p class="help-block">Please type the HTML content here</p>
                </div>
                <div class="form-group">
                    <label>Minimum Bid Value</label>
                    <input class="form-control" name="min_bid_value" value="{{ $unit->min_bid_value }}">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Save Unit">
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

    
@endsection
