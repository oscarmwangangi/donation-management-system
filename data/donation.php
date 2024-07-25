<div id="details-page" class="container hidden">
        <button id="back-to-list" class="back-btn">Back</button>
        <button id="logout-details" class="logout-btn">Logout</button>
        <h2 id="details-title"></h2>
        <div id="details-content"></div>
        <button id="edit-btn">Edit</button>
        <button id="delete-btn">Delete</button>
        <div id="edit-details" class="hidden">
            <input type="text" id="edit-name" placeholder="Name" required>
            <input type="text" id="edit-county" placeholder="County" required>
            <input type="text" id="edit-village" placeholder="Village" required>
            <input type="date" id="edit-date-enrolled" placeholder="Date Enrolled" required>
            <button id="save-edit-btn">Save</button>
        </div>
    </div>

    <div id="donation-page" class="container hidden">
        <button id="back-to-dashboard-donation" class="back-btn">Back</button>
        <button id="logout-donation" class="logout-btn">Logout</button>
        <h2>Donation Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Monthly Deficit</th>
                    <th>Yearly Deficit</th>
                    <th>Total Quantity</th>
                </tr>
            </thead>
            <tbody id="donation-list">
                <!-- Donation items will be dynamically added here -->
            </tbody>
        </table>
        <button id="add-item-btn">Add Item</button>
        <button id="in-btn">In</button>
        <button id="out-btn">Out</button>
        <div id="add-donation" class="hidden">
            <input type="text" id="new-item-name" placeholder="Item Name" required>
            <input type="number" id="new-item-quantity" placeholder="Quantity" required>
            <button id="save-donation-btn">Save</button>
        </div>
    </div>

    <div id="volunteers-page" class="container hidden">
        <button id="back-to-dashboard-volunteers" class="back-btn">Back</button>
        <button id="logout-volunteers" class="logout-btn">Logout</button>
        <h2>Volunteer List</h2>
        <input type="text" id="volunteer-search-bar" placeholder="Search...">
        <button id="add-volunteer-btn">Add Volunteer</button>
        <div id="add-volunteer" class="hidden">
            <input type="text" id="volunteer-name" placeholder="Name" required>
            <input type="text" id="volunteer-role" placeholder="Role" required>
            <input type="text" id="volunteer-contact" placeholder="Contact Information" required>
            <input type="text" id="volunteer-availability" placeholder="Availability" required>
            <input type="text" id="volunteer-skills" placeholder="Skills" required>
            <input type="date" id="volunteer-start-date" placeholder="Start Date" required>
            <input type="date" id="volunteer-last-updated" placeholder="Last Updated" required>
            <button id="save-volunteer-btn">Save</button>
        </div>
        <ul id="volunteer-list"></ul>
    </div>
    <div id="list-page" class="container hidden">
        <button id="back-to-dashboard" class="back-btn">Back</button>
        <button id="logout-list" class="logout-btn">Logout</button>
        <h2 id="list-title"></h2>
        <input type="text" id="search-bar" placeholder="Search...">
        <button id="add-btn">Add Record</button>
        <div id="add-new" class="hidden">
            <input type="text" id="new-name" placeholder="Name" required>
            <input type="text" id="new-county" placeholder="County" required>
            <input type="text" id="new-village" placeholder="Village" required>
            <input type="date" id="new-date-enrolled" placeholder="Date Enrolled" required>
            <button id="save-btn">Save</button>
        </div>
        <ul id="list"></ul>
    </div>