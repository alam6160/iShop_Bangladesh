@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Time for Hot Deal <span class="badge badge-pill badge-danger">  </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Actions</th>

							</tr>
						</thead>
						<tbody>
                            @dd($targetDate->date);
	 @foreach($targetDate as $item)

	 <tr>
        <td>{{ $targetDate->id }}</td>
		<td>{{ $item->date ?? '' }}</td>
		<td>
 {{-- <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"> --}}
 	<i class="fa fa-trash"></i></a>
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


<!--   ------------ Add Brand Page -------- -->


          {{-- <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
	 	@csrf





	<div class="form-group">
		<h5>Brand Name Hindi <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="brand_name_hin" class="form-control" >
     @error('brand_name_hin')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>



	<div class="form-group">
		<h5>Brand Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="brand_image" class="form-control" >
     @error('brand_image')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New"> --}}
						</div>
					</form>

					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
