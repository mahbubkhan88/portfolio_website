@extends('backend.layouts.master')

@section('title', 'Course')

@section('content')

<!-- Course data show section -->
<div id="mainDivCourse" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewCourseId" class="btn btn-sm btn-danger mb-4" style="margin-left:-2px">Add New</button>
            <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Fee</th>
                        <th>Class</th>
                        <th>Enroll</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="course_table">
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Course data show section -->

<!-- Loader section -->
<div id="loaderDivCourse" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivCourse" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->


<!-- Add new course modal section -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="courseAddForm" class="w-100">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="courseTitleAdd" type="text" class="form-control" id="title" aria-describedby="title">
                            </div>

                            <div class="form-group">
                                <label for="fee">Course Fee</label>
                                <input id="courseFeeAdd" type="text" class="form-control" id="fee" aria-describedby="fee">
                            </div>

                            <div class="form-group">
                                <label for="link">Course Link</label>
                                <input id="courseLinkAdd" type="text" class="form-control" id="link" aria-describedby="link">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="enrollment">Enrollment</label>
                                <input id="courseEnrollAdd" type="text" class="form-control" id="enrollment" aria-describedby="enrollment">
                            </div>

                            <div class="form-group">
                                <label for="courseclass">Total Class</label>
                                <input id="courseCourseclassAdd" type="text" class="form-control" id="Courseclass" aria-describedby="Courseclass">
                            </div>

                            <div class="form-group">
                                <label for="image">Image Link</label>
                                <input id="courseImageAdd" type="text" class="form-control" id="image" aria-describedby="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="courseDescriptionAdd" class="form-control" id="description" rows="3"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="courseAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new course modal section -->


<!-- Delete course modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="courseDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="courseDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete course modal section -->

<!-- Edit course modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="courseEditId" class="d-none"></h6>

                <div id="courseEditForm" class="d-none w-100">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="courseTitle" type="text" class="form-control" id="title" aria-describedby="title">
                            </div>

                            <div class="form-group">
                                <label for="fee">Course Fee</label>
                                <input id="courseFee" type="text" class="form-control" id="fee" aria-describedby="fee">
                            </div>

                            <div class="form-group">
                                <label for="image">Image Link</label>
                                <input id="courseImage" type="text" class="form-control" id="image" aria-describedby="image">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="enroll">Enrollment</label>
                                <input id="courseEnroll" type="text" class="form-control" id="enroll" aria-describedby="enroll">
                            </div>

                            <div class="form-group">
                                <label for="courseclass">Total Class</label>
                                <input id="courseCourseclass" type="text" class="form-control" id="courseclass" aria-describedby="courseclass">
                            </div>

                            <div class="form-group">
                                <label for="link">Course Link</label>
                                <input id="courseLink" type="text" class="form-control" id="link" aria-describedby="link">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="courseDescription" class="form-control" id="description" rows="3"></textarea>
                    </div>
                </div>

                <img id="courseEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="courseEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="courseEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit course modal section -->

@endsection


