$('#play-all').click( function () {
    $.ajax({
        type: 'POST',
        url: "/playall",
            context: document.body
    }).done(function (result) {
        console.log(result);
    });
});
$('#next-week').click( function () {
    $.ajax({
        url: "/nextWeek",
        context: document.body
    }).done(function (result) {
        console.log(result);
    });
});
