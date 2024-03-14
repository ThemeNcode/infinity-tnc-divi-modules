function inftncPopup(url) {
    var width = 600;
    var height = 500;
    var left = (screen.width - width) / 2;
    var top = (screen.height - height) / 2;
    var options = "toolbar=0,status=0,resizable=1,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
    window.open(url, "_blank", options);
}

window.onload = function() {
    var shareLinks = document.querySelectorAll('.inftnc_share_link');
    shareLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            inftncPopup(link.href);
            event.preventDefault(); // Prevent default link behavior
        });
    });
};