@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>Danh Sách</small>
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
                                <th>Tên</th>
                                <th>Giới Tính</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl -> id}}</td>
                                <td>{{$tl -> name}}</td>
                                <td>{{$tl -> gender}}</td>
                                <td>{{$tl -> phone_number}}</td>
                                <td>{{$tl -> address}}</td>
                                <td>{{$tl -> note}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$tl -> id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$tl -> id}}">Edit</a></td>
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