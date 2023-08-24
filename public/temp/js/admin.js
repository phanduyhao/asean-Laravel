// Delete Column CSDL
$(document).ready(function() {
    $('.delete_column').on('click',function (e) {
        var result = confirm("Bạn có muốn xóa bản ghi này không?");
        if (result) {
            $('#delete_column').submit();
        }else{
            e.preventDefault();
        }
    })
})

// Process Upload Images Slide
function previewImages(previewContainerId, fileInputId, event) {
    var previewContainer = document.getElementById(previewContainerId);
    var fileInput = document.getElementById(fileInputId);
    var files = event.target.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = function (e) {
            var imgContainer = document.createElement('div');
            imgContainer.className = 'image-container';
            var imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.style.maxWidth = '200px';
            var deleteButton = document.createElement('button');
            deleteButton.innerHTML = 'X';
            deleteButton.className = 'delete-button';
            deleteButton.setAttribute('type', 'button');
            deleteButton.addEventListener('click', function () {
                var container = this.parentElement;
                container.remove();
                updateFileInput(fileInputId);
            });
            imgContainer.appendChild(imgElement);
            imgContainer.appendChild(deleteButton);
            previewContainer.appendChild(imgContainer);
        };
        reader.readAsDataURL(file);
    }
    updateFileInput(fileInputId);
}

function updateFileInput(fileInputId) {
    var fileInput = document.getElementById(fileInputId);
    var previewContainer = document.getElementById(fileInputId.replace('file-input', 'image-preview'));
    var imageContainers = previewContainer.getElementsByClassName('image-container');

    if (imageContainers.length > 0) {
        fileInput.setAttribute('multiple', 'multiple');
    } else {
        fileInput.removeAttribute('multiple');
    }
}


// tạo Alias tự động
document.addEventListener('DOMContentLoaded', function() {
    var titleInput = document.getElementById('title');
    var aliasInput = document.getElementById('alias');

    titleInput.addEventListener('input', function () {
        var title = this.value;
        var slug = slugify(title);
        aliasInput.value = slug;
    });

    function slugify(text) {
        var unaccentedText = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        return unaccentedText.toLowerCase().trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
    }
});
