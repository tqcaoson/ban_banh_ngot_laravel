@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang Chủ</a> / <span>Loại Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($sp_theoloai)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theoloai as $st)
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
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $st->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $st->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							<div class="row">{{$sp_theoloai->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($sp_khac)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $sk)
								<div class="col-sm-4">
									@if($sk->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham', $sk->id)}}"><img src="image/product/{{$sk->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sk->name}}</p>
											<p class="single-item-price" style="font-size: 18px;">
												@if($sk->promotion_price == 0) 
												<span class="flash-sale">{{number_format($sk->unit_price)}} Đồng</span>
												@else
												<span class="flash-del">{{number_format($sk->unit_price)}} Đồng</span>
												<span class="flash-sale">{{number_format($sk->promotion_price)}} Đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $sk->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $sk->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								</div>
								<div class="row">{{$sp_khac->links()}}</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection