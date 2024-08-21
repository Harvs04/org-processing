<nav class="h-16 flex items-center lg:items-stretch justify-end lg:justify-between bg-white shadow relative z-10">
    <div class="hidden lg:flex w-full pr-6 justify-end">
        <div class="h-full w-20 flex items-center justify-center border-r border-l">
            <button aria-label="open notifications"
                class="relative cursor-pointer text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-800">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_header_and_icons-svg5.svg"
                    alt="notifications">
                <div class="w-2 h-2 rounded-full bg-red-400 border border-white absolute inset-0 mt-1 mr-1 m-auto">
                </div>
            </button>
        </div>
        <div class="h-full w-20 flex items-center justify-center border-r mr-4 cursor-pointer text-gray-600">
            <button aria-label="open chats" class="focus:outline-none focus:ring-2 focus:ring-gray-800">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_header_and_icons-svg4.svg"
                    alt="chats">
            </button>
        </div>
        <div class="flex items-center relative cursor-pointer" onclick="dropdownHandler(this)">
            <div class="rounded-full">
                <ul class="p-2 w-full border-r bg-white absolute rounded left-0 shadow mt-12 sm:mt-16 hidden">
                    <li
                        class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center">
                        <div class="flex items-center">
                            <span class="text-sm ml-2">Profile</span>
                        </div>
                    </li>
                    <li
                        class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mt-2">
                        <div class="flex items-center">
                            <span class="text-sm ml-2">Logout</span>
                        </div>
                    </li>
                </ul>
                <div class="relative">
                    <img alt="profile-pic"
                        src="https://tuk-cdn.s3.amazonaws.com/assets/components/boxed_layout/bl_1.png"
                        class="w-10 h-10 rounded-full" />
                </div>
            </div>
        </div>

    </div>
</nav>