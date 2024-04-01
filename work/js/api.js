$(document).ready(function () {
    var appName;
    var phone;
    var address
    var message;
    $('#Appname').on('input', function () {
        appName = $(this).val(); 
    });
    $('#phone').on('input', function () {
        phone = $(this).val(); 
    });
    $('#address').on('input', function () {
        address = $(this).val(); 
    });
 
    var address = $('#address').val().trim();
    var name = $('#docName').text().trim(); // Use .text() if retrieving text content
    var aId = $('#A-id').text().trim();
    var dId = $('#D-id').text().trim();
    var SpId = $('#sp-id').text().trim();
    var aDate = $('#AppointmentDate').text().trim();
    var aTime = $('#AppointmentTime').text().trim();

    $('#makeAppointment').on('click', function () {
        $.ajax({
            url: "/work/libs/load.php",
            type : "POST",
            data: {
                Fullname : appName,
                Phone : phone,
                Address : address,
                DocName : name,
                AppId : aId,
                DocId : dId,
                Special : SpId,
                AppDate : aDate,
                AppTime : aTime
            },
            success: function (data) {
                if(data){
                    swal({
                        title: "Success!",
                        text: "Appointment Accepted",
                        icon: "success",
                      }).then(function() {  
                        window.location.href = "/work/";
                      })
                }else{
                    swal({
                        title: "Error!",
                        text: "Something Went Wrong Check again",
                        icon: "error",
                      })
                }
            }
        });

    });
});
