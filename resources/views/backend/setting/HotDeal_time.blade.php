@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Hot Deal Time setup</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <form method="post" action="{{ route('hotdeal.time.store') }}">
                            @csrf
                            <div class="form-group">
                                <h5>Start Time <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="datetime-local" name="start_time" class="form-control"value="{{ old('start_time', $hotDeals->start_time ? \Carbon\Carbon::parse($hotDeals->start_time)->format('Y-m-d\TH:i') : '') }}">
                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>End Time <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="datetime-local" name="end_time" class="form-control"value="{{ old('end_time', $hotDeals->end_time ? \Carbon\Carbon::parse($hotDeals->end_time)->format('Y-m-d\TH:i') : '') }}">
                                    @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>
@endsection
