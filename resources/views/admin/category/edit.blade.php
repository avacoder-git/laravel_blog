@extends('admin.layouts.main')


@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Foydalanuvchini o'zgartirish</h1>
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

                        <form action="{{route('admin.category.update', $category->id)}}" method="post" class="col-4">
                            @csrf
                            @method('patch')

                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nomi</label>
                                    <input name="title" type="text" class="form-control" placeholder="Nomi" value="{{$category->title}}">
                                    @error('category')
                                        <div class="text-danger">Nomini kiritishingiz shart</div>
                                    @enderror
                                </div>


                                <input type="submit" class="btn btn-primary" value="Yangilash">
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
