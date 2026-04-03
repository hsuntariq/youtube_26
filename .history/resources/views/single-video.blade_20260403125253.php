<x-layout>
    <script>
    tailwind.config = {
        darkMode: 'class',
        content: [],
        theme: {
            extend: {}
        }
    }
    </script>
    <style>
    body {
        font-family: 'Roboto', system-ui, sans-serif;
    }

    .youtube-red {
        color: #ff0000;
    }

    .video-container {
        aspect-ratio: 16 / 9;
    }
    </style>

    <body class="bg-zinc-950 text-zinc-100 overflow-hidden h-screen flex flex-col">

        <!-- Top Navigation Bar -->
        <nav class="bg-zinc-900 border-b border-zinc-800 px-4 py-2 flex items-center justify-between fixed w-full z-50">
            <div class="flex items-center gap-4">
                <button class="p-2 hover:bg-zinc-800 rounded-full">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div class="flex items-center gap-1">
                    <i class="fa-brands fa-youtube youtube-red text-3xl"></i>
                    <span class="font-bold text-xl tracking-tighter">YouTube</span>
                </div>
            </div>

            <div class="flex-1 max-w-2xl mx-8">
                <div class="relative">
                    <input type="text"
                        class="w-full bg-zinc-900 border border-zinc-700 rounded-full py-2 pl-5 pr-12 focus:outline-none focus:border-blue-500"
                        placeholder="Search" />
                    <button
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 p-2 rounded-full">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button class="p-2 hover:bg-zinc-800 rounded-full"><i class="fa-solid fa-video"></i></button>
                <button class="p-2 hover:bg-zinc-800 rounded-full"><i class="fa-solid fa-bell"></i></button>
                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-sm font-medium">H
                </div>
            </div>
        </nav>

        <div class="flex pt-16 h-screen overflow-hidden">

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto pb-10" style="scrollbar-width: thin;">

                <!-- Video Player -->
                <div class="px-6 pt-4">
                    <div class="video-container bg-black rounded-xl overflow-hidden shadow-2xl">
                        <img src="https://picsum.photos/id/1015/1280/720" alt="Video Thumbnail"
                            class="w-full h-full object-cover">

                        <!-- Overlay Text -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black/40">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-white tracking-wide">Ladies and gentlemen,</div>
                                <div class="text-6xl font-bold text-yellow-400 mt-2">welcome!</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Title & Info -->
                <div class="px-6 mt-4">
                    <h1 class="text-2xl font-semibold leading-tight">
                        Is Jesus God or a Prophet? - The Great AI Debate!
                    </h1>

                    <div class="flex flex-wrap items-center gap-3 mt-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold">
                                TE</div>
                            <div>
                                <div class="font-medium">Towards Eternity</div>
                                <div class="text-sm text-zinc-400">3.5M subscribers</div>
                            </div>
                            <button
                                class="ml-4 bg-white text-black px-5 py-2 rounded-full font-medium hover:bg-zinc-200 transition">
                                Subscribe
                            </button>
                        </div>

                        <div class="ml-auto flex items-center gap-2">
                            <button
                                class="flex items-center gap-2 bg-zinc-800 hover:bg-zinc-700 px-5 py-2 rounded-full">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <span>59K</span>
                            </button>
                            <button
                                class="flex items-center gap-2 bg-zinc-800 hover:bg-zinc-700 px-5 py-2 rounded-full">
                                <i class="fa-solid fa-thumbs-down"></i>
                            </button>
                            <button
                                class="flex items-center gap-2 bg-zinc-800 hover:bg-zinc-700 px-5 py-2 rounded-full">
                                <i class="fa-solid fa-share"></i>
                                <span>Share</span>
                            </button>
                            <button
                                class="flex items-center gap-2 bg-zinc-800 hover:bg-zinc-700 px-5 py-2 rounded-full">
                                <i class="fa-solid fa-download"></i>
                                <span>Download</span>
                            </button>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6 bg-zinc-900 rounded-xl p-4 text-sm">
                        <p class="text-zinc-300">
                            AI Debate: Muslim vs Christian. Is Jesus God or Prophet? Bible vs Quran arguments.
                        </p>
                        <p class="text-blue-400 mt-2 cursor-pointer">...more</p>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="px-6 mt-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-xl font-semibold">10,079 Comments</span>
                        <button class="ml-auto flex items-center gap-2 px-4 py-1 hover:bg-zinc-800 rounded-lg">
                            <i class="fa-solid fa-arrow-down-wide-short"></i>
                            <span>Sort by</span>
                        </button>
                    </div>

                    <!-- Comment Input -->
                    <div class="flex gap-4 mb-8">
                        <div class="w-8 h-8 bg-zinc-700 rounded-full"></div>
                        <input type="text"
                            class="flex-1 bg-transparent border-b border-zinc-700 focus:border-blue-500 outline-none py-1"
                            placeholder="Add a comment..." />
                    </div>

                    <!-- Sample Comments -->
                    <div class="space-y-6">
                        <!-- Comment 1 -->
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">@OnlyTruth94</span>
                                    <span class="text-zinc-500 text-sm">4 months ago</span>
                                </div>
                                <p class="mt-1 text-zinc-200">I left hindu and I accept islam Alhamdulillah</p>
                                <div class="flex items-center gap-6 mt-3 text-sm">
                                    <button class="flex items-center gap-1 hover:text-blue-400"><i
                                            class="fa-solid fa-thumbs-up"></i> 4.8K</button>
                                    <button class="flex items-center gap-1 hover:text-blue-400"><i
                                            class="fa-solid fa-thumbs-down"></i></button>
                                    <span class="cursor-pointer hover:underline">Reply</span>
                                </div>
                            </div>
                        </div>

                        <!-- Add more comments as needed -->
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-red-600 rounded-full flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">@DrAhmed</span>
                                    <span class="text-zinc-500 text-sm">3 months ago</span>
                                </div>
                                <p class="mt-1 text-zinc-200">Even the AI machine knows Islam is more logical</p>
                                <div class="flex items-center gap-6 mt-3 text-sm">
                                    <button class="flex items-center gap-1 hover:text-blue-400"><i
                                            class="fa-solid fa-thumbs-up"></i> 3.3K</button>
                                    <span class="cursor-pointer hover:underline">Reply</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommended Videos Sidebar -->
            <div class="w-96 bg-zinc-950 border-l border-zinc-800 overflow-y-auto" style="scrollbar-width: thin;">
                <div class="p-4 space-y-4">
                    <!-- Repeat this block for more videos -->
                    <div class="flex gap-3 cursor-pointer hover:bg-zinc-900 p-2 rounded-xl group">
                        <div class="relative w-40 flex-shrink-0">
                            <img src="https://picsum.photos/id/237/320/180" class="rounded-lg w-full" alt="">
                            <div class="absolute bottom-1 right-1 bg-black/80 text-xs px-1 rounded">14:18</div>
                        </div>
                        <div class="flex-1">
                            <p class="line-clamp-2 text-sm font-medium group-hover:text-blue-400">The AI That Challenged
                                a
                                Muslim About God - Chinese Buddhist</p>
                            <p class="text-zinc-400 text-xs mt-2">Towards Eternity</p>
                            <p class="text-zinc-400 text-xs">2.4M views • 3 months ago</p>
                        </div>
                    </div>

                    <div class="flex gap-3 cursor-pointer hover:bg-zinc-900 p-2 rounded-xl group">
                        <div class="relative w-40 flex-shrink-0">
                            <img src="https://picsum.photos/id/201/320/180" class="rounded-lg w-full" alt="">
                            <div class="absolute bottom-1 right-1 bg-black/80 text-xs px-1 rounded">31:17</div>
                        </div>
                        <div class="flex-1">
                            <p class="line-clamp-2 text-sm font-medium group-hover:text-blue-400">Does God Exist? AI vs
                                Jared Althoff | Muslim vs Christian Debate</p>
                            <p class="text-zinc-400 text-xs mt-2">Towards Eternity</p>
                            <p class="text-zinc-400 text-xs">1.8M views • 2 months ago</p>
                        </div>
                    </div>

                    <!-- You can duplicate the above block for more recommended videos -->
                </div>
            </div>
        </div>

</x-layout>