<x-layout>
    <div class="comments-skeleton mx-auto p-4">

        <!-- 🔹 Comments Count Skeleton -->
        <div class="animate-pulse mb-6">
            <div class="h-6 w-32 bg-gray-300 rounded"></div>
        </div>

        <!-- 🔹 Single Comment Skeleton -->
        <div class="flex gap-3 mb-6 animate-pulse">
            <!-- Profile Image -->
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>

            <!-- Comment Content -->
            <div class="flex-1">
                <!-- Name + Time -->
                <div class="flex gap-2 mb-2">
                    <div class="h-4 w-24 bg-gray-300 rounded"></div>
                    <div class="h-4 w-16 bg-gray-200 rounded"></div>
                </div>

                <!-- Comment Lines -->
                <div class="space-y-2">
                    <div class="h-4 w-full bg-gray-300 rounded"></div>
                    <div class="h-4 w-5/6 bg-gray-300 rounded"></div>
                </div>

                <!-- Like / Reply Buttons -->
                <div class="flex gap-4 mt-3">
                    <div class="h-4 w-10 bg-gray-200 rounded"></div>
                    <div class="h-4 w-12 bg-gray-200 rounded"></div>
                </div>
            </div>
        </div>

        <!-- 🔹 Repeat Skeleton Comments -->
        <div class="flex gap-3 mb-6 animate-pulse">
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
            <div class="flex-1">
                <div class="flex gap-2 mb-2">
                    <div class="h-4 w-20 bg-gray-300 rounded"></div>
                    <div class="h-4 w-14 bg-gray-200 rounded"></div>
                </div>
                <div class="space-y-2">
                    <div class="h-4 w-full bg-gray-300 rounded"></div>
                    <div class="h-4 w-4/6 bg-gray-300 rounded"></div>
                </div>
                <div class="flex gap-4 mt-3">
                    <div class="h-4 w-10 bg-gray-200 rounded"></div>
                    <div class="h-4 w-12 bg-gray-200 rounded"></div>
                </div>
            </div>
        </div>

        <div class="flex gap-3 mb-6 animate-pulse">
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
            <div class="flex-1">
                <div class="flex gap-2 mb-2">
                    <div class="h-4 w-28 bg-gray-300 rounded"></div>
                    <div class="h-4 w-16 bg-gray-200 rounded"></div>
                </div>
                <div class="space-y-2">
                    <div class="h-4 w-full bg-gray-300 rounded"></div>
                    <div class="h-4 w-3/6 bg-gray-300 rounded"></div>
                </div>
                <div class="flex gap-4 mt-3">
                    <div class="h-4 w-10 bg-gray-200 rounded"></div>
                    <div class="h-4 w-12 bg-gray-200 rounded"></div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
