@extends('backend.layouts.master')

@section('title', 'Photo Gallery')

@section('content')


<div class="container-fluid m-0 ">
    <div class="col-md-12">
        <div class="row">
            <button data-toggle="modal" data-target="#PhotoModal" id="addNewPhotoBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
        </div>
        <div class="row photoRow">

        </div>
        <button class="btn btn-sm btn-primary" id="LoadMoreBtn"> Load More </button>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="PhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" id="imgInput" type="file">
                <img class="imgPreview mt-3" id="imgPreview" src="{{asset('backend/images/image-preview.jpg')}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button id="SavePhoto" type="button" class="btn btn-sm btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


@endsection


@section('script')

<script type="text/javascript">
    //Image input for preview click//
    $('#imgInput').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imgPreview').attr('src', ImgSource)
        }
    })
    //Image input for preview click//

    //Image insert//
    $('#SavePhoto').on('click', function() {

        $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
        var PhotoFile = $('#imgInput').prop('files')[0];
        var formData = new FormData();

        formData.append('photo', PhotoFile);

        axios.post("/photoAdd", formData).then(function(response) {
            if (response.status == 200 && response.data == 1) {
                $('#PhotoModal').modal('hide');
                $('#SavePhoto').html('Save');
                toastr.success('Photo Upload Success');
            } else {
                $('#PhotoModal').modal('hide');
                toastr.error('Photo Upload Fail');
            }
        }).catch(function(error) {
            $('#PhotoModal').modal('hide');
            toastr.error('Photo Upload Fail');
            $('#SavePhoto').html('Save');
        })

    });
    //Image insert//

    //Function call//

    //Function call//
    loadPhoto();
    //Load photo//
    function loadPhoto() {
        axios.get('/loadPhoto').then(function(response) {

            $.each(response.data, function(i, item) {
                $("<div class='col-md-4 p-1'>").html(
                    "<img data-id=" + item['id'] + " class='imgOnRow' src=" + item['location'] + ">" +
                    "<button data-id=" + item['id'] + " data-photo=" + item['location'] + " class='btn deletePhoto btn-sm'> Delete</button>"
                ).appendTo('.photoRow');
            })

            //Photo delete get id
            $('.deletePhoto').on('click', function(event) {
                let id = $(this).data('id');
                let photo = $(this).data('photo');

                photoDelete(photo, id);

                event.preventDefault();
            })
            //Photo delete get id

        }).catch(function(error) {

        });

    }
    //Load photo//

    //load more
    var ImgID = 0;

    function LoadByID(firstImgID, loadMoreBtn) {
        ImgID = ImgID + 3;
        let PhotoID = ImgID + firstImgID;
        let URL = "/loadPhotoJsonById/" + PhotoID

        loadMoreBtn.html("<div class='spinner-border spinner-border-sm' role='status'></div>")
        axios.get(URL).then(function(response) {
            loadMoreBtn.html("Load More");

            $.each(response.data, function(i, item) {
                $("<div class='col-md-4 p-1'>").html(
                    "<img data-id=" + item['id'] + " class='imgOnRow' src=" + item['location'] + ">" +
                    "<button data-id=" + item['id'] + " data-photo=" + item['location'] + " class='btn btn-sm deletePhoto'> Delete</button>"
                ).appendTo('.photoRow');
            })

        }).catch(function(error) {

        })

    }

    $('#LoadMoreBtn').on('click', function() {
        let loadMoreBtn = $(this);
        let firstImgID = $(this).closest('div').find('img').data('id');
        LoadByID(firstImgID, loadMoreBtn);
    })
    //load more

    //Photo delete//
    function photoDelete(oldPhotoURL, id) {
        let URL = "/photoDelete";
        let myFormData = new FormData();
        myFormData.append('oldPhotoURL', oldPhotoURL);
        myFormData.append('id', id);
        axios.post(URL, myFormData).then(function(response) {
            if (response.status == 200 && response.data == 1) {
                toastr.success('Photo Delete Success');
                window.location.href = "/photos";

            } else {
                toastr.error('Delete Fail. Try Again');
            }
        }).catch(function() {
            toastr.error('Delete Fail. Try Again');
        })

    }
    //Photo delete//
</script>

@endsection