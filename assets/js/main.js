document.addEventListener('DOMContentLoaded', function () {
    var fileInput = document.getElementById('xmlFileInput');
    fileInput.addEventListener('change', handleFileRead);
});

function handleFileRead(event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var content = e.target.result;
            document.getElementById('fileContent').innerHTML = '<pre>' + escapeHtml(content) + '</pre>';
        };
        reader.readAsText(file);
    }
}

function escapeHtml(unsafe) {
    return unsafe.replace(/[&<"']/g, function (m) {
        switch (m) {
            case '&':
                return '&amp;';
            case '<':
                return '&lt;';
            case '"':
                return '&quot;';
            case "'":
                return '&#39;';
        }
    });
}
