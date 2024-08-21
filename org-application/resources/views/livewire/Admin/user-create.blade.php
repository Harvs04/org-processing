<div class="h-full mr-5 flex flex-col items-center w-10/12">
    <h1 class="mb-3 text-2xl text-black font-bold self-start lg:mb-5 lg:text-4xl">CREATE USER</h1>
    <form wire:submit.prevent="create" class="flex flex-col gap-2 w-full h-full">
        <div class="flex flex-col gap-1 mb-2 w-full">   
            <label for="role" class="text-xs font-bold">Role</label>
            <select wire:model="role" id="role" name="role" class="w-full border-2 border-grey-500 rounded py-0.5 px-2">
                <option value=""></option>
                <option value="admin">Admin</option>
                <option value="developer">Developer</option>
                <option value="applicant">Applicant</option>
            </select>
            @error('role')
                <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col md:flex-row gap-7 w-full">
            <div class="flex flex-col gap-1 w-full">
                <label for="firstName" class="text-xs font-bold">First Name</label>
                <input wire:model="firstName" type="text" id="firstName" name="firstName" placeholder="Juan" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @error('firstName')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label for="lastName" class="text-xs font-bold">Last Name</label>
                <input wire:model="lastName" type="text" id="lastName" name="lastName" placeholder="Dela Cruz" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @error('lastName')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label for="nickName" class="text-xs font-bold">Nickname</label>
                <input wire:model="nickname" type="text" id="nickName" name="nickName" placeholder="Rey" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @error('nickname')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-7 w-full">
            <div class="flex flex-col gap-1 w-full">
                <label for="email" class="text-xs font-bold">Email Address</label>
                <input wire:model="email" type="email" id="email" name="email" placeholder="juan.delacruz@gmail.com" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @if (session('error'))
                    <span class="ml-1 text-xs text-red-500">{{ session('error') }}</span>
                @endif
                @error('email')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label for="fblink" class="text-xs font-bold">Facebook link</label>
                <input wire:model="fblink" type="text" id="fblink" name="fblink" placeholder="https://www.facebook.com/juandelacruz" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @if (session('error'))
                    <span class="ml-1 text-xs text-red-500">{{ session('error') }}</span>
                @endif
                @error('fblink')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-1 w-full">
            <label for="mobileNumber" class="text-xs font-bold">Mobile Number</label>
            <input wire:model="mobileNumber" type="tel" id="mobileNumber" name="mobileNumber" placeholder="09........." pattern="09[0-9]{9}" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
            @error('mobileNumber')
                <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col md:flex-row gap-7 w-full">
            <div class="flex flex-col gap-1 w-full">
                <label for="password" class="text-xs font-bold">Password</label>
                <input wire:model="password" type="password" id="password" name="password" placeholder="........" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @error('password')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1 w-full">
                <label for="confirmPassword" class="text-xs font-bold">Confirm Password</label>
                <input wire:model="confirmPassword" type="password" id="confirmPassword" name="confirmPassword" placeholder="........" class="w-full border-2 border-grey-500 rounded p-0.5 pl-2">
                @if (session('fail'))
                    <span class="ml-1 text-xs text-red-500"> {{ session('fail') }} </span>
                @endif
                @error('confirmPassword')
                    <span class="ml-1 text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @if(session('success'))
            <span class="text-white text-center bg-green-500 rounded px-2 py-1 md:w-1/2 md:self-end">{{ session('success') }}</span>
        @endif
        <div class="mt-10 flex flex-row gap-4 self-end">
            <button type="button" wire:click="clear" class="text-gray-700 text-sm text-center font-bold border border-gray-600 rounded px-5 py-2">
                Clear
            </button>
            <button class="text-white text-sm font-bold border bg-gray-800 rounded px-5 py-2">
                Create
            </button>
        </div>
    </form>
</div>