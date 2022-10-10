@extends('backend.layouts.master')

@section('title', 'Review')

@section('content')

<!-- Add new review modal section -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="reviewAddForm" class="w-100">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="reviewNameAdd" type="text" class="form-control" id="name" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="reviewDescriptionAdd" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="reviewImageAdd" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="reviewAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new review modal section -->






<!-- Data show section -->
<div id="mainDivReview" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewReviewId" class="btn btn-sm btn-danger mb-4" style="margin-left:-2px">Add New</button>
            <table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="15%">Image</th>
                        <th width="15%">Name</th>
                        <th width="40%">Message</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </tr>
                </thead>
                <tbody id="review_table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data show section -->


<!-- Loader section -->
<div id="loaderDivReview" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivReview" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->






<!-- Delete review modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="reviewDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="reviewDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete review modal section -->






<!-- Edit review modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="reviewEditId" class="d-none"></h6>

                <div id="reviewEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="reviewName" type="text" class="form-control" id="name" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="reviewDescription" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="reviewImage" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

                <img id="reviewEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="reviewEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="reviewEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit review modal section -->



@endsection


@section('script')

<script type="text/javascript">


//--------------Review add function--------------//
//Add new review button click
$('#addNewReviewId').click(function() {
    $('#addModal').modal('show');
});

//Review add modal save button
$('#reviewAddConfirmBtn').click(function() {
    var name        = $('#reviewNameAdd').val();
    var description = $('#reviewDescriptionAdd').val();
    var image       = $('#reviewImageAdd').val();
    reviewAdd(name, description, image);
})
//Review add modal save button

//Review add method
function reviewAdd(reviewName, reviewDescription, reviewImage) {

    if (reviewName.length == 0) {
        toastr.error('Review name is empty!');

    } else if (reviewDescription.length == 0) {
        toastr.error('Review description is empty!');

    } else if (reviewImage.length == 0) {
        toastr.error('Review image is empty!');

    } else {

        $('#reviewtAddConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/reviewAdd', {
                name        : reviewName,
                description : reviewDescription,
                image       : reviewImage,

            })
            .then(function(response) {

                $('#reviewAddConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#addModal').modal('hide');
                        toastr.success('Data insert success');
                        getReviewData();

                    } else {

                        $('#addModal').modal('hide');
                        toastr.error('Data insert fail');
                        getReviewData();
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
//Review add method
//--------------Review add function--------------//







//--------------Review view at data table function--------------//
//Review view table method
function getReviewData() {
    axios.get('/getReviewData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivReview').removeClass('d-none');
                $('#loaderDivReview').addClass('d-none');

                $('#reviewDataTable').DataTable().destroy();
                $('#review_table').empty();

                var jsonData = response.data;
                jsonData = jsonData.data;

                $.each(jsonData, function(i) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].id + "</td>" +
                        "<td><img class='table-img' src=" + jsonData[i].image + "></td>" +
                        "<td>" + jsonData[i].name + "</td>" +
                        "<td>" + jsonData[i].description + "</td>" +
                        "<td> <a class='reviewEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>" +
                        "<td> <a class='reviewDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                    ).appendTo('#review_table');
                });

                //Delete review function for get id and open modal//
                //Review table data delete icon click
                $('.reviewDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#reviewDeleteId').html(id)
                    $('#deleteModal').modal('show');
                })
                //Delete review function for get id and open modal//

                //Edit review function for get id and open modal...//
                //Review table data edit icon click
                $('.reviewEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#reviewEditId').html(id);
                    reviewUpdateDetails(id);
                    $('#editModal').modal('show');
                })
                //Edit review function for get id and open modal...//

                //Data Table//
                $('#reviewDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
                //Data Table//

            } else {

                $('#loaderDivReview').addClass('d-none');
                $('#wrongDivReview').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loaderDivReview').addClass('d-none');
            $('#wrongDivReview').removeClass('d-none');
        });
}
//Review view table method
getReviewData();
//--------------Review view at data table function--------------//








//--------------Review delete method function--------------//
//Review table data delete modal yes button
$('#reviewDeleteConfirmBtn').click(function() {
    var id = $('#reviewDeleteId').html();
    reviewDelete(id);
})
//Review table data delete modal yes button

//Review delete method
function reviewDelete(deleteId) {

    $('#reviewDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

    axios.post('/reviewDelete', {
            id: deleteId
        })
        .then(function(response) {

            $('#reviewDeleteConfirmBtn').html("Yes");

            if (response.status == 200) {
                if (response.data == 1) {

                    $('#deleteModal').modal('hide');
                    toastr.success('Data delete success');
                    getReviewData();

                } else {

                    $('#deleteModal').modal('hide');
                    toastr.error('Data delete fail');
                    getReviewData();
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
//Review delete method
//--------------Review delete method function--------------//









//--------------Review update details function--------------//
//Review edit details method
function reviewUpdateDetails(detailsID) {
    axios.post('/reviewDetails', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#reviewEditForm').removeClass('d-none');
                $('#reviewEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#reviewName').val(jsonData[0].name);
                $('#reviewDescription').val(jsonData[0].description);
                $('#reviewImage').val(jsonData[0].image);
            } else {
                $('#reviewEditLoader').addClass('d-none');
                $('#reviewEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#reviewEditLoader').addClass('d-none');
            $('#reviewEditWrong').removeClass('d-none');
        });

}
//Review edit details method
//--------------Review update details function--------------//







//--------------Review update function--------------//
// Review edit modal save button
$('#reviewEditConfirmBtn').click(function() {
    var id          = $('#reviewEditId').html();
    var name        = $('#reviewName').val();
    var description = $('#reviewDescription').val();
    var image       = $('#reviewImage').val();
    reviewUpdate(id, name, description, image);
})
// Review edit modal save button

//Review update method
function reviewUpdate(reviewId, reviewName, reviewDescription, reviewImage) {

    if (reviewName.length == 0) {
        toastr.error('Review name is empty!');

    } else if (reviewDescription.length == 0) {
        toastr.error('Review description is empty!');

    } else if (reviewImage.length == 0) {
        toastr.error('Review image is empty!');

    } else {

        $('#reviewEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/reviewUpdate', {
                id          : reviewId,
                name        : reviewName,
                description : reviewDescription,
                image       : reviewImage
            })
            .then(function(response) {

                $('#reviewEditConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#editModal').modal('hide');
                        toastr.success('Data update success');
                        getReviewData();

                    } else {

                        $('#editModal').modal('hide');
                        toastr.error('Data update fail');
                        getReviewData();
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
//Review update method
//--------------Review edit function--------------//




</script>

@endsection