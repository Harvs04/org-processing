<div class="absolute lg:relative w-64 h-screen overflow-auto shadow bg-gray-100">
    <div class="flex">
        <div class="h-16 w-full flex items-center px-4">
            <img src="{{ asset('acss.jpg') }}" alt="logo">
        </div>
        <div class="flex items-center justify-center pr-2">
            <button aria-label="close sidebar" id="closeSideBar" class="items-center justify-center h-10 w-10 focus:outline-none focus:ring-2 focus:ring-gray-800 rounded block lg:hidden" onclick="sidebarHandler(false)">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_header_and_icons-svg2.svg" alt="cross">
            </button>
        </div>
    </div>
    <ul class="py-6 bg-gray-100">
        <!-- <li class="pl-6 cursor-pointer text-sm leading-3 tracking-normal pb-2 pt-5 focus:outline-none {{ request()->is('/') ? 'text-indigo-700' : 'text-gray-600 hover:text-indigo-700' }}">
            <div class="flex items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="6" height="6" rx="1" />
                        <rect x="14" y="4" width="6" height="6" rx="1" />
                        <rect x="4" y="14" width="6" height="6" rx="1" />
                        <rect x="14" y="14" width="6" height="6" rx="1" />
                    </svg>
                </div>
                <a href="/" class="ml-2">Dashboard</a>
            </div>
        </li> -->
        <li class="pl-6 cursor-pointer text-sm leading-3 tracking-normal mt-4 mb-4 py-2 focus:outline-none {{ request()->routeIs('admin.user-*') || request()->is('user-management/*') ? 'text-indigo-700' : 'text-gray-600 hover:text-indigo-700' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1" />
                </svg>
                <a href="{{ route('admin.user-show-all') }}" class="ml-2">User Management</a>
            </div>
        </li>
        <li class="pl-6 cursor-pointer text-sm leading-3 tracking-normal mb-4 py-2 focus:outline-none {{ request()->routeIs('admin.product-*') || request()->is('product/*') ? 'text-indigo-700' : 'text-gray-600 hover:text-indigo-700' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <polyline points="8 16 10 10 16 8 14 14 8 16" />
                    <circle cx="12" cy="12" r="9" />
                </svg>
                <a href="" class="ml-2">Product Management</a>
            </div>

        </li>
        <li class="pl-6 cursor-pointer text-sm leading-3 tracking-normal mt-4 mb-4 py-2 focus:outline-none {{ request()->routeIs('admin.discount-*') || request()->is('discounts/*') ? 'text-indigo-700' : 'text-gray-600 hover:text-indigo-700' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <polyline points="7 8 3 12 7 16" />
                    <polyline points="17 8 21 12 17 16" />
                    <line x1="14" y1="4" x2="10" y2="20" />
                </svg>
                <a href="{{ route('admin.discount-show-all') }}" class="ml-2">Discounts</a>
            </div>
        </li>
        <li class="pl-6 cursor-pointer text-sm leading-3 tracking-normal mb-4 py-2 focus:outline-none {{ request()->routeIs('questionnaires.*') ? 'text-indigo-700' : 'text-gray-600 hover:text-indigo-700' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M9 4l2 1a10 7 0 0 1 5 5l1 2" />
                    <path d="M9 16l2 1a10 7 0 0 0 5 5l1 2" />
                    <path d="M15 19l2 -1a10 7 0 0 1 3 -4" />
                    <line x1="9" y1="8" x2="9" y2="8.01" />
                    <line x1="15" y1="8" x2="15" y2="8.01" />
                </svg>
                <a href="{{ route('admin.questionnaire.index') }}" class="ml-2">Questionnaires</a>
            </div>
        </li>
    </ul>
</div>
