@extends('admin.layouts.main')


@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h6>
                            Foydalanuvchi qo'shish

                        </h6>

                        <form action="{{route('admin.user.store')}}" method="post" class="col-4">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nomi</label>
                                    <input name="name" type="text" class="form-control" placeholder="Nomi">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label >Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Nomi">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50">
                                    <label>Rolni tanlang</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $id => $role)
                                            <option value="{{$id}}"

                                                {{$id == old('role')? 'selected':''}}
                                            >{{$role}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <input type="submit" class="btn btn-primary" value="Qo'shish">
                            </div>
                        </form>


                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>



@endsection
