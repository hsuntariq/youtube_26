@if (session()->has('message'))
    <!-- Flash Message -->
    <div class="fixed top-5 z-600 right-5 z-50 animate-bounce-in">

        <div
            class="flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-5 py-3 rounded-xl shadow-2xl border border-green-300">

            <!-- Icon -->
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> --}}

            <!-- Message -->
            <span class="font-semibold text-sm tracking-wide">
                {{ session('message') }}
            </span>

            <!-- Close Button -->
            <button onclick="this.parentElement.parentElement.remove()" class="ml-3 text-white hover:text-gray-200">
                ✕
            </button>

        </div>
    </div>

    <!-- Animation -->
    <style>
        @keyframes bounce-in {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            60% {
                transform: translateY(10px);
                opacity: 1;
            }

            100% {
                transform: translateY(0);
            }
        }

        .animate-bounce-in {
            animation: bounce-in 0.6s ease-out;
        }
    </style>
@endif
