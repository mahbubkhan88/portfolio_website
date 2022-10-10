@extends('backend.layouts.master')

@section('title', 'Project')

@section('content')


<!-- Add new project modal section -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="projectAddForm" class="w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="projectTitleAdd" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="projectDescriptionAdd" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Project Link</label>
                        <input id="projectLinkAdd" type="text" class="form-control" id="link" aria-describedby="link">
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="projectImageAdd" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="projectAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new project modal section -->









<!-- Data show section -->
<div id="mainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewProjectId" class="btn btn-sm btn-danger mb-4" style="margin-left:-2px">Add New</button>
            <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="project_table">

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





<!-- Delete project modal section -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Do you want to delete data?</h4>
                <h6 id="projectDeleteId" class="d-none"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button id="projectDeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete project modal section -->






<!-- Edit project modal section -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="projectEditId" class="d-none"></h6>

                <div id="projectEditForm" class="d-none w-100">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="projectTitle" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="projectDescription" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Project Link</label>
                        <input id="projectLink" type="text" class="form-control" id="link" aria-describedby="link">
                    </div>
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input id="projectImage" type="text" class="form-control" id="image" aria-describedby="image">
                    </div>
                </div>

                <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                <h5 id="projectEditWrong" class="d-none">Something Went Wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="projectEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit project modal section -->





@endsection


@section('script')

<script type="text/javascript">


//--------------Project add function--------------//
//Add new project button click
$('#addNewProjectId').click(function() {
    $('#addModal').modal('show');
});

//Project add modal save button
$('#projectAddConfirmBtn').click(function() {
    var title       = $('#projectTitleAdd').val();
    var description = $('#projectDescriptionAdd').val();
    var link        = $('#projectLinkAdd').val();
    var image       = $('#projectImageAdd').val();
    projectAdd(title, description, link, image);
})
//Project add modal save button

//Project add method
function projectAdd(projectTitle, projectDescription, projectLink, projectImage) {

    if (projectTitle.length == 0) {
        toastr.error('Project title is empty!');

    } else if (projectDescription.length == 0) {
        toastr.error('Project description is empty!');

    } else if (projectLink.length == 0) {
        toastr.error('Project link is empty!');

    } else if (projectImage.length == 0) {
        toastr.error('Project image is empty!');

    } else {

        $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/projectAdd', {
                title      : projectTitle,
                description: projectDescription,
                link       : projectLink,
                image      : projectImage,

            })
            .then(function(response) {

                $('#projectAddConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#addModal').modal('hide');
                        toastr.success('Data insert success');
                        getProjectData();

                    } else {

                        $('#addModal').modal('hide');
                        toastr.error('Data insert fail');
                        getProjectData();
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
//Project add method
//--------------Project add function--------------//








//--------------Project view at data table function--------------//
//Project view table method
function getProjectData() {
    axios.get('/getProjectData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#projectDataTable').DataTable().destroy();
                $('#project_table').empty();

                var jsonData = response.data;
                jsonData = jsonData.data;

                $.each(jsonData, function(i) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].id + "</td>" +
                        "<td><img class='table-img' src=" + jsonData[i].image + "></td>" +
                        "<td>" + jsonData[i].title + "</td>" +
                        "<td>" + jsonData[i].description + "</td>" +
                        "<td>" + jsonData[i].link + "</td>" +
                        "<td> <a class='projectEditBtn' data-id = " + jsonData[i].id + " ><i class='fas fa-edit'></i></a> </td>" +
                        "<td> <a class='projectDeleteBtn' data-id = " + jsonData[i].id + " '><i class='fas fa-trash-alt'></i></a> </td>"
                    ).appendTo('#project_table');
                });

                //Delete project function for get id and open modal//
                //Project table data delete icon click
                $('.projectDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#projectDeleteId').html(id)
                    $('#deleteModal').modal('show');
                })
                //Delete project function for get id and open modal//

                //Edit project function for get id and open modal...//
                //Project table data edit icon click
                $('.projectEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#projectEditId').html(id);
                    projectUpdateDetails(id);
                    $('#editModal').modal('show');
                })
                //Edit project function for get id and open modal...//

                //Data Table//
                $('#projectDataTable').DataTable({"order":false});
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
//Project view table method
getProjectData();
//--------------Project view at data table function--------------//









//--------------Project delete method function--------------//
//Project table data delete modal yes button
$('#projectDeleteConfirmBtn').click(function() {
    var id = $('#projectDeleteId').html();
    projectDelete(id);
})
//Project table data delete modal yes button

//Project delete method
function projectDelete(deleteId) {

    $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

    axios.post('/projectDelete', {
            id: deleteId
        })
        .then(function(response) {

            $('#projectDeleteConfirmBtn').html("Yes");

            if (response.status == 200) {
                if (response.data == 1) {

                    $('#deleteModal').modal('hide');
                    toastr.success('Data delete success');
                    getProjectData();

                } else {

                    $('#deleteModal').modal('hide');
                    toastr.error('Data delete fail');
                    getProjectData();
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
//Project delete method
//--------------Project delete method function--------------//










//--------------Project update details function--------------//
//Project edit details method
function projectUpdateDetails(detailsID) {
    axios.post('/projectDetails', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#projectEditForm').removeClass('d-none');
                $('#projectEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#projectTitle').val(jsonData[0].title);
                $('#projectDescription').val(jsonData[0].description);
                $('#projectLink').val(jsonData[0].link);
                $('#projectImage').val(jsonData[0].image);
            } else {
                $('#projectEditLoader').addClass('d-none');
                $('#projectEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#projectEditLoader').addClass('d-none');
            $('#projectEditWrong').removeClass('d-none');
        });

}
//Project edit details method
//--------------Project update details function--------------//








//--------------Project update function--------------//
//Project edit modal save button
$('#projectEditConfirmBtn').click(function() {
    var id          = $('#projectEditId').html();
    var title       = $('#projectTitle').val();
    var description = $('#projectDescription').val();
    var link        = $('#projectLink').val();
    var image       = $('#projectImage').val();
    projectUpdate(id, title, description, link, image);
})
//Project edit modal save button

//Project update method
function projectUpdate(projectId, projectTitle, projectDescription, projectLink, projectImage) {

    if (projectTitle.length == 0) {
        toastr.error('Project title is empty!');

    } else if (projectDescription.length == 0) {
        toastr.error('Project description is empty!');

    } else if (projectLink.length == 0) {
        toastr.error('Project link is empty!');

    } else if (projectImage.length == 0) {
        toastr.error('Project image is empty!');

    } else {

        $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //Loading animation

        axios.post('/projectUpdate', {
                id          : projectId,
                title       : projectTitle,
                description : projectDescription,
                link        : projectLink,
                image       : projectImage,
            })
            .then(function(response) {

                $('#projectEditConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {

                        $('#editModal').modal('hide');
                        toastr.success('Data update success');
                        getProjectData();

                    } else {

                        $('#editModal').modal('hide');
                        toastr.error('Data update fail');
                        getProjectData();
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
//Project update method
//--------------Project edit function--------------//


</script>

@endsection