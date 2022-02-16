$('#play-all').click( function () {
    alert("playall");
    $.ajax({
        url: "/play-button",
        context: document.body
    }).done(function (result) {
        console.log(result);
    });
});
$('#next-week').click( function () {
    alert("nextweek");
    $.ajax({
        url: "/play-next",
        context: document.body
    }).done(function (result) {
        console.log(result);
    });
});
