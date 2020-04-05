@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors -> all() as $err)
                                    {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>Tên Bánh</label>
                                <input type="text" class="form-control" name="Ten" value="{{$sanpham->name}}"> 
                            </div>
                            <label>Loại Bánh</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($loaisanpham as $tl)
                                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                                    @endforeach
                                </select>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <input type="text" class="form-control" value="{{$sanpham->description}}" name="description"></input>
                            </div>
                            <div class="form-group">
                                <label>Giá Gốc</label>
                                <input type="text" class="form-control" value="{{$sanpham->unit_price}}" name="GiaGoc"> 
                            </div>
                            <div class="form-group">
                                <label>Giá Sale</label>
                                <input type="text" class="form-control" value="{{$sanpham->promotion_price}}" name="GiaSale"> 
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p><img width="400px" src="image/product/{{$sanpham->image}}"></p>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <label>Đơn Vị</label>
                                <select class="form-control" name="DonVi" id="TheLoai">
                                        <option value="hộp">hộp</option>
                                        <option value="cái">cái</option>
                                </select>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


@endsection

