@extends('backend.layouts.master')

@section('title', 'Privacy Policy')

@section('content')


<!-- Data show section -->
<div id="mainDivPrivacy" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="privacyDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="20%">title</th>
                        <th width="60%">Description</th>
                        <th width="10%">Edit</th>
                    </tr>
                </thead>
                <tbody id="privacy_table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data show section -->


<!-- Loader section -->
<div id="loaderDivPrivacy" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivPrivacy" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->




<!-- Edit privacy modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Privacy Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="privacyEditId" class="d-none"></h6>

                <div id="privacyEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="privacyTitle" type="text" class="form-control" aria-describedby="title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="privacyDescription" class="form-control" rows="10"></textarea>
                    </div>

                </div>

                <img id="privacyEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="privacyEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="privacyEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit privacy modal section -->



@endsection


@section('script')


<script type="text/javascript">
    //--------------Privacy view at data table function--------------//
    //Privacy view table method
    function getPrivacyData() {
        axios.get('/getPrivacyData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDivPrivacy').removeClass('d-none');
                    $('#loaderDivPrivacy').addClass('d-none');

                    $('#privacyDataTable').DataTable().destroy();
                    $('#privacy_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].description + "</td>" +
                            "<td> <a class='privacyEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>"
                        ).appendTo('#privacy_table');
                    });

                    //Edit privacy function for get id and open modal...//
                    //Privacy table data edit icon click
                    $('.privacyEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#privacyEditId').html(id);
                        privacyUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit privacy function for get id and open modal...//

                    //Data Table//
                    $('#privacyDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');
                    //Data Table//

                } else {

                    $('#loaderDivPrivacy').addClass('d-none');
                    $('#wrongDivPrivacy').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#loaderDivPrivacy').addClass('d-none');
                $('#wrongDivPrivacy').removeClass('d-none');
            });
    }
    //Privacy view table method
    getPrivacyData();
    //--------------Privacy view at data table function--------------//






    //--------------Privacy update details function--------------//
    //Privacy edit details method
    function privacyUpdateDetails(detailsID) {
        axios.post('/privacyDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#privacyEditForm').removeClass('d-none');
                    $('#privacyEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#privacyTitle').val(jsonData[0].title);
                    $('#privacyDescription').val(jsonData[0].description);
                } else {
                    $('#privacyEditLoader').addClass('d-none');
                    $('#privacyEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#privacyEditLoader').addClass('d-none');
                $('#privacyEditWrong').removeClass('d-none');
            });

    }
    //Privacy edit details method
    //--------------Privacy update details function--------------//





    //--------------Privacy update function--------------//
    // Privacy edit modal save button
    $('#privacyEditConfirmBtn').click(function() {
        var id = $('#privacyEditId').html();
        var title = $('#privacyTitle').val();
        var description = $('#privacyDescription').val();
        privacyUpdate(id, title, description);
    })
    // Privacy edit modal save button

    //Privacy update method
    function privacyUpdate(privacyId, privacyTitle, privacyDescription) {

        if (privacyTitle.length == 0) {
            toastr.error('Privacy policy title is empty!');

        } else if (privacyDescription.length == 0) {
            toastr.error('Privacy policy description is empty!');

        } else {

            $('#privacyEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/privacyUpdate', {
                    id: privacyId,
                    title: privacyTitle,
                    description: privacyDescription
                })
                .then(function(response) {

                    $('#privacyEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getPrivacyData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getPrivacyData();
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
    //Privacy update method
    //--------------Privacy edit function--------------//
</script>

@endsection