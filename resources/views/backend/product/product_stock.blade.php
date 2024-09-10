@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Stock List <span class="badge badge-pill badge-danger">
                                    {{ count($products) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image </th>
                                            <th>Name</th>
                                            <th>Buying Price</th>
                                            <th>Selling Price </th>
                                            <th>Margin </th>
                                            <th>Quantity </th>
                                            <th>Discount </th>
                                            <th>Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->product_thambnail) }}"
                                                        style="width: 60px; height: 50px;"> </td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>{{ $item->buying_price }}</td>
                                                <td>{{ $item->discount_price != null ? $item->discount_price : $item->selling_price }} ৳</td>
                                                <td>
                                                    @php
                                                        // Calculate profit based on discount_price
                                                        if ($item->discount_price != null) {
                                                            $profit = $item->discount_price - $item->buying_price;
                                                        } else {
                                                            $profit = $item->selling_price - $item->buying_price;
                                                        }
                                                    @endphp

                                                    <!-- Display the calculated profit -->
                                                    <span >
                                                        {{ number_format($profit, 2) }}
                                                    </span>
                                                </td>
                                                <td>{{ $item->product_qty }} Pic</td>

                                                <td>
                                                    @if ($item->discount_price == null)
                                                        <span class="badge badge-pill badge-danger">No Discount</span>
                                                    @else
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;
                                                        @endphp
                                                        <span class="badge badge-pill badge-danger">{{ round($discount) }}% </span>
                                                        <span>(৳{{ $amount }})</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success"> Active </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> InActive </span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
