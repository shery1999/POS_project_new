<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = document.getElementById('dataTableExample');

        function loadItems() {
            fetch('{{ route('view_items.post') }}')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.log(data.error);
                    } else {
                        const items = data.Data;
                        dataTable.innerHTML = ''; // Clear existing data from table
                        items.forEach((item, index) => {
                            const row = dataTable.insertRow(index);
                            row.innerHTML = `
                                <td>${item.name}</td>
                                <td>${item.price}</td>
                                <td>${item.quantity}</td>
                                <td>${item.weight}</td>
                                <td>${item.description}</td>
                                <td><a href="/update_item/${item.id}">
                                        <button type="button" class="btn btn-warning">Update</button>
                                    </a></td>
                                <td>
                                    <button value="${item.id}" type="button" class="use-button btn btn-block userStatusUpdate ${item.status == 1 ? 'btn-success' : 'btn-danger'}">
                                        ${item.status == 1 ? 'Active' : 'Block'}
                                    </button>
                                </td>
                            `;
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }

        // Load items on page load
        loadItems();

        // Reload items on button click
        document.getElementById('reloadBtn').addEventListener('click', function() {
            loadItems();
        });

        // Update item status on button click
        dataTable.addEventListener('click', function(event) {
            const target = event.target;
            if (target.classList.contains('userStatusUpdate')) {
                const itemId = target.value;
                const isActive = target.classList.contains('btn-success');
                const statusVal = isActive ? 0 : 1;
                fetch('{{ route('view_items.post') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({
                            id: itemId,
                            status: statusVal
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'User Status Not Updated',
                                text: data.error,
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Workshop Status Updated',
                                text: data.success,
                            })
                            loadItems();
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        });
    });
</script>
