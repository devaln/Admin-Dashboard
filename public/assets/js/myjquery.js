$('#profileimg').click(function() {
    $('#profimg').click();
});

function preview() {
    profileimg.src = URL.createObjectURL(event.target.files[0]);
}

$('#delete-user').click(function () {
    $('#modal-user-delete').show(1000);
})

$('#modal-close').click(function () {
    $('#modal-user-delete').hide(1000);
})
