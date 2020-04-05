@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>{{$khachhang->name}}</small>
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
                        <form action="admin/khachhang/sua/{{$khachhang->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" value="{{$khachhang->name}}" name="Ten" value="{{$khachhang->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="{{$khachhang->email}}" name="email" value="{{$khachhang->email}}" />
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" value="{{$khachhang->phone_number}}" name="phone_number" value="{{$khachhang->phone_number}}" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" value="{{$khachhang->address}}" name="address" value="{{$khachhang->address}}" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection