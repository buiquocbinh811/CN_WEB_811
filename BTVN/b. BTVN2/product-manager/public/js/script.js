// handle edit
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const modal = document.querySelector('#productModal');
        const form = modal.querySelector('form');
        
        form.querySelector('[name="action"]').value = 'update';
        form.querySelector('[name="id"]').value = this.dataset.id;
        form.querySelector('[name="name"]').value = this.dataset.name;
        form.querySelector('[name="price"]').value = this.dataset.price;
        form.querySelector('[name="current_image"]').value = this.dataset.image;
        
        const currentImage = modal.querySelector('#currentImage');
        currentImage.style.display = 'block';
        currentImage.querySelector('img').src = this.dataset.image;
        
        new bootstrap.Modal(modal).show();
    });
});

// handle delete
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
        const modal = document.querySelector('#deleteModal');
        modal.querySelector('[name="id"]').value = this.dataset.id;
        new bootstrap.Modal(modal).show();
    });
});

// handle load
document.querySelector('#productModal').addEventListener('hidden.bs.modal', function() {
    this.querySelector('form').reset();
    this.querySelector('[name="action"]').value = 'add';
    this.querySelector('[name="id"]').value = '';
    this.querySelector('[name="current_image"]').value = '';
    this.querySelector('#currentImage').style.display = 'none';
});