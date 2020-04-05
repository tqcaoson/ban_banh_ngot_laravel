@extends('master')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<?php
               		 function doimau($str, $tukhoa){
                   	 return str_replace($tukhoa, "<span style='color:red';>$tukhoa</span>", $str);
               		 }
          			  ?>
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($product)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $pro)
								<div class="col-sm-3">
									<div class="single-item">
										@if($pro->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham', $pro->id)}}"><img src="image/product/{{$pro->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{!! doimau($pro->name,$tukhoa) !!}</p>
											<p class="single-item-price" style="font-size: 18px;">
												@if($pro->promotion_price == 0)
												<span class="flash-sale">{{number_format($pro->unit_price)}} Đồng</span>
												@else
												<span class="flash-del">{{number_format($pro->unit_price)}} Đồng</span>
												<span class="flash-sale">{{number_format($pro->promotion_price)}} Đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$pro->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $pro->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{ $product->appends(Request::all())->links() }}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection