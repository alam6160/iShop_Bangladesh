@extends('frontend.main_master')
@section('content')

@section('title')
 Compare Page 
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{('/')}}">Home</a></li>
                <li class='active'>Compare</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
    <div class="product-comparison">
        <div>
            <h1 class="page-title text-center heading-title">Product Comparison</h1>
            <div class="table-responsive">
                <table class="table compare-table inner-top-vs">
                    <tr id="compare">
                   
                    </tr>


                </table>
            </div>
            </div>
        </div>
    </div>
</div>






@endsection