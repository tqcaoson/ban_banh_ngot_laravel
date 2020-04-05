@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>tên</th>
                                <th>Loại</th>
                                <th>Mô Tả</th>
                                <th>Giá Gốc</th>
                                <th>Giá Khuyến Mại</th>
                                <th>Ảnh</th>
                                <th>Đơn Vị</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($sanpham as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->name}}</td>
                                @foreach($loaisanpham as $ltt)
                                    @if($tt->id_type == $ltt->id)
                                    <td>{{$ltt->name}}</td>
                                    @endif  
                                @endforeach
                                <td>{{$tt->description}}</td>
                                <td>{{$tt->unit_price}}</td>
                                <td>
                                    @if($tt->promotion_price == 0)
                                    Không có
                                    @else
                                    {{$tt->promotion_price}}</td> 
                                    @endif  
                                <td>
                                    <img src="image/product/{{$tt->image}}" width="100px">
                                </td>
                                <td>{{$tt->unit}}</td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/xoa/{{$tt->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$tt->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection