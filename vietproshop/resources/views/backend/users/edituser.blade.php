@extends('backend/master/master')
@section('title', 'edit user')
	

@section('main')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - admin@gmail.com</div>
                    <div class="panel-body">
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>email đã tồn tại!</strong>
                        </div>
                        @endif
                        
                        <form action="/admin/user/update/{{$user["id"]}}" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center" style="margin-bottom:40px">

                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{$user["email"]}}">
                                    
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="full" name="fullname" class="form-control" value="{{$user["fullname"]}}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" name="address" class="form-control" value="{{$user["address"]}}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="phone" name="phone" class="form-control" value="{{$user["phone"]}}">
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" value="">
                                        
                                        <option @if ($user["level"]==1) selected @endif value="1">admin</option>
                                       
                                        <option @if ($user["level"]==2) selected @endif  value="2">user</option>              
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success"  type="submit">Sửa thành viên</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                           

                        </div>
                        @csrf
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->
    </div>

    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    
    
    
	@endsection