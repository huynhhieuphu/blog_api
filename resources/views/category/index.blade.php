@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Category
                        <a href="#" class="btn btn-success" data-toggle="modal"
                           data-target="#categoryModal">Add New Category</a>
                        <a href="#" class="btn btn-danger" id="deleteSelectedRecord">Delete Selected</a>
                    </div>

                    <div class="card-body">
                        <table id="categoryTable" class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="chkCheckAll"></th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr id="sid{{$category->id}}">
                                    <td><input type="checkbox" name="ids" class="checkBoxClass"
                                               value="{{$category->id}}"></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->status}}</td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="editCategory({{$category->id}})"
                                           class="btn btn-primary">Edit</a>
                                        <a href="javascript:void(0);" onclick="deleteCategory({{$category->id}})"
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category">
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

    <!-- Edit Category Modal -->
    <div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm2">
                        @csrf
                        <input type="hidden" id="id" value="id">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category2">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status2" name="status" value="0">
                                <label for="inActive" class="form-check-label">InActive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input status2" name="status" value="1" checked>
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#categoryForm').submit(function (e) {
                e.preventDefault();
                let category = $('#category').val();
                let status = $('.status:checked').val();
                let _token = $('input[name=_token]').val();

                $.ajax({
                    url: "{{route('dashboard.category.add')}}",
                    type: "POST",
                    data: {
                        name: category,
                        status: status,
                        _token: _token,
                    },
                    success: function (response) {
                        if (response) {
                            $('#categoryTable tbody').prepend("<tr id='sid" + response.id + "'>" +
                                "<td><input type='checkbox' name='ids' class='checkBoxClass' value='" + response.id + "'></td>" +
                                "<td>" + response.name + "</td>" +
                                "<td>" + response.slug + "</td>" +
                                "<td>" + response.status + "</td>" +
                                "<td><a href='javascript:void(0);' onclick='editCategory(" + response.id + ")' class='btn btn-primary'>Edit</a> " +
                                "<a href='javascript:void(0);' onclick='deleteCategory(" + response.id + ")' class='btn btn-danger'>Delete</a></td>" +
                                "</tr>");
                            $('#categoryForm')[0].reset();
                            $('#categoryModal').modal('hide');
                        }
                    }
                });
            });

            $('#categoryForm2').submit(function (e) {
                e.preventDefault();

                let id = $('#id').val();
                let category = $('#category2').val();
                let status = $('.status2:checked').val();
                let _token = $('#categoryForm2 input[name=_token]').val();

                $.ajax({
                    url: "{{route('dashboard.category.update')}}",
                    type: "PUT",
                    data: {
                        id: id,
                        name: category,
                        status: status,
                        _token: _token,
                    },
                    success: function (response) {
                        if (response) {
                            // $('#sid' + response.id + ' td:nth-child(1)').html("<input type='checkbox' name='ids' class='checkBoxClass' value='" + response.id + "'>");
                            $('#sid' + response.id + ' td:nth-child(2)').text(response.name);
                            $('#sid' + response.id + ' td:nth-child(3)').text(response.slug);
                            $('#sid' + response.id + ' td:nth-child(4)').text(response.status);
                            $('#categoryForm2')[0].reset();
                            $('#categoryEditModal').modal('hide');
                        }
                    }
                });
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
                        url: "{{route('dashboard.category.deleteSelected')}}",
                        type: "DELETE",
                        data: {
                            ids: allids,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (response) {
                            $.each(response.ids, function (key, value) {
                                $('#sid' + value).remove();
                            });

                            $.each(response.noDel, function (key, value) {
                                $('#sid' + value).addClass('table-danger');

                                setTimeout(function(){
                                    $('#sid' + value).removeClass('table-danger');
                                }, 3000);
                            });

                            $('#chkCheckAll').prop('checked', false);
                            $('.checkBoxClass').prop('checked', false);
                        }
                    });
                }
                return false;
            });
        });

        function editCategory(id) {
            $.get('edit-category/' + id, function (category) {
                $('#id').val(category.id);
                $('#category2').val(category.name);
                $('input[name=status][value="' + category.status + '"]').prop('checked', true);
                $('#categoryEditModal').modal('toggle');
            });
        }

        function deleteCategory(id) {
            if (confirm('ban co chac xoa ?')) {
                $.ajax({
                    url: 'delete-category/' + id,
                    type: 'DELETE',
                    data: {_token: '{{csrf_token()}}'},
                    success: function (response) {
                        if (response.success) {
                            $('#sid' + id).remove();
                            alert(response.success);
                        }else{
                            alert(response.error);
                        }
                    }
                });
            }
        }
    </script>
@endpush
