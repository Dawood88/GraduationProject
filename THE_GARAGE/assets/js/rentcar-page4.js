//setInterval(run, 1000);

function run() {
    var nexttime = parseInt($('.time').text()) - 1;
    console.log(nexttime)
    $('.time').text(nexttime)
}
setTimeout(function() {
    window.location.replace("index.php");
}, 5000);