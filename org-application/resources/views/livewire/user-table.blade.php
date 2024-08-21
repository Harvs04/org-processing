<div wire:poll.keep-alive.30s class="flex flex-col h-full w-full lg:10/12 xl:w-full px-5 border-4 border-red-500">
    <div class="flex flex-row justify-between">
        <h1 class="text-2xl text-white sm:text-3xl md:text-4xl lg:text-4xl font-bold">APPLICANTS</h1>
        <div class="flex flex-col gap-6">
            <div class="flex items-start self-end">
                <a href="{{ route('create-user') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-4">
                    Create
                </a>
            </div>
        </div>
    </div>
    <div class="w-full pt-6 flex justify-end">
        <div class="w-full sm:flex sm:justify-end">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative self-center">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" wire:model.live="search" id="default-search" class="w-full sm:w-72 pl-10 pr-2 py-1.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 " placeholder="Name, Email, ID" required />
            </div>
        </div>  
    </div>
    @if (session('success'))
        <div id="success-message" class="flex justify-between items-center border border-green-500 bg-green-100 text-green-600 px-4 py-2 rounded relative mt-8">
            <span class="text-sm">{{ session('success') }}</span>
            <button onclick="document.getElementById('success-message').style.display='none'" class="text-green-600 ml-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if (session('delete'))
        <div id="delete-message" class="flex justify-between items-center border border-green-500 bg-green-100 text-green-600 px-4 py-2 rounded relative mt-8">
            <span class="text-sm">{{ session('delete') }}</span>
            <button onclick="document.getElementById('delete-message').style.display='none'" class="text-green-600 ml-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div id="error-message" class="flex justify-between items-center border border-red-500 bg-red-100 text-red-600 px-4 py-2 rounded relative mt-8">
            <span class="text-sm">{{ session('error') }}</span>
            <button onclick="document.getElementById('error-message').style.display='none'" class="text-red-600 ml-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    <div class="mt-5 shadow-md sm:rounded-lg relative overflow-auto bg-white">
        <table class="min-w-full text-sm text-left rtl:text-right text-gray-700 relative overflow-x-auto shadow-md sm:rounded-lg">
            <thead class="text-xs font-medium md:text-sm md:font-semibold">
                <tr class="text-left">
                    <th class="pb-4 py-4 pr-2">
                        <div class="flex items-center">
                            Name
                            <button wire:click="sortBy('first_name')">
                            @if ($sortField === "first_name" && $sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                @elseif ($sortField === "first_name" && !$sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>          
                                @endif
                            </button>
                        </div>
                    </th>
                    <th class="pb-4 py-4 pr-5">
                        <div class="flex items-center">
                            Nickname
                            <button wire:click="sortBy('nickname')">
                                @if ($sortField === "nickname" && $sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                @elseif ($sortField === "nickname" && !$sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>          
                                @endif
                            </button>
                        </div>
                    </th>
                    <th class="pb-4 py-4 pr-5">
                        <div class="flex items-center">
                            FB Account
                        </div>
                    </th>
                    <th class="pb-4 py-4 pr-5">
                        <div class="flex items-center">
                            Email Address
                            <button wire:click="sortBy('email')">
                                @if ($sortField === "email" && $sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                @elseif ($sortField === "email" && !$sortAsc)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 ms-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>          
                                @endif
                            </button>
                        </div>
                    </th>
                    <th class="pb-4 py-4 pr-8">
                        Mobile Number
                    </th>
                    <th class="pb-4 py-4 pr-12">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs md:text-sm">
                @forelse ($users as $user)
                    <tr class="text-xs align-top bg-white border hover:bg-zinc-100 md:text-sm lg:text-sm">
                        <td class="pr-12 py-1 md:py-1 lg:py-1 xl:py-3 2xl:py-4">{{ $user->first_name. " " . $user->last_name}}</td>
                        <td class="pr-12 py-1 md:py-1 lg:py-1 xl:py-3 2xl:py-4">{{ $user->nickname }}</td>
                        <td class="pr-12 py-1 md:py-1 lg:py-1 xl:py-3 2xl:py-4">
                            <a href="{{ $user->fb_profile }}" target="_blank" rel="noopener noreferrer" style="display: inline-block;">
                                <img src="{{ asset('Facebook-f_Logo-Blue-Logo.wine.svg') }}" alt="Facebook Logo" style="width: 40px;"/>
                            </a>
                        </td>
                        <td class="pr-12 py-1 md:py-1 lg:py-1 xl:py-3 2xl:py-4">{{ $user->email }}</td>
                        <td class="pr-12 py-1 md:py-1 lg:py-1 xl:py-3 2xl:py-4">{{ $user->mobile_number }}</td>
                        <td class="pr-10 lg:py-4">
                            <div class="flex flex-row gap-6">
                                <!-- modal component -->
                                <button type="button" class="text-red-400 underline">Delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
