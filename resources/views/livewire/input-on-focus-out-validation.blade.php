<div class="max-w-full mx-auto">
    <div>
        <h1 class="text-center font-bold fo">Validate Form When Input Get Focused Out</h1>
    </div>
    <div class="divide-y divide-gray-200">
        <div class="py-5 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

            @if (session('success')) <p class="text-center text-green-500">{{ session('success') }}</p> @endif

            <form wire:submit.prevent="sendMessage" method="post">
                <div class="mb-2">
                    <input wire:model.lazy="name" type="text" placeholder="Type your name here" class="rounded w-full p-2"/>
                    @error('name') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="mb-2">
                    <input wire:model.lazy="email" type="email" placeholder="Type your email here" class="rounded w-full p-2"/>
                    @error('email') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="mb-2">
                    <input wire:model.lazy="phone" type="text" placeholder="Type your phone here" class="rounded w-full p-2"/>
                    @error('phone') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="mb-2">
                    <textarea wire:model.lazy="message" placeholder="Write your message here" class="rounded w-full p-2"></textarea>
                    @error('message') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <button class="rounded-md float-right bg-indigo-400 text-white font-bold p-2">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
