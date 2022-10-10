@extends('backend.layouts.master')

@section('title', 'Return Policy')

@section('content')


<!-- Data show section -->
<div id="mainDivReturn" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="returnDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="20%">title</th>
                        <th width="60%">Description</th>
                        <th width="10%">Edit</th>
                    </tr>
                </thead>
                <tbody id="return_table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data show section -->


<!-- Loader section -->
<div id="loaderDivReturn" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivReturn" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->




<!-- Edit return modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Return Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="returnEditId" class="d-none"></h6>

                <div id="returnEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="returnTitle" type="text" class="form-control" aria-describedby="title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="returnDescription" class="form-control" rows="10"></textarea>
                    </div>

                </div>

                <img id="returnEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="returnEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="returnEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit return modal section -->



@endsection


@section('script')


<script type="text/javascript">
    //--------------Return view at data table function--------------//
    //Return view table method
    function getReturnData() {
        axios.get('/getReturnData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDivReturn').removeClass('d-none');
                    $('#loaderDivReturn').addClass('d-none');

                    $('#returnDataTable').DataTable().destroy();
                    $('#return_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].description + "</td>" +
                            "<td> <a class='returnEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>"
                        ).appendTo('#return_table');
                    });

                    //Edit return function for get id and open modal...//
                    //Return table data edit icon click
                    $('.returnEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#returnEditId').html(id);
                        returnUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit return function for get id and open modal...//

                    //Data Table//
                    $('#returnDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');
                    //Data Table//

                } else {

                    $('#loaderDivReturn').addClass('d-none');
                    $('#wrongDivReturn').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#loaderDivReturn').addClass('d-none');
                $('#wrongDivReturn').removeClass('d-none');
            });
    }
    //Return view table method
    getReturnData();
    //--------------Return view at data table function--------------//






    //--------------Return update details function--------------//
    //Return edit details method
    function returnUpdateDetails(detailsID) {
        axios.post('/returnDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#returnEditForm').removeClass('d-none');
                    $('#returnEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#returnTitle').val(jsonData[0].title);
                    $('#returnDescription').val(jsonData[0].description);
                } else {
                    $('#returnEditLoader').addClass('d-none');
                    $('#returnEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#returnEditLoader').addClass('d-none');
                $('#returnEditWrong').removeClass('d-none');
            });

    }
    //Return edit details method
    //--------------Return update details function--------------//





    //--------------Return update function--------------//
    // Return edit modal save button
    $('#returnEditConfirmBtn').click(function() {
        var id = $('#returnEditId').html();
        var title = $('#returnTitle').val();
        var description = $('#returnDescription').val();
        returnUpdate(id, title, description);
    })
    // Return edit modal save button

    //Return update method
    function returnUpdate(returnId, returnTitle, returnDescription) {

        if (returnTitle.length == 0) {
            toastr.error('Return policy title is empty!');

        } else if (returnDescription.length == 0) {
            toastr.error('Return policy description is empty!');

        } else {

            $('#returnEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/returnUpdate', {
                    id: returnId,
                    title: returnTitle,
                    description: returnDescription
                })
                .then(function(response) {

                    $('#returnEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getReturnData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getReturnData();
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
    //Return update method
    //--------------Return edit function--------------//
</script>

@endsection