@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang Chủ</a> / <span>Thông tin chi tiết</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							@if($sanpham->promotion_price != 0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<div class="single-item-body">
								<p class="single-item-title"><h4>{{$sanpham->name}}</h4></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
									<span class="flash-sale">{{number_format($sanpham->unit_price)}} Đồng</span>
									@else
									<span class="flash-del">{{number_format($sanpham->unit_price)}} Đồng</span>
									<span class="flash-sale">{{number_format($sanpham->promotion_price)}} Đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>Số Lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><h4>Mô Tả</h4></a></li>
						</ul>

						<div class="panel" id="tab-description">
							{{$sanpham->desciption}}
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự</h4>

						<div class="row">
							@foreach($sanphamtt as $st)
							<div class="col-sm-4">
								<div class="single-item">
										@if($st->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham', $st->id)}}"><img src="image/product/{{$st->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$st->name}}</p>
											<p class="single-item-price" style="font-size: 18px;">
												@if($st->promotion_price == 0)
												<span class="flash-sale">{{number_format($st->unit_price)}} Đồng</span>
												@else
												<span class="flash-del">{{number_format($st->unit_price)}} Đồng</span>
												<span class="flash-sale">{{number_format($st->promotion_price)}} Đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$st->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $st->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sanphamtt->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Bán Chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sale_product as $sale)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham', $sale->id)}}"><img src="image/product/{{$sale->image}}" alt=""></a>
									<div class="media-body">
										{{$sale->name}}
										@if($sale->promotion_price == 0)
										<span class="flash-sale">{{number_format($sale->unit_price)}} Đồng</span>
										@else
										<span class="flash-del">{{number_format($sale->unit_price)}} Đồng</span>
										<span class="flash-sale">{{number_format($sale->promotion_price)}} Đồng</span>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham', $new->id)}}"><img src="image/product/{{$sale->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}}
										@if($new->promotion_price == 0)
										<span class="flash-sale">{{number_format($new->unit_price)}} Đồng</span>
										@else
										<span class="flash-del">{{number_format($new->unit_price)}} Đồng</span>
										<span class="flash-sale">{{number_format($new->promotion_price)}} Đồng</span>
										@endif
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection