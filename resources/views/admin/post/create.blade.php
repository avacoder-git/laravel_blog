@extends('admin.layouts.main')


@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Postlar</h1>
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
                            Post qo'shish

                        </h6>

                        <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data" class="col-12">
                            @csrf
                            <div class="card-body">
                                <div class="form-group w-25">
                                    <label>Nomi</label>
                                    <input name="title" type="text" value="{{old('title')}}" class="form-control"
                                           placeholder="Nomi">
                                    @error('title')
                                    <div class="text-danger">Nomini kiritishingiz shart</div>

                                    @enderror
                                </div>


                                <div class="form-group">
                                    <textarea id="summernote" name="content">{{old('content')}}</textarea>
                                    @error('content')
                                    <div class="text-danger">Nomini kiritishingiz shart</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50">
                                    <label for="exampleInputFile">Rasm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Rasmni
                                                tanlang</label>

                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('preview')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50">
                                    <label>Kategoriyalarni tanlang</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"

                                                    {{$category->id == old('category_id')? 'selected':''}}
                                            >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Taglarni tanlang</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}" {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids'))?'selected':''      }}>{{$tag->title}}</option>

                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Qo'shish">
                                </div>



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
