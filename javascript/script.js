document.addEventListener('DOMContentLoaded', () => {
    const listPage = document.getElementById('list-page');
    const detailsPage = document.getElementById('details-page');
    const addForm = document.getElementById('add-form');
    const addNewForm = document.getElementById('add-new');

    document.getElementById('add-btn').addEventListener('click', () => {
        addNewForm.classList.toggle('hidden');
    });

    addForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const name = document.getElementById('new-name').value;
        const county = document.getElementById('new-county').value;
        const village = document.getElementById('new-village').value;
        const dateEnrolled = document.getElementById('new-date-enrolled').value;

        fetch('dashboard/children.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'add',
                name: name,
                county: county,
                village: village,
                date_enrolled: dateEnrolled
            })
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            if (data.startsWith("Child")) {
                const newChild = { name, county, village, date_enrolled: dateEnrolled };
                addChildToList(newChild);
                addNewForm.classList.add('hidden'); // Hide the add form
                addForm.reset(); // Clear the form inputs
            }
        });
    });

    document.getElementById('search-bar').addEventListener('input', () => {
        const searchValue = document.getElementById('search-bar').value;
        fetch(`dashboard/children.php?search=${encodeURIComponent(searchValue)}`)
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('list');
                list.innerHTML = ''; // Clear the current list
                data.forEach(child => {
                    addChildToList(child);
                });
            });
    });

    function addChildToList(child) {
        const list = document.getElementById('list');
        const li = document.createElement('li');
        li.textContent = `${child.name}, ${child.county}, ${child.village}`;
        const viewBtn = document.createElement('button');
        viewBtn.textContent = "View";
        viewBtn.addEventListener('click', () => {
            showChildDetails(child);
        });
        const editBtn = document.createElement('button');
        editBtn.textContent = "Edit";
        editBtn.addEventListener('click', () => {
            showChildDetails(child);
        });
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = "Delete";
        deleteBtn.addEventListener('click', () => {
            deleteChild(child.id);
        });
        li.appendChild(viewBtn);
        li.appendChild(editBtn);
        li.appendChild(deleteBtn);
        list.appendChild(li);
    }

    function showChildDetails(child) {
        listPage.classList.add('hidden');
        detailsPage.classList.remove('hidden');

        document.getElementById('edit-name').value = child.name;
        document.getElementById('edit-county').value = child.county;
        document.getElementById('edit-village').value = child.village;
        document.getElementById('edit-date-enrolled').value = child.date_enrolled;

        document.getElementById('edit-btn').addEventListener('click', () => {
            document.getElementById('edit-details').classList.toggle('hidden');
        });

        document.getElementById('save-edit-btn').addEventListener('click', () => {
            const name = document.getElementById('edit-name').value;
            const county = document.getElementById('edit-county').value;
            const village = document.getElementById('edit-village').value;
            const dateEnrolled = document.getElementById('edit-date-enrolled').value;

            fetch('/dashboard/children.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'edit',
                    id: child.id,
                    name: name,
                    county: county,
                    village: village,
                    date_enrolled: dateEnrolled
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                loadChildren(); // Reload the list of children
                listPage.classList.remove('hidden');
                detailsPage.classList.add('hidden');
            });
        });
    }

    function deleteChild(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            fetch('dashboard/children.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'delete',
                    id: id
                })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                loadChildren(); // Reload the list of children
            });
        }
    }

    function loadChildren() {
        fetch('dashboard/children.php?search=')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('list');
                list.innerHTML = ''; // Clear the current list
                data.forEach(child => {
                    addChildToList(child);
                });
            });
    }

    loadChildren(); // Initial load of children

    document.getElementById('back-to-dashboard').onclick = function() {
        window.location.href = 'dashboard.php';
    };
    document.getElementById('logout-list').onclick = function() {
        window.location.href = '../index.php';
    };
    document.getElementById('back-to-list').onclick = function() {
        listPage.classList.remove('hidden');
        detailsPage.classList.add('hidden');
    };
    document.getElementById('logout-details').onclick = function() {
        window.location.href = '../index.php';
    };
});