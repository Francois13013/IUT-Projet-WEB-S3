$('.deleteButton').click(function() {
    $('.deleteButton').load('../../Controllers/controllerDiscussion.php', function(e){
        alert(1);
    });
});

// $(document).ready(function() {
//     $('.deleteButton').click(function(e) {
//         RmMessage();
//     });
// });