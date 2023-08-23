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
function previewImages(event) {
    var previewContainer = document.getElementById('image-preview');
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
            deleteButton.setAttribute('type', 'button'); // Đảm bảo nút là loại button để không gửi form
            // Thêm sự kiện xóa ảnh khi click vào nút delete-button
            deleteButton.addEventListener('click', function () {
                var container = this.parentElement; // Phần tử cha của nút delete-button (div.image-container)
                container.remove(); // Xóa phần tử cha (div.image-container) khỏi previewContainer
                updateFileInput(); // Cập nhật thuộc tính multiple cho file input
            });
            imgContainer.appendChild(imgElement);
            imgContainer.appendChild(deleteButton);
            previewContainer.appendChild(imgContainer);
        }
        reader.readAsDataURL(file);
    }
    updateFileInput();
}
function updateFileInput() {
    var fileInput = document.getElementById('file-input');
    var previewContainer = document.getElementById('image-preview');
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
