<script>

document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử cần sử dụng
    const btnAdd = document.querySelector(".btn-success");
    const tableBody = document.querySelector("table tbody");

    // Sự kiện cho nút Thêm
    btnAdd.addEventListener("click", function () {
        // Tạo modal
        const modal = document.createElement("div");
        modal.style.position = "fixed";
        modal.style.top = "0";
        modal.style.left = "0";
        modal.style.width = "100%";
        modal.style.height = "100%";
        modal.style.backgroundColor = "rgba(0,0,0,0.5)";
        modal.style.display = "flex";
        modal.style.justifyContent = "center";
        modal.style.alignItems = "center";

        // Nội dung form trong modal
        modal.innerHTML = `
            <div style="width: 400px; height: 200px; background: white; padding: 20px; border-radius: 8px; text-align: center;">
                <h3>Thêm Sản Phẩm</h3>
                <form id="addForm">
                    <input type="text" id="productName" placeholder="Tên sản phẩm" required style="margin-bottom: 10px; padding: 5px; width: 80%;"><br>
                    <input type="number" id="productPrice" placeholder="Giá sản phẩm" required style="margin-bottom: 10px; padding: 5px; width: 80%;"><br>
                    <button type="button" id="btnOk" style="border-radius: 5% ;width: 50px; height: 30px; background-color: cyan; margin-right: 70px; margin-top: 10px">OK</button>
                    <button type="button" id="btnCancel" style="border-radius: 5%; width: 50px; height: 30px; background-color: red ;margin-top: 10px">Hủy</button>
                </form>
            </div>
        `;
        document.body.appendChild(modal);

        // Sự kiện cho nút OK
        document.getElementById("btnOk").addEventListener("click", function () {
            const name = document.getElementById("productName").value.trim();
            const price = document.getElementById("productPrice").value.trim();

            if (name && price) {
                // Thêm sản phẩm vào bảng
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>${name}</td>
                    <td>${price} VND</td>
                    <td><a href="#" class="text-primary "><i class="bi bi-pencil-square"></i></a></td>
                    <td><a href="#" class="text-danger"><i class="bi bi-trash-fill"></i></a></td>
                `;
                tableBody.appendChild(newRow);
                attachEventsToRow(newRow); // Gắn sự kiện sửa và xóa

                // Xóa modal
                document.body.removeChild(modal);
            } else {
                alert("Vui lòng nhập đầy đủ thông tin!");
            }
        });

        // Sự kiện cho nút Hủy
        document.getElementById("btnCancel").addEventListener("click", function () {
            document.body.removeChild(modal);
        });
    });

    // Gắn sự kiện sửa và xóa cho các dòng sản phẩm ban đầu
    Array.from(tableBody.querySelectorAll("tr")).forEach(attachEventsToRow);

    function attachEventsToRow(row) {
        // Sự kiện sửa
        const editButton = row.querySelector(".bi-pencil-square");
        editButton.addEventListener("click", function () {
            const cells = row.querySelectorAll("td");
            const nameCell = cells[0];
            const priceCell = cells[1];

            const newName = prompt("Nhập tên mới:", nameCell.textContent);
            if (newName !== null) {
                nameCell.textContent = newName.trim();
            }

            const newPrice = prompt("Nhập giá mới:", priceCell.textContent.replace(" VND", ""));
            if (newPrice !== null) {
                priceCell.textContent = newPrice.trim() + " VND";
            }
        });

        // Sự kiện xóa
        const deleteButton = row.querySelector(".bi-trash-fill");
        deleteButton.addEventListener("click", function () {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                row.remove();
            }
        });
    }
});

</script>