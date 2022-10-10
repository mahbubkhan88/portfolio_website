@extends('backend.layouts.master')

@section('title', 'Terms & Conditions')

@section('content')


<!-- Data show section -->
<div id="mainDivTerm" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="termDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="20%">title</th>
                        <th width="60%">Description</th>
                        <th width="10%">Edit</th>
                    </tr>
                </thead>
                <tbody id="term_table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data show section -->


<!-- Loader section -->
<div id="loaderDivTerm" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivTerm" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->




<!-- Edit term modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Terms & Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="termEditId" class="d-none"></h6>

                <div id="termEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="termTitle" type="text" class="form-control" aria-describedby="title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="termDescription" class="form-control" rows="10"></textarea>
                    </div>

                </div>

                <img id="termEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="termEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="termEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit term modal section -->



@endsection


@section('script')


<script type="text/javascript">
    //--------------Term view at data table function--------------//
    //Term view table method
    function getTermData() {
        axios.get('/getTermData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDivTerm').removeClass('d-none');
                    $('#loaderDivTerm').addClass('d-none');

                    $('#termDataTable').DataTable().destroy();
                    $('#term_table').empty();

                    var jsonData = response.data;
                    jsonData = jsonData.data;

                    $.each(jsonData, function(i) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].id + "</td>" +
                            "<td>" + jsonData[i].title + "</td>" +
                            "<td>" + jsonData[i].description + "</td>" +
                            "<td> <a class='termEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>"
                        ).appendTo('#term_table');
                    });

                    //Edit term function for get id and open modal...//
                    //Term table data edit icon click
                    $('.termEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#termEditId').html(id);
                        termUpdateDetails(id);
                        $('#editModal').modal('show');
                    })
                    //Edit term function for get id and open modal...//

                    //Data Table//
                    $('#termDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');
                    //Data Table//

                } else {

                    $('#loaderDivTerm').addClass('d-none');
                    $('#wrongDivTerm').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#loaderDivTerm').addClass('d-none');
                $('#wrongDivTerm').removeClass('d-none');
            });
    }
    //Term view table method
    getTermData();
    //--------------Term view at data table function--------------//






    //--------------Term update details function--------------//
    //Term edit details method
    function termUpdateDetails(detailsID) {
        axios.post('/termDetails', {
                id: detailsID
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#termEditForm').removeClass('d-none');
                    $('#termEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#termTitle').val(jsonData[0].title);
                    $('#termDescription').val(jsonData[0].description);
                } else {
                    $('#termEditLoader').addClass('d-none');
                    $('#termEditWrong').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('#termEditLoader').addClass('d-none');
                $('#termEditWrong').removeClass('d-none');
            });

    }
    //Term edit details method
    //--------------Term update details function--------------//





    //--------------Term update function--------------//
    // Term edit modal save button
    $('#termEditConfirmBtn').click(function() {
        var id = $('#termEditId').html();
        var title = $('#termTitle').val();
        var description = $('#termDescription').val();
        termUpdate(id, title, description);
    })
    // Term edit modal save button

    //Term update method
    function termUpdate(termId, termTitle, termDescription) {

        if (termTitle.length == 0) {
            toastr.error('Terms and conditions title is empty!');

        } else if (termDescription.length == 0) {
            toastr.error('Terms and conditions description is empty!');

        } else {

            $('#termEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

            axios.post('/termUpdate', {
                    id: termId,
                    title: termTitle,
                    description: termDescription
                })
                .then(function(response) {

                    $('#termEditConfirmBtn').html("Save");

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success('Data update success');
                            getTermData();

                        } else {

                            $('#editModal').modal('hide');
                            toastr.error('Data update fail');
                            getTermData();
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
    //Term update method
    //--------------Term edit function--------------//
</script>

@endsection