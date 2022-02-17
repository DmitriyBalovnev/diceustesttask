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

function reqListener() {
    console.log(this.responseText);
}
function playall() {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", reqListener);
    oReq.open("GET", "/play-all");
    oReq.send();
}
function nextweek() {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", reqListener);
    oReq.open("GET", "/next-week");
    oReq.send();
}
