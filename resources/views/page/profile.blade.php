@extends('master')
@section('content')
	<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{Auth::user()->full_name}}" placeholder="Username" name="name" aria-describedby="basic-addon1" readonly="">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" aria-describedby="basic-addon1"
							  	readonly="" 
							  	>
							</div>
                            <div>
                                <label>Address</label>
                                <input type="address" class="form-control" value="{{Auth::user()->address}}" name="address" aria-describedby="basic-addon1"
                                readonly="" 
                                >
                            </div>
                            <div>
                                <label>Phone</label>
                                <input type="phone" class="form-control" value="{{Auth::user()->phone}}" name="phone" aria-describedby="basic-addon1"
                                readonly="" 
                                >
                            </div>
							<br>	
							<br>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection