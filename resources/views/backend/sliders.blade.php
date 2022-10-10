@extends('backend.layouts.master')

@section('title', 'Slider')

@section('content')

<!-- Data show section -->
<div id="mainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewSliderId" class="btn btn-sm btn-danger mb-4" style="margin-left:-2px">Add New</button>
            <table id="sliderDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">SL</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="slider_table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data show section -->

<!-- Loader section -->
<div id="loaderDiv" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->

<!-- Delete slider modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="sliderDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="sliderDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete slider modal section -->

<!-- Edit slider modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="sliderEditId" class="d-none"></h6>

                <div id="sliderEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="sliderTitle" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="sliderDescription" class="form-control" id="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="sliderImage" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

                <img id="sliderEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="sliderEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="sliderEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit slider modal section -->


<!-- Add new slider modal section -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="sliderAddForm" class="w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="sliderTitleAdd" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="sliderDescriptionAdd" class="form-control" id="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="sliderImageAdd" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="sliderAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new slider modal section -->

@endsection


@section('script')

<script type="text/javascript">
    //--------------Slider add function--------------//
    //Add new slider button click
    $('#addNewSliderId').click(function() {
        $('#addModal').modal('show');
    });

    // Slider add modal save button
    $('#sliderAddConfirmBtn').click(function() {
        var title = $('#sliderTitleAdd').val();
        var description = $('#sliderDescriptionAdd').val();
        var image = $('#sliderImageAdd').val();
        sliderAdd(title, description, image);
    })
    // Slider add modal save button

    //Slider add method
    function sliderAdd(sliderTitle, sliderDescription, sliderImage) {

        if (sliderTitle.length == 0) {
            toastr.error('Slider title is empty!');

        } else if (sliderDescription.length == 0) {
            toastr.error('Slider description is empty!');

        } else if (sliderImage.length == 0) {
            toastr.error('Slider image is empty!');

        } else {

            $('#sliderAddConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/sliderAdd', {
                    title: sliderTitle,
                    description: sliderDescription,
                    image: sliderImage,

                })
                .then(function(response) {

                    $('#sliderAddConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#addModal').modal('hide');
                            toastr.success('Data insert success');
                            getSlidersData();

                        } else {

                            $('#addModal').modal('hide');
                            toastr.error('Data insert fail');
                            getSlidersData();
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
    //Slider add method
    //--------------Slider add function--------------//







    //--------------Slider view at data table function--------------//
    //Slider view table method
    function getSlidersData() {
        axios.get('/getSlidersData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');

                    $('#sliderDataTable').DataTable().destroy();
                    $('#slider_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td><img class='table-img' src=" + jsonData[i].image + "></td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].description + "</td>" +
                            "<td> <a class='sliderEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>" +
                            "<td> <a class='sliderDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#slider_table');
                    });

                    //Delete slider function for get id and open modal//
                    //Slider table data delete icon click
                    $('.sliderDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#sliderDeleteId').html(id)
                        $('#deleteModal').modal('show');
                    })
                    //Delete slider function for get id and open modal//

                    //Edit slider function for get id and open modal...//
                    //Slider table data edit icon click
                    $('.sliderEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#sliderEditId').html(id);
                        sliderUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit slider function for get id and open modal...//

                    //Data Table//
                    $('#sliderDataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');
                    //Data Table//

                } else {

                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            });
    }
    //Slider view table method
    getSlidersData();
    //--------------Slider view at data table function--------------//







    //--------------Slider delete method function--------------//
    //Slider table data delete modal yes button
    $('#sliderDeleteConfirmBtn').click(function() {
        var id = $('#sliderDeleteId').html();
        sliderDelete(id);
    })
    //Slider table data delete modal yes button

    //Slider delete method
    function sliderDelete(deleteId) {

        $('#sliderDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/sliderDelete', {
                id: deleteId
            })
            .then(function(response) {

                $('#sliderDeleteConfirmBtn').html("Yes");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#deleteModal').modal('hide');
                        toastr.success('Data delete success');
                        getSlidersData();

                    } else {

                        $('#deleteModal').modal('hide');
                        toastr.error('Data delete fail');
                        getSlidersData();
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
    //Slider delete method
    //--------------Slider delete method function--------------//







    //--------------Slider update details function--------------//
    //Slider edit details method
    function sliderUpdateDetails(detailsID) {
        axios.post('/sliderDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#sliderEditForm').removeClass('d-none');
                    $('#sliderEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#sliderTitle').val(jsonData[0].title);
                    $('#sliderDescription').val(jsonData[0].description);
                    $('#sliderImage').val(jsonData[0].image);
                } else {
                    $('#sliderEditLoader').addClass('d-none');
                    $('#sliderEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#sliderEditLoader').addClass('d-none');
                $('#sliderEditWrong').removeClass('d-none');
            });

    }
    //Slider edit details method
    //--------------Slider update details function--------------//





    //--------------Slider update function--------------//
    // Slider edit modal save button
    $('#sliderEditConfirmBtn').click(function() {
        var id = $('#sliderEditId').html();
        var title = $('#sliderTitle').val();
        var description = $('#sliderDescription').val();
        var image = $('#sliderImage').val();
        sliderUpdate(id, title, description, image);
    })
    // Slider edit modal save button

    //Slider update method
    function sliderUpdate(sliderId, sliderTitle, sliderDescription, sliderImage) {

        if (sliderTitle.length == 0) {
            toastr.error('Slider title is empty!');

        } else if (sliderDescription.length == 0) {
            toastr.error('Slider description is empty!');

        } else if (sliderImage.length == 0) {
            toastr.error('Slider image is empty!');

        } else {

            $('#sliderEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/sliderUpdate', {
                    id: sliderId,
                    title: sliderTitle,
                    description: sliderDescription,
                    image: sliderImage,

                })
                .then(function(response) {

                    $('#sliderEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getSlidersData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getSlidersData();
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
    //Slider update method
    //--------------Slider edit function--------------//
</script>

@endsection