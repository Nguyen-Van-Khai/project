@extends('admin.layout')
@section('page_title', 'Trang san pham')
@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <!-- row -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Quan ly san pham</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <div class="heading1 margin_0">
                                @if(session()->has('success'))
                                    <h2 class="text-danger"> {{session()->get('success') }}</h2>
                                @endif

                                @if(session()->has('error'))
                                    <h2 class="text-danger"> {{session()->get('error')}}</h2>
                                @endif
                            </div>
                            <table class="table table-dark" border="1">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ten san pham</th>
                                    <th>Hinh anh</th>
                                    <th>Gia</th>
                                    <th>Mo ta</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            @if(!empty($product->avatar))
                                                <img src="{{ asset('uploads/' . $product->avatar) }}"
                                                     height="100px"/>
                                            @endif
                                        </td>
                                        <td>{{number_format($product->price) }}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{url('backend/product/edit', $product->id)}}">Edit</a>
                                            <a class="btn btn-danger" href="{{route('product.delete', $product->id)}}"
                                               onclick="return confirm('Xac nhan xoa ?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="button_block margin_bottom_30 margin_top_50">
                                <a class="btn cur-p btn-primary" href="{{url('backend/product/create')}}">Them moi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
@endsection
