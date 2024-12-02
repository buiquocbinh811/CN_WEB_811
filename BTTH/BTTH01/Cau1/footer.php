<footer class="mt-5 text-center">
    <hr>
    <p>&copy; Quản lý cửa hàng hoa</p>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showForm(type, id = '', name = '', description = '', image = '') {
    document.getElementById('modal-overlay').style.display = 'flex';
    document.getElementById('form-type').value = type;
    document.getElementById('form-id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('description').value = description;
    document.getElementById('current-image').value = image;
    
    const imagePreview = document.getElementById('image-preview');
    if (type === 'edit' && image) {
        imagePreview.src = image;
        imagePreview.style.display = 'block';
    } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
    }
    
    if (type === 'add') {
        document.getElementById('flower-form').reset();
    }
}

function hideForm() {
    document.getElementById('modal-overlay').style.display = 'none';
    document.getElementById('flower-form').reset();
}

function previewUploadedFile(input) {
    const preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('flower-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('events.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const action = formData.get('action');
            if (action === 'add') {
                // Thêm hoa mới vào cuối bảng
                const tableBody = document.querySelector('table tbody');
                const newRow = document.createElement('tr');
                newRow.dataset.id = data.flower.id;
                newRow.innerHTML = `
                    <td>${data.flower.name}</td>
                    <td>${data.flower.description}</td>
                    <td><img src="${data.flower.image}" alt="Image" width="100"></td>
                    <td>
                        <button class="btn btn-warning btn-sm" 
                            onclick="showForm('edit', ${data.flower.id}, 
                            '${data.flower.name}', 
                            '${data.flower.description}', 
                            '${data.flower.image}')">Sửa</button>
                        <button class="btn btn-danger btn-sm" 
                            onclick="deleteFlower(${data.flower.id}, this)">Xoá</button>
                    </td>
                `;
                tableBody.appendChild(newRow);
                hideForm(); // Ẩn form sau khi thêm thành công
            } else if (action === 'edit') {
                const row = document.querySelector(`tr[data-id="${data.flower.id}"]`);
                row.children[0].textContent = data.flower.name;
                row.children[1].textContent = data.flower.description;
                row.children[2].querySelector('img').src = data.flower.image;
                hideForm();
            }
        } else {
            alert('Có lỗi xảy ra: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi xử lý yêu cầu');
    });
});

function deleteFlower(id, button) {
    if (confirm('Bạn có chắc chắn muốn xóa hoa này?')) {
        fetch('events.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'delete',
                id: id
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                button.closest('tr').remove();
            } else {
                alert('Có lỗi xảy ra: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi xử lý yêu cầu');
        });
    }
}
</script>
</body>
</html>
