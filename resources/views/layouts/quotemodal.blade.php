<!-- Modal -->
<div id="quoteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-10 inset-0 overflow-y-auto hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Request a Customized Quote</h3>
            <button id="closeQModal" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">&times;</button>
        </div>

        <!-- Modal Form -->
        <form id="quoteForm" method="POST" action="{{ route('customized.quote') }}">
            @csrf
            <!-- Company Name -->
            <div class="mb-4">
                <label for="companyName" class="block text-gray-700 dark:text-gray-300 font-medium">Company Name</label>
                <input type="text" id="companyName" name="company_name" class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" placeholder="Enter your company name" required>
            </div>

            <!-- Industry -->
            <div class="mb-4">
                <label for="industry" class="block text-gray-700 dark:text-gray-300 font-medium">Industry</label>
                <input type="text" id="industry" name="industry" class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" placeholder="Enter your industry" required>
            </div>

            <!-- Specific Needs -->
            <div class="mb-4">
                <label for="specificNeeds" class="block text-gray-700 dark:text-gray-300 font-medium">Specific Needs</label>
                <select id="specificNeeds" name="specific_needs" class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    <option value="Cloud Solutions">Cloud Solutions</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Digital Transformation">Digital Transformation</option>
                    <option value="Governance & Compliance">Governance & Compliance</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Preferred Consultation Date -->
            <div class="mb-4">
                <label for="consultationDate" class="block text-gray-700 dark:text-gray-300 font-medium">Preferred Consultation Date</label>
                <input type="date" id="consultationDate" name="consultation_date" class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
            </div>

            <!-- Contact Information -->
            <div class="mb-4">
                <label for="contactInfo" class="block text-gray-700 dark:text-gray-300 font-medium">Contact Information</label>
                <input type="email" id="contactInfo" name="contact_info" class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" placeholder="Enter your email" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Submit Quote Request
            </button>
        </form>
    </div>
</div>
<script>
    
document.addEventListener('DOMContentLoaded', () => {
    const openModalButton = document.getElementById('openQModal'); // Match the correct id
    const closeModalButton = document.getElementById('closeQModal');
    const modal = document.getElementById('quoteModal');

    if (!openModalButton || !closeModalButton || !modal) {
        console.error('One or more modal elements are missing in the DOM.');
        return;
    }

    // openModalButton.addEventListener('click', (e) => {
    //     e.preventDefault(); // Prevent default link behavior
    //     modal.classList.remove('hidden');
    // });

    window.openModal = () => {
            modal.classList.remove('hidden');
        };
    
    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
});

</script>