@section('script')
<script type="text/javascript">
    //--------------Course add function--------------//
    //Add new course button click
    $('#addNewCourseId').click(function() {
        $('#addModal').modal('show');
    });

    //Course add modal save button
    $('#courseAddConfirmBtn').click(function() {
        var title = $('#courseTitleAdd').val();
        var description = $('#courseDescriptionAdd').val();
        var fee = $('#courseFeeAdd').val();
        var enroll = $('#courseEnrollAdd').val();
        var courseclass = $('#courseCourseclassAdd').val();
        var link = $('#courseLinkAdd').val();
        var image = $('#courseImageAdd').val();
        courseAdd(title, description, fee, enroll, courseclass, link, image);
    })
    //Course add modal save button

    //Course add method
    function courseAdd(courseTitle, courseDescription, courseFee, courseEnroll, courseCourseclass, courseLink, courseImage) {

        if (courseTitle.length == 0) {
            toastr.error('Course title is empty!');

        } else if (courseDescription.length == 0) {
            toastr.error('Course description is empty!');

        } else if (courseFee.length == 0) {
            toastr.error('Course fee is empty!');

        } else if (courseEnroll.length == 0) {
            toastr.error('Course enrollment is empty!');

        } else if (courseCourseclass.length == 0) {
            toastr.error('Course class is empty!');

        } else if (courseLink.length == 0) {
            toastr.error('Course link is empty!');

        } else if (courseImage.length == 0) {
            toastr.error('Course image is empty!');

        } else {

            $('#courseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/courseAdd', {
                    title: courseTitle,
                    description: courseDescription,
                    fee: courseFee,
                    enroll: courseEnroll,
                    courseclass: courseCourseclass,
                    link: courseLink,
                    image: courseImage,

                })
                .then(function(response) {

                    $('#courseAddConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#addModal').modal('hide');
                            toastr.success('Data insert success');
                            getCourseData();

                        } else {

                            $('#addModal').modal('hide');
                            toastr.error('Data insert fail');
                            getCourseData();
                        }
                    } else {

                        $('#addModal').modal('hide');
                        toastr.error('Something Went Wrong!');
                    }

                })

                .catch(function(error) {
                    $('#addModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                })
        }
    }
    //Course add method
    //--------------Course add function--------------//






    //--------------Course view at data table function--------------//
    //Course view table method
    function getCourseData() {
        axios.get('/getCourseData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDivCourse').removeClass('d-none');
                    $('#loaderDivCourse').addClass('d-none');

                    $('#courseDataTable').DataTable().destroy();
                    $('#course_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td><img class='table-img' src=" + jsonData[i].image + "></td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].fee + "</td>" +
                            "<td>" + jsonData[i].courseclass + "</td>" +
                            "<td>" + jsonData[i].enroll + "</td>" +
                            "<td> <a class='courseViewBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-eye'></i></a> </td>" +
                            "<td> <a class='courseEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>" +
                            "<td> <a class='courseDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#course_table');
                    });

                    //Delete course function for get id and open modal//
                    //Course table data delete icon click
                    $('.courseDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#courseDeleteId').html(id)
                        $('#deleteModal').modal('show');
                    })
                    //Delete course function for get id and open modal//

                    //Edit course function for get id and open modal...//
                    //Course table data edit icon click
                    $('.courseEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#courseEditId').html(id);
                        courseUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit course function for get id and open modal...//

                    //Data Table//
                    $('#courseDataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');
                    //Data Table//

                } else {

                    $('#loaderDivCourse').addClass('d-none');
                    $('#wrongDivCourse').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#loaderDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');
            });
    }
    //Call the function
    getCourseData();
    //--------------Course view at data table function--------------//





    //--------------Course delete method function--------------//
    //Course table data delete modal yes button
    $('#courseDeleteConfirmBtn').click(function() {
        var id = $('#courseDeleteId').html();
        courseDelete(id);
    })
    //Course table data delete modal yes button

    //Course delete method
    function courseDelete(deleteId) {

        $('#courseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/courseDelete', {
                id: deleteId
            })
            .then(function(response) {

                $('#courseDeleteConfirmBtn').html("Yes");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#deleteModal').modal('hide');
                        toastr.success('Data delete success');
                        getCourseData();

                    } else {

                        $('#deleteModal').modal('hide');
                        toastr.error('Data delete fail');
                        getCourseData();
                    }
                } else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                }
            })

            .catch(function(error) {
                $('#deleteModal').modal('hide');
                toastr.error('Something Went Wrong!');
            });
    }
    //Course delete method
    //--------------Course delete method function--------------//






    //--------------Course update details function--------------//
    //Course edit details method
    function courseUpdateDetails(detailsID) {
        axios.post('/courseDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#courseEditForm').removeClass('d-none');
                    $('#courseEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#courseTitle').val(jsonData[0].title);
                    $('#courseDescription').val(jsonData[0].description);
                    $('#courseFee').val(jsonData[0].fee);
                    $('#courseEnroll').val(jsonData[0].enroll);
                    $('#courseCourseclass').val(jsonData[0].courseclass);
                    $('#courseLink').val(jsonData[0].link);
                    $('#courseImage').val(jsonData[0].image);
                } else {
                    $('#courseEditLoader').addClass('d-none');
                    $('#courseEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#courseEditLoader').addClass('d-none');
                $('#courseEditWrong').removeClass('d-none');
            });

    }
    //Course edit details method
    //--------------Course update details function--------------//






    //--------------Course update function--------------//
    // Course edit modal save button
    $('#courseEditConfirmBtn').click(function() {
        var id = $('#courseEditId').html();
        var title = $('#courseTitle').val();
        var description = $('#courseDescription').val();
        var fee = $('#courseFee').val();
        var enroll = $('#courseEnroll').val();
        var courseclass = $('#courseCourseclass').val();
        var link = $('#courseLink').val();
        var image = $('#courseImage').val();
        courseUpdate(id, title, description, fee, enroll, courseclass, link, image);
    })
    // Course edit modal save button

    //Course update method
    function courseUpdate(courseId, courseTitle, courseDescription, courseFee, courseEnroll, courseCourseclass, courseLink, courseImage) {

        if (courseTitle.length == 0) {
            toastr.error('Course title is empty!');

        } else if (courseDescription.length == 0) {
            toastr.error('Course description is empty!');

        } else if (courseFee.length == 0) {
            toastr.error('Course fee is empty!');

        } else if (courseEnroll.length == 0) {
            toastr.error('Course enrollment is empty!');

        } else if (courseCourseclass.length == 0) {
            toastr.error('Course class is empty!');

        } else if (courseLink.length == 0) {
            toastr.error('Course link is empty!');

        } else if (courseImage.length == 0) {
            toastr.error('Course image is empty!');

        } else {

            $('#courseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/courseUpdate', {
                    id: courseId,
                    title: courseTitle,
                    description: courseDescription,
                    fee: courseFee,
                    enroll: courseEnroll,
                    courseclass: courseCourseclass,
                    link: courseLink,
                    image: courseImage,
                })
                .then(function(response) {

                    $('#courseEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getCourseData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getCourseData();
                        }
                    } else {

                        $('#editModal').modal('hide');
                        toastr.error('Something Went Wrong!');
                    }

                })

                .catch(function(error) {
                    $('#editModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                })
        }
    }
    //Course update method
    //--------------Course edit function--------------//
</script>
@endsection