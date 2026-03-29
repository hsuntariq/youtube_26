<x-flash />
<x-layout>
    <div class="flex min-h-screen bg-[#0f0f0f] justify-center items-center">

        <form action="/login-user" method="POST"
            class="xl:w-[35%] lg:w-[50%] md:w-[65%] sm:w-[90%] w-[95%] 
                   bg-[#181818] text-white rounded-xl shadow-2xl p-8 space-y-6">

            @csrf

            <!-- Heading -->
            <div class="text-center">
                <h1 class="text-2xl font-bold">
                    <span class="text-red-600">You</span>Tube
                </h1>
                <p class="text-gray-400 text-sm mt-1">Sign in to your account</p>
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-300">Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-300">Password</label>
                <input type="password" name="password" placeholder="Enter your password"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember + Forgot -->
            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center gap-2 text-gray-400">
                    <input type="checkbox" name="remember" class="accent-red-600">
                    Remember me
                </label>

                <a href="#" class="text-red-500 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 transition duration-300 
                       py-3 rounded-md font-semibold">
                Sign In
            </button>

            <!-- Divider -->
            <div class="flex items-center gap-3">
                <div class="flex-1 h-[1px] bg-gray-700"></div>
                <span class="text-gray-400 text-sm">OR</span>
                <div class="flex-1 h-[1px] bg-gray-700"></div>
            </div>

            <!-- Google Login -->
            <button type="button"
                class="w-full flex items-center justify-center gap-2 bg-[#202020] 
                       hover:bg-[#2a2a2a] py-3 rounded-md border border-gray-700">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="google">
                Sign in with Google
            </button>

            <!-- Register Link -->
            <p class="text-center text-gray-400 text-sm">
                Don’t have an account?
                <a href="/register" class="text-red-500 hover:underline">Sign up</a>
            </p>

        </form>

    </div>
</x-layout>
