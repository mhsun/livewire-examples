<div class="flex justify-center items-center h-screen">
    <div x-data="setup()">
        <ul class="flex justify-center items-center my-4">
            <template x-for="(tab, index) in tabs" :key="index">
                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                    :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                    x-text="tab"></li>
            </template>
        </ul>

        <div class="w-full bg-indigo-100 p-16 mx-auto border">
            <div x-show="activeTab===0">
                <div class="max-w-full mx-auto">
                    <div>
                        <h1 class="text-center font-bold fo">Form With Basic Validation</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-5 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                            @if (session('success')) <p class="text-center text-green-500">{{ session('success') }}</p> @endif

                            <form wire:submit.prevent="sendMessage" method="post">
                                <div class="mb-2">
                                    <input wire:model="name" type="text" placeholder="Type your name here" class="rounded w-full p-2"/>
                                    @error('name') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="mb-2">
                                    <input wire:model="email" type="email" placeholder="Type your email here" class="rounded w-full p-2"/>
                                    @error('email') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="mb-2">
                                    <input wire:model="phone" type="text" placeholder="Type your phone here" class="rounded w-full p-2"/>
                                    @error('phone') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="mb-2">
                                    <textarea wire:model="message" placeholder="Write your message here" class="rounded w-full p-2"></textarea>
                                    @error('message') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <button class="rounded-md float-right bg-indigo-400 text-white font-bold p-2">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab===1">Content 2</div>
            <div x-show="activeTab===2">Content 3</div>
            <div x-show="activeTab===3">Content 4</div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script>
        function setup() {
            return {
                activeTab: 0,
                tabs: [
                    "Contact Form One",
                    "Contact Form Two",
                    "Contact Form Three",
                    "Contact Form Four",
                ]
            };
        }
    </script>
@endpush
