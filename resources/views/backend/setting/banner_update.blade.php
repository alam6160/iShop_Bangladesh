@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Banner Setting Page</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.bannersetting') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $setting ? $setting->id : '' }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nav Bar Banner <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="nav_img" class="form-control" onchange="previewImage(this, 'nav_img_preview')">
                                                    </div>
                                                    <img id="nav_img_preview" src="{{ $setting ? asset($setting->nav_img) : '' }}" alt="Nav Image" style="max-width: 200px; margin-top: 10px;">
                                                </div>
                                                <div class="form-group">
                                                    <h5>First Banner <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="first_img" class="form-control" onchange="previewImage(this, 'first_img_preview')">
                                                    </div>
                                                    <img id="first_img_preview" src="{{ $setting ? asset($setting->first_img) : '' }}" alt="First Image" style="max-width: 200px; margin-top: 10px;">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Second Banner <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="second_img" class="form-control" onchange="previewImage(this, 'second_img_preview')">
                                                    </div>
                                                    <img id="second_img_preview" src="{{ $setting ? asset($setting->second_img) : '' }}" alt="Second Image" style="max-width: 200px; margin-top: 10px;">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Third Banner <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="third_img" class="form-control" onchange="previewImage(this, 'third_img_preview')">
                                                    </div>
                                                    <img id="third_img_preview" src="{{ $setting ? asset($setting->third_img) : '' }}" alt="Third Image" style="max-width: 200px; margin-top: 10px;">
                                                </div>
                                            </div> <!-- end col-md-6 -->
                                        </div> <!-- end row -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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

    <!-- JavaScript to handle image preview -->
    <script type="text/javascript">
        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById(previewId).src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
