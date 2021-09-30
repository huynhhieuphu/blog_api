@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Post
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#postModal">Add New
                            Post</a>
                        <a href="#" class="btn btn-danger" id="deleteSelectedRecord">Delete Selected</a>
                    </div>

                    <div class="card-body">
                        <table id="postTable" class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="chkCheckAll"></th>
                                <th>Title</th>
                                <th>Images</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr id="sid{{$post->id}}">
                                    <td><input type="checkbox" name="ids" class="checkBoxClass"
                                               value="{{$post->id}}"></td>
                                    <td width="20%">{{substr($post->title, 0, 50)}}...</td>
                                    <td width="12%">
                                        <img src="{{asset('uploads/images/'. $post->images)}}" alt="{{$post->images}}"
                                             class="img-fluid">
                                    </td>
                                    <td>{{substr($post->description, 0, 120)}}...</td>
                                    <td width="15%">{{$post->category->name}}</td>
                                    <td>{{$post->status}}</td>
                                    <td width="12%">
                                        <a href="javascript:void(0);" onclick="showPost({{$post->id}})"
                                           class="btn btn-primary btn-sm" data-toggle="modal"
                                           data-target="#postShowModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0);" onclick="editPost({{$post->id}})"
                                           class="btn btn-success btn-sm"><i class="fa fa-pencil"
                                                                             aria-hidden="true"></i></a>
                                        <a href="javascript:void(0);" onclick="deletePost({{$post->id}})"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end .containter -->

    <!-- Add Post Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="postForm">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" name="images" id="images">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control"
                                      style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" rows="10" class="form-control"
                                      style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status" name="status" value="0">
                                <label for="inActive" class="form-check-label">InActive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status" name="status" value="1" checked>
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Post Modal -->
    <div class="modal fade" id="postShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 id="title"></h2>
                            <h5 id="category"></h5>
                            <div class="my-3" id="description"></div>
                        </div>
                        <div class="col-md-4">
                            <img src="" alt="" class="img-fluid" id="images">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="body"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Post Modal -->
    <div class="modal fade" id="postEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="postForm2">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="title2">Title</label>
                            <input type="text" class="form-control" name="title2" id="title2">
                        </div>
                        <div class="form-group">
                            <label for="images2">Images</label>
                            <input type="file" class="form-control" name="images2" id="images2">
                            <img id="previewImages" style="max-width: 130px;margin-top: 20px;">
                            <input type="hidden" name="oldImg" id="oldImg">
                        </div>
                        <div class="form-group">
                            <label for="description2">Description</label>
                            <textarea name="description2" id="description2" rows="4" class="form-control"
                                      style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body2">Body</label>
                            <textarea name="body2" id="body2" rows="10" class="form-control"
                                      style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category2">Category</label>
                            <select name="category2" id="category2" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status2">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status2" name="status2" value="0">
                                <label for="inActive" class="form-check-label">InActive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status2" name="status2" value="1" checked>
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let path = "{{asset('uploads/images')}}";

        $(document).ready(function () {
            $('#postForm').submit(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('dashboard.post.store')}}',
                    type: 'POST',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response) {
                            $('#postTable tbody').prepend("<tr id='sid" + response.post.id + "'>" +
                                "<td><input type='checkbox' name='ids' class='checkBoxClass' value='" + response.post.id + "'></td>" +
                                "<td width='20%'>" + response.post.title.substr(0, 150) + "</td>" +
                                "<td width='12%'><img src='" + path + '/' + response.post.images + "' alt='" + response.post.images + "' class='img-fluid'></td>" +
                                "<td>" + response.post.description.substr(0, 120) + "...</td>" +
                                "<td width='15%'>" + response.category.name + "</td>" +
                                "<td>" + response.post.status + "</td>" +
                                "<td><a href='javascript:void(0);' onclick='showPost("+ response.post.id +")' class='btn btn-primary btn-sm'><i class='fa fa-eye' aria-hidden='true'></i></a> " +
                                "<a href='javascript:void(0);' onclick='editPost("+ response.post.id +")' class='btn btn-success btn-sm'><i class='fa fa-pencil' aria-hidden='true'></i></a> " +
                                "<a href='javascript:void(0);' class='btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>");
                            $('#postForm')[0].reset();
                            $('#postModal').modal('hide');
                        }
                    }
                });
            });

            $('#postForm2').submit(function (e) {
                e.preventDefault();

                let formData = new FormData(this);
                formData.append('_method', 'PUT');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let url = '{{route("dashboard.post.update", ["post" => ":id"])}}';
                url = url.replace(":id", $('#postEditModal #id').val());

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#sid" + response.post.id + " td:nth-child(2)").text(response.post.title.substr(0, 150) + '...');
                        $("#sid" + response.post.id + " td:nth-child(3)").html("<img src='"+ path + "/" + response.post.images  +"' alt='" + response.post.images  +"' class='img-fluid'>");
                        $("#sid" + response.post.id + " td:nth-child(4)").text(response.post.description.substr(0, 120) + '...');
                        $("#sid" + response.post.id + " td:nth-child(5)").text(response.category.name);
                        $("#sid" + response.post.id + " td:nth-child(6)").text(response.post.status);
                        $('#postForm2')[0].reset();
                        $('#postEditModal').modal('hide');
                    }
                })
            });

            $('#chkCheckAll').on('click', function () {
                $('.checkBoxClass').prop('checked', $(this).prop('checked'));
            });

            $('#deleteSelectedRecord').on('click', function (e) {
                e.preventDefault();
                let allids = [];

                $('input:checkbox[name=ids]:checked').each(function () {
                    allids.push($(this).val());
                });

                if(allids.length > 0){
                    $.ajax({
                        url: "{{route('dashboard.post.del.checked')}}",
                        type: "DELETE",
                        data: {
                            ids: allids,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (response) {
                            $.each(allids, function (key, value) {
                                $('#sid' + value).remove();
                            });

                            $('#chkCheckAll').prop('checked', false);;
                        }
                    });
                }
                return false;
            });
        });

        function showPost(id) {
            let url = '{{route("dashboard.post.show", ["post" => ":id"])}}';
            url = url.replace(":id", id);

            $.get(url, function (post) {
                $('#postShowModal #title').text(post.title);
                $('#postShowModal #category').text(post.category.name);
                $('#postShowModal #description').text(post.description);
                $('#postShowModal #images').attr({
                    'src': path + '/' + post.images,
                    'alt': post.images
                });
                $('#postShowModal #body').text(post.body);
                $('#postShowModal').modal('toggle');
            });
        }

        function editPost(id) {
            let url = '{{route("dashboard.post.edit", ["post" => ":id"])}}';
            url = url.replace(":id", id);

            $.get(url, function (post) {
                $('#postEditModal #id').val(post.id);
                $('#postEditModal #title2').val(post.title);
                $('#postEditModal #previewImages').attr({
                    'src': path + '/' + post.images,
                    'alt': post.images
                });
                $('#postEditModal #oldImg').val(post.images);
                $('#postEditModal #description2').val(post.description);
                $('#postEditModal #body2').val(post.body);
                $('#postEditModal #category2').val(post.category_id);
                $('#postEditModal input[name=status2][value="' + post.status + '"]').prop('checked', true);
                $('#postEditModal').modal('toggle');
            });
        }

        function deletePost(id) {
            if (confirm('ban co chac xoa ?')) {
                let url = '{{route('dashboard.post.destroy', ['post' => ':id'])}}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token: '{{csrf_token()}}'},
                    success: function (response) {
                        if (response) {
                            $('#sid' + id).remove();
                            alert(response.success);
                        }
                    }
                });
            }
        }
    </script>
@endpush
