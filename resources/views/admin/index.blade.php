@extends('admin.admin_master')
@section('admin')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">৳ {{ $today }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale </p>
                                <h3 class="text-white mb-0 font-weight-500">৳ {{ $month }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale </p>
                                <h3 class="text-white mb-0 font-weight-500">৳ {{ $year }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders </p>
                                <h3 class="text-white mb-0 font-weight-500">{{ count($pending) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Daily Profit </p>
                                <h3 class="text-white mb-0 font-weight-500"> ৳ {{ $todayProfit ?? 0 }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Monthly Profit </p>
                                <h3 class="text-white mb-0 font-weight-500"> ৳ {{ $monthProfit ?? 0 }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Yearly Profit </p>
                                <h3 class="text-white mb-0 font-weight-500">৳ {{ $yearProfit?? 0 }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                Recent All Orders
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 20px"><span class="text-white">Date</span></th>
                                            <th style="min-width: 50px"><span class="text-fade">Invoice</span></th>
                                            <th style="min-width: 20px"><span class="text-fade">Amount</span></th>
                                            <th style="min-width: 50px"><span class="text-fade">Payment</span></th>
                                            <th style="min-width: 30px"><span class="text-fade">Status</span></th>
                                            <th style="min-width: 10px"><span class="text-fade">Process</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </span>
                                                </td>

                                                <td>

                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $item->invoice_no }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        ৳ {{ $item->amount }}
                                                    </span>

                                                </td>

                                                <td>

                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $item->payment_method }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
                                                </td>

                                                <td class="text-right">
                                                    {{-- <a href="#"
                                                        class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                            class="mdi mdi-bookmark-plus"></span></a> --}}
                                                    <a href="{{ route('pending.order.details', $item->id) }}"
                                                        class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                            class="mdi mdi-arrow-right"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            {{-- {{ $orders->links() }} --}}
                            <div class="d-flex justify-content-end">
                            {{ $orders->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
