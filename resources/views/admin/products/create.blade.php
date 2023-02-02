@extends('admin.layout')
@section('page_title', 'Trang them moi san pham')
@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <!-- row -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Form them moi san pham</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <form method="post" action="{{url('backend/product/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Ten san pham</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <small class="text-danger ">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Hinh anh</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*"
                                           onchange="loadFile(event)">
                                    <img id="output" width="100px" height="100px" style="margin-top: 10px"/>
                                    <small class="text-danger">{{ $errors->first('avatar') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="price">Gia san pham</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                    <small class="text-danger ">{{ $errors->first('price') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mo ta</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                    <small class="text-danger ">{{ $errors->first('description') }}</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end dashboard inner -->
@endsection

@push('script')
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
