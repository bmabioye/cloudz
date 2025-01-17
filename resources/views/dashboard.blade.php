@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Sidebar -->
    <div class="flex">
        <!-- Navigation Sidebar -->
        <div class="w-1/4 bg-gray-100 p-4 rounded-lg shadow-lg">
            <nav class="space-y-4">
                <button id="purchased-tab" class="w-full text-left font-semibold text-gray-800 hover:bg-gray-200 p-2 rounded">
                    Purchased Resources
                </button>
                <button id="subscriptions-tab" class="w-full text-left font-semibold text-gray-800 hover:bg-gray-200 p-2 rounded">
                    Active Subscriptions
                </button>
                <button id="account-tab" class="w-full text-left font-semibold text-gray-800 hover:bg-gray-200 p-2 rounded">
                    Account Settings
                </button>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="w-3/4 ml-6">
            <!-- Purchased Resources Section -->
            <div id="purchased-section" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Purchased Resources</h2>
                <div id="purchased-resources" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Dynamic Resource Cards Will Be Rendered Here -->
                </div>
            </div>

            <!-- Active Subscriptions Section -->
            <div id="subscriptions-section" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Active Subscriptions</h2>
                <div id="active-subscription" class="p-4 bg-white shadow rounded-lg">
                    <!-- Dynamic Subscription Details Will Be Rendered Here -->
                </div>
            </div>

            <!-- Account Settings Section -->
            <div id="account-section" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Account Settings</h2>
                <form id="update-profile" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tabs = {
        purchased: document.getElementById("purchased-tab"),
        subscriptions: document.getElementById("subscriptions-tab"),
        account: document.getElementById("account-tab"),
    };

    const sections = {
        purchased: document.getElementById("purchased-section"),
        subscriptions: document.getElementById("subscriptions-section"),
        account: document.getElementById("account-section"),
    };

    function showSection(section) {
        for (let key in sections) {
            sections[key].classList.add("hidden");
        }
        sections[section].classList.remove("hidden");
    }

    tabs.purchased.addEventListener("click", () => showSection("purchased"));
    tabs.subscriptions.addEventListener("click", () => showSection("subscriptions"));
    tabs.account.addEventListener("click", () => showSection("account"));

    // Show Purchased Resources by default
    showSection("purchased");
});


document.addEventListener("DOMContentLoaded", function () {
    const purchasedResourcesContainer = document.getElementById("purchased-resources");
    const subscriptionDetailsContainer = document.getElementById("subscriptions-section");

    async function getSanctumCsrfCookie() {
        try {
            await fetch("/sanctum/csrf-cookie", { credentials: "include" });
            console.log("CSRF cookie set successfully.");
        } catch (error) {
            console.error("Failed to fetch CSRF cookie.", error);
            throw new Error("CSRF cookie setup failed.");
        }
    }

    async function fetchPurchasedResources() {
        try {
            const token = localStorage.getItem("access_token");
            if (!token) throw new Error("User is not authenticated.");

            const response = await fetch("/purchased-resources", {
                headers: {
                    Accept: "application/json",
                    Authorization: `Bearer ${token}`,
                },
            });

            if (!response.ok) throw new Error("Failed to fetch purchased resources.");

            const resources = await response.json();

            // Clear previous content
            purchasedResourcesContainer.innerHTML = "";

            if (resources.length === 0) {
                purchasedResourcesContainer.innerHTML =
                    "<p class='text-gray-500'>You have not purchased any resources yet.</p>";
                return;
            }

            // Render each resource
            resources.forEach((resource) => {
                const resourceCard = `
                    <div class="p-4 bg-white shadow rounded-lg">
                        <img src="${resource.thumbnail || '/images/placeholder.png'}" alt="${resource.title}" class="w-full h-40 object-cover rounded mb-4">
                        <h3 class="text-lg font-bold mb-2">${resource.title}</h3>
                        <p class="text-sm text-gray-600 mb-4">${resource.description.substring(0, 100)}...</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-gray-700">${resource.price_paid > 0 ? `$${resource.price_paid}` : 'Free'}</span>
                            <a href="${resource.download_link}" target="_blank" class="bg-blue-500 text-white py-1 px-4 rounded">Download</a>
                        </div>
                    </div>
                `;
                purchasedResourcesContainer.innerHTML += resourceCard;
            });
        } catch (error) {
            console.error("Error fetching resources:", error);
            purchasedResourcesContainer.innerHTML =
                "<p class='text-red-500'>Failed to load resources. Please try again later.</p>";
        }
    }

    async function fetchActiveSubscription() {
        try {
            const token = localStorage.getItem("access_token");
            if (!token) throw new Error("User is not authenticated.");

            const response = await fetch("/active-subscription", {
                headers: {
                    Accept: "application/json",
                    Authorization: `Bearer ${token}`,
                },
            });

            if (!response.ok) throw new Error("Failed to fetch active subscription.");

            const subscription = await response.json();

            // Render subscription details
            subscriptionDetailsContainer.innerHTML = `
                <p><strong>Plan Name:</strong> ${subscription.plan_name}</p>
                <p><strong>Start Date:</strong> ${subscription.start_date}</p>
                <p><strong>End Date:</strong> ${subscription.end_date}</p>
                <p><strong>Remaining Days:</strong> ${subscription.remaining_days} days</p>
            `;
        } catch (error) {
            console.error("Error fetching subscription details:", error);
            subscriptionDetailsContainer.innerHTML =
                "<p class='text-red-500'>Failed to load subscription details. Please try again later.</p>";
        }
    }

    async function initialize() {
        try {
            await getSanctumCsrfCookie();
            await fetchPurchasedResources();
            await fetchActiveSubscription();
        } catch (error) {
            console.error("Initialization failed:", error);
        }
    }

    initialize();
});

    </script>
@endsection
