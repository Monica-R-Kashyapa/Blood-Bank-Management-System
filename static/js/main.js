// Advanced JavaScript for Blood Bank Management with Tailwind CSS

// Toast Notification System
class ToastManager {
    constructor() {
        this.container = document.getElementById('toastContainer');
    }

    show(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `max-w-sm w-full bg-${this.getColor(type)} text-white p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        toast.innerHTML = `
            <div class="flex items-center justify-between">
                <span>${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">&times;</button>
            </div>
        `;
        this.container.appendChild(toast);
        setTimeout(() => toast.classList.remove('translate-x-full'), 10);
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }, 5000);
    }

    getColor(type) {
        const colors = { success: 'green-500', error: 'red-500', warning: 'yellow-500', info: 'blue-500' };
        return colors[type] || colors.info;
    }
}

const toast = new ToastManager();

// Form Enhancement with AJAX
document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit forms with AJAX if they have data-form attribute
    document.querySelectorAll('form[data-form]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                toast.show('Action completed successfully!', 'success');
                setTimeout(() => location.reload(), 1000);
            })
            .catch(error => {
                toast.show('An error occurred.', 'error');
            });
        });
    });

    // Enhanced table interactions
    document.querySelectorAll('#bloodBankTableData tbody tr').forEach(row => {
        row.addEventListener('click', function() {
            const cells = this.cells;
            document.getElementById('bloodb_id_update').value = cells[0].textContent;
            document.getElementById('column').value = 'bloodb_name';
            document.getElementById('new_value').value = cells[1].textContent;
        });
    });
});

// Utility Functions
function toggleNavbar() {
    document.getElementById('navbarMenu').classList.toggle('hidden');
    document.getElementById('navbarMenu').classList.toggle('flex');
}

// Advanced Search with Debounce
function createSearch(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = $(`#${tableId}`).DataTable();
    let debounceTimer;
    input.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            table.search(this.value).draw();
        }, 300);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('searchInput')) {
        createSearch('searchInput', 'bloodBankTableData');
    }
});
