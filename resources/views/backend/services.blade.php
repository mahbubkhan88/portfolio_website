@extends('backend.layouts.master')

@section('title', 'Service')

@section('content')

<!-- Data show section -->
<div id="mainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewServiceId" class="btn btn-sm btn-danger mb-4" style="margin-left:-2px">Add New</button>
            <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                <tbody id="service_table">

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

<!-- Delete service modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="serviceDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="serviceDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete service modal section -->

<!-- Edit service modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="serviceEditId" class="d-none"></h6>

                <div id="serviceEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="serviceTitle" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="serviceDescription" class="form-control" id="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="serviceImage" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

                <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="serviceEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="serviceEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit service modal section -->


<!-- Add new service modal section -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="serviceAddForm" class="w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="serviceTitleAdd" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="serviceDescriptionAdd" class="form-control" id="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="serviceImageAdd" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="serviceAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new service modal section -->

@endsection


@section('script')

<script type="text/javascript">
    //--------------Service add function--------------//
    //Add new service button click
    $('#addNewServiceId').click(function() {
        $('#addModal').modal('show');
    });

    // Service add modal save button
    $('#serviceAddConfirmBtn').click(function() {
        var title = $('#serviceTitleAdd').val();
        var description = $('#serviceDescriptionAdd').val();
        var image = $('#serviceImageAdd').val();
        serviceAdd(title, description, image);
    })
    // Service add modal save button

    //Service add method
    function serviceAdd(serviceTitle, serviceDescription, serviceImage) {

        if (serviceTitle.length == 0) {
            toastr.error('Service title is empty!');

        } else if (serviceDescription.length == 0) {
            toastr.error('Service description is empty!');

        } else if (serviceImage.length == 0) {
            toastr.error('Service image is empty!');

        } else {

            $('#serviceAddConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/serviceAdd', {
                    title: serviceTitle,
                    description: serviceDescription,
                    image: serviceImage,

                })
                .then(function(response) {

                    $('#serviceAddConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#addModal').modal('hide');
                            toastr.success('Data insert success');
                            getServicesData();

                        } else {

                            $('#addModal').modal('hide');
                            toastr.error('Data insert fail');
                            getServicesData();
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
    //Service add method
    //--------------Service add function--------------//







    //--------------Service view at data table function--------------//
    //Service view table method
    function getServicesData() {
        axios.get('/getServicesData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');

                    $('#serviceDataTable').DataTable().destroy();
                    $('#service_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td><img class='table-img' src=" + jsonData[i].image + "></td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].description + "</td>" +
                            "<td> <a class='serviceEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>" +
                            "<td> <a class='serviceDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                        ).appendTo('#service_table');
                    });

                    //Delete service function for get id and open modal//
                    //Service table data delete icon click
                    $('.serviceDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#serviceDeleteId').html(id)
                        $('#deleteModal').modal('show');
                    })
                    //Delete service function for get id and open modal//

                    //Edit service function for get id and open modal...//
                    //Service table data edit icon click
                    $('.serviceEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#serviceEditId').html(id);
                        serviceUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit service function for get id and open modal...//

                    //Data Table//
                    $('#serviceDataTable').DataTable({"order":false});
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
    //Service view table method
    getServicesData();
    //--------------Service view at data table function--------------//







    //--------------Service delete method function--------------//
    //Service table data delete modal yes button
    $('#serviceDeleteConfirmBtn').click(function() {
        var id = $('#serviceDeleteId').html();
        serviceDelete(id);
    })
    //Service table data delete modal yes button

    //Service delete method
    function serviceDelete(deleteId) {

        $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/serviceDelete', {
                id: deleteId
            })
            .then(function(response) {

                $('#serviceDeleteConfirmBtn').html("Yes");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#deleteModal').modal('hide');
                        toastr.success('Data delete success');
                        getServicesData();

                    } else {

                        $('#deleteModal').modal('hide');
                        toastr.error('Data delete fail');
                        getServicesData();
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
    //Service delete method
    //--------------Service delete method function--------------//







    //--------------Service update details function--------------//
    //Service edit details method
    function serviceUpdateDetails(detailsID) {
        axios.post('/serviceDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#serviceEditForm').removeClass('d-none');
                    $('#serviceEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#serviceTitle').val(jsonData[0].title);
                    $('#serviceDescription').val(jsonData[0].description);
                    $('#serviceImage').val(jsonData[0].image);
                } else {
                    $('#serviceEditLoader').addClass('d-none');
                    $('#serviceEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditWrong').removeClass('d-none');
            });

    }
    //Service edit details method
    //--------------Service update details function--------------//





    //--------------Service update function--------------//
    // Service edit modal save button
    $('#serviceEditConfirmBtn').click(function() {
        var id = $('#serviceEditId').html();
        var title = $('#serviceTitle').val();
        var description = $('#serviceDescription').val();
        var image = $('#serviceImage').val();
        serviceUpdate(id, title, description, image);
    })
    // Service edit modal save button

    //Service update method
    function serviceUpdate(serviceId, serviceTitle, serviceDescription, serviceImage) {

        if (serviceTitle.length == 0) {
            toastr.error('Service title is empty!');

        } else if (serviceDescription.length == 0) {
            toastr.error('Service description is empty!');

        } else if (serviceImage.length == 0) {
            toastr.error('Service image is empty!');

        } else {

            $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/serviceUpdate', {
                    id: serviceId,
                    title: serviceTitle,
                    description: serviceDescription,
                    image: serviceImage,

                })
                .then(function(response) {

                    $('#serviceEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getServicesData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getServicesData();
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
    //Service update method
    //--------------Service edit function--------------//
</script>

@endsection