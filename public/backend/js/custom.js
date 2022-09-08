$(document).ready(function () {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

function getServicesData() {
    axios.get('/getServicesData')
        .then(function(response) {

            var jsonData = response.data;

            $.each(jsonData, function (i, item) {

                $('<tr>').html(

                    "<td><img cless='table-img' src=" + jsonData[i].image + "></td>" +
                    "<td>" + jsonData[i].title + "</td>" +
                    "<td>" + jsonData[i].description + "</td>" +
                    "<td><a href=''><i class='fas fa-edit'></i></a></td>" +
                    "<td><a href=''><i class='fas fa-trash-alt'></i></a></td>"

                ).append('#service_table');

            });

        }).catch(function (error) {

        });

}

