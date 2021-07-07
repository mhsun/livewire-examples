<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div
            class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div>
                    <h1 class="text-center font-bold fo">Basic Counter</h1>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <button wire:click="decrement" class="bg-indigo-400 text-white px-4 rounded-md text-xl mr-2">-
                        </button>
                        <span class="text-xl">{{ $count }}</span>
                        <button wire:click="increment" class="bg-indigo-400 text-white px-4 rounded-md text-xl ml-2">+
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-center text-xs">{{ $message }}</span>
        </div>
    </div>
</div>
