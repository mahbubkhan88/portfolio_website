@extends('backend.layouts.master')

@section('title', 'Contact')

@section('content')

<!-- Contact data show section -->
<div id="mainDivContact" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="15%">Name</th>
                        <th width="10%">Mobile</th>
                        <th width="20%">Email</th>
                        <th width="35%">Message</th>
                        <th width="10%">Date & Time</th>
                        <th width="5%">Delete</th>
                    </tr>
                </thead>
                <tbody id="contact_table">
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Contact data show section -->


<!-- Loader section -->
<div id="loaderDivContact" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center mt-5">
            <img src="{{asset('backend/images/loader.svg')}}" alt="">
        </div>
    </div>
</div>
<!-- Loader section -->

<!-- Somthing went wrong section -->
<div id="wrongDivContact" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h2>Something went wrong!</h2>
        </div>
    </div>
</div>
<!-- Somthing went wrong section -->




<!-- Delete contact modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="contactDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="contactDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete contact modal section -->







@endsection


@section('script')
<script type="text/javascript">
//--------------Contact view at data table function--------------//
//Contact view table method
function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivContact').removeClass('d-none');
                $('#loaderDivContact').addClass('d-none');

                $('#contactDataTable').DataTable().destroy();
                $('#contact_table').empty();

                var jsonData = response.data;
                jsonData = jsonData.data;

                $.each(jsonData, function(i) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].id + "</td>" +
                        "<td>" + jsonData[i].name + "</td>" +
                        "<td>" + jsonData[i].mobile + "</td>" +
                        "<td>" + jsonData[i].email + "</td>" +
                        "<td>" + jsonData[i].message + "</td>" +
                        "<td>" + jsonData[i].created_at + "</td>" +
                        "<td> <a class='contactDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                    ).appendTo('#contact_table');
                });

                //Delete contact function for get id and open modal//
                //Contact table data delete icon click
                $('.contactDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#contactDeleteId').html(id)
                    $('#deleteModal').modal('show');
                })
                //Delete contact function for get id and open modal//

                //Data Table//
                $('#contactDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
                //Data Table//

            } else {

                $('#loaderDivContact').addClass('d-none');
                $('#wrongDivContact').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loaderDivContact').addClass('d-none');
            $('#wrongDivContact').removeClass('d-none');
        });
}
//Call the function
getContactData();
//--------------Contact view at data table function--------------//






//--------------Contact delete method function--------------//
    //Contact table data delete modal yes button
    $('#contactDeleteConfirmBtn').click(function() {
        var id = $('#contactDeleteId').html();
        contactDelete(id);
    })
    //Contact table data delete modal yes button

    //Contact delete method
    function contactDelete(deleteId) {

        $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/contactDelete', {
                id: deleteId
            })
            .then(function(response) {

                $('#contactDeleteConfirmBtn').html("Yes");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#deleteModal').modal('hide');
                        toastr.success('Data delete success');
                        getContactData();

                    } else {

                        $('#deleteModal').modal('hide');
                        toastr.error('Data delete fail');
                        getContactData();
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
    //Contact delete method
    //--------------Contact delete method function--------------//


</script>
@endsection