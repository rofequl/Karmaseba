$(document).ready(function () {
    $('#spNotApproveTable').DataTable();
});

$('#exampleModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let recipient = button.data('whatever');
    let modal = $(this);
    modal.find('#ModalUserId').val(recipient);
});

$('.delete').click(function (e) {
    e.preventDefault(); // Prevent the href from redirecting directly
    var linkURL = $(this).attr("href");
    warnBeforeRedirect(linkURL);
});

function warnBeforeRedirect(linkURL) {
    swal({
        title: "Sure want to delete?",
        text: "If you click 'OK' file will be deleted",
        type: "warning",
        showCancelButton: true
    }, function () { // Redirect the user | linkURL is href url
        window.location.href = linkURL;
    });
}


$('.approveAlert').click(function (e) {
    e.preventDefault(); // Prevent the href from redirecting directly
    var linkURL = $(this).attr("href");
    warnBeforeRedirect2(linkURL);
});

function warnBeforeRedirect2(linkURL) {
    swal({
        title: "Sure want to approve?",
        text: "If you click 'OK' User will be Approve",
        type: "success",
        showCancelButton: true
    }, function () { // Redirect the user | linkURL is href url
        window.location.href = linkURL;
    });
}

$('.notApproveAlert').click(function (e) {
    e.preventDefault(); // Prevent the href from redirecting directly
    var linkURL = $(this).attr("href");
    warnBeforeRedirect3(linkURL);
});

function warnBeforeRedirect3(linkURL) {
    swal({
        title: "Sure want to not approve?",
        text: "If you click 'OK' User will be not Approve",
        type: "warning",
        showCancelButton: true
    }, function () { // Redirect the user | linkURL is href url
        window.location.href = linkURL;
    });
}


