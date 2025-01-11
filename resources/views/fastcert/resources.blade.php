@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Explore Our Resources</h1>

    {{-- Search and Filters --}}
    <div class="flex flex-col md:flex-row gap-4">
        {{-- Search Bar --}}
        <div class="flex-grow">
            <input 
                type="text" 
                id="search-bar" 
                placeholder="Search resources..." 
                class="w-full p-3 rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
            />
        </div>

        {{-- Filter Section --}}
        <div class="flex gap-4">
            {{-- Category Filter --}}
            <select 
                id="category-filter" 
                class="p-3 rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
            >
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            {{-- Premium/Free Toggle --}}
            <select 
                id="access-filter" 
                class="p-3 rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
            >
                <option value="">All</option>
                <option value="free">Free</option>
                <option value="premium">Premium</option>
            </select>

            {{-- Sort By --}}
            <select 
                id="sort-filter" 
                class="p-3 rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200"
            >
                <option value="relevance">Relevance</option>
                <option value="popularity">Popularity</option>
                <option value="date">Recently Added</option>
            </select>
        </div>
    </div>

    {{-- Resource Grid --}}
    <div id="resource-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-8">
        {{-- Dynamic content will be injected here --}}
    </div>

    {{-- Pagination --}}
    <div id="pagination" class="mt-8 flex justify-center gap-4">
        {{-- Pagination links will be injected dynamically --}}
        @foreach ($resources as $resource)
        @if ($resource->is_premium)
            <span class="badge badge-premium">Premium</span>
            <button onclick="redirectToSubscriptionPage()">Subscribe</button>
        @else
            <button onclick="accessResource({{ $resource->id }})">Access</button>
        @endif
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchBar = document.getElementById('search-bar');
        const categoryFilter = document.getElementById('category-filter');
        const accessFilter = document.getElementById('access-filter');
        const sortFilter = document.getElementById('sort-filter');
        const resourceGrid = document.getElementById('resource-grid');
        const pagination = document.getElementById('pagination');

        const fetchResources = (url = '/api/resources') => {
            // Prepare query parameters
   
            const params = {
                search: searchBar.value,
                category_id: categoryFilter.value,
                access: accessFilter.value,
                sort: sortFilter.value,
            };

            axios.get(url, {  
            params }).then(response => {
                const resources = response.data.data;
                const links = response.data.links;

                // Clear the grid
                resourceGrid.innerHTML = '';

                // Inject new resources
                resources.forEach((resource) => {
                resourceGrid.innerHTML += `
                <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                    <img 
                        src="${resource.thumbnail || '/images/placeholder.png'}" 
                        alt="${resource.title}" 
                        class="w-full h-40 object-cover rounded-md mb-4"
                    />
                    <h3 class="text-lg font-bold mb-2">${resource.title}</h3>
                    <p class="text-sm text-gray-600 mb-4">${resource.description.substring(0, 100)}...</p>
                    <p class="text-sm font-semibold text-gray-700 mb-4">
                        ${resource.is_premium ? `$${resource.price}` : 'Free'}
                    </p>
                    <div class="flex space-x-4">
                        ${
                            resource.is_premium
                                ? `
                                <button 
                                    class="bg-yellow-500 text-white text-sm px-2 py-2 rounded hover:bg-yellow-600 transition"
                                    onclick="redirectToSubscriptionPage()"
                                >
                                    Subscribe
                                </button>
                                <button 
                                    class="bg-green-500 text-white text-sm px-4 py-2 rounded hover:bg-green-600 transition"
                                    onclick="buyResource(${resource.id})"
                                >
                                    Buy
                                </button>
                                 <button 
                                    class="bg-blue-500 text-white text-sm px-2 py-2 rounded hover:bg-blue-600 transition"
                                    onclick="addToCart(${resource.id})"
                                >
                                    Add to Cart
                                </button>
                                `
                                : `
                                <button 
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
                                    onclick="accessResource(${resource.id})"
                                >
                                    Access
                                </button>
                                `
                        }
                    </div>
                </div>
            `;
        });
                // Update pagination
                pagination.innerHTML = `
                    ${links.prev ? `<a href="${links.prev}" onclick="fetchResources('${links.prev}'); return false;" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Previous</a>` : ''}
                    ${links.next ? `<a href="${links.next}" onclick="fetchResources('${links.next}'); return false;" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Next</a>` : ''}
                `;
            }).catch(error => {
                console.error('Error fetching resources:', error);
                resourceGrid.innerHTML = '<p class="text-red-500">Failed to load resources. Please try again later.</p>';
            });
        };

        // Attach event listeners
        [searchBar, categoryFilter, accessFilter, sortFilter].forEach(el => {
            el.addEventListener('change', () => fetchResources());
        });

        // Initial fetch
        fetchResources();
    });

    function accessResource(resourceId) {
    window.location.href = `/fastcert/resources/${resourceId}`;
    }

    function redirectToSubscriptionPage() {
        window.location.href = `/fastcert/subscription`;
    }

    function buyResource(resourceId) {
    // Redirect to the purchase page for the specific resource
    window.location.href = `/fastcert/purchase/${resourceId}/buy`;

    }


    function addToCart(resourceId) {
    fetch(`/resources/${resourceId}/cart`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.ok) {
            window.location.href = '/cart';
        } else {
            alert('Failed to add resource to cart.');
        }
    });
    }

</script>
@endsection
