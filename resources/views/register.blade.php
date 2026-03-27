<x-layout>
    <div class="flex min-h-screen bg-[#0f0f0f] justify-center items-center">

        <form action="/register-user" method="POST"
            class="xl:w-[35%] lg:w-[50%] md:w-[65%] sm:w-[90%] w-[95%] 
                     bg-[#181818] text-white rounded-xl shadow-2xl p-8 space-y-6">
            @csrf
            <!-- Logo / Heading -->
            <div class="text-center">
                <h1 class="text-2xl font-bold">
                    <span class="text-red-600">You</span>Tube
                </h1>
                <p class="text-gray-400 text-sm mt-1">Create your account</p>
            </div>

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-300">Full Name</label>
                <input type="text" placeholder="Enter your name" name="name"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-300">Email</label>
                <input type="email" placeholder="Enter your email" name="email"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-300">Password</label>
                <input type="password" placeholder="Enter your password" name="password"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="text-sm text-gray-300">Confirm Password</label>
                <input type="password" placeholder="Confirm password" name="c_password"
                    class="w-full mt-1 p-3 rounded-md bg-[#121212] border border-gray-700 
                           focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 transition duration-300 
                       py-3 rounded-md font-semibold">
                Create Account
            </button>

            <!-- Divider -->
            <div class="flex items-center gap-3">
                <div class="flex-1 h-[1px] bg-gray-700"></div>
                <span class="text-gray-400 text-sm">OR</span>
                <div class="flex-1 h-[1px] bg-gray-700"></div>
            </div>

            <!-- Google Button -->
            <button type="button"
                class="w-full flex items-center justify-center gap-2 bg-[#202020] 
                       hover:bg-[#2a2a2a] py-3 rounded-md border border-gray-700">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="google">
                Sign up with Google
            </button>

            <!-- Login Link -->
            <p class="text-center text-gray-400 text-sm">
                Already have an account?
                <a href="/login" class="text-red-500 hover:underline">Sign in</a>
            </p>

        </form>

    </div>
</x-layout>
