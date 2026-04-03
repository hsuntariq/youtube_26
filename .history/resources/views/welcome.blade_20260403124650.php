@php
    $categories = [
        'Music',
        'Gaming',
        'Live',
        'News',
        'Sports',
        'Education',
        'Podcasts',
        'Fashion',
        'Technology',
        'Cooking',
        'Travel',
        'Comedy',
        'Entertainment',
        'Movies',
        'Tutorials',
        'Fitness',
        'Motivation',
        'Business',
        'Finance',
        'Science',
    ];
@endphp





<x-layout style="background:black;color:white;overflow-x:hidden">
    <x-navbar />

    <div class="flex">
        <x-sidebar />
        <div class="main-content  w-[80%] mx-auto">

            {{-- top bar --}}
            <div class="relative w-full">
                <i
                    class="bi bi-chevron-left top-left-icon hover:bg-zinc-800 z-100 top-1/2 -translate-y-1/2 absolute rounded-full -translate-x-1/2 w-10 h-10  text-white flex justify-center items-center"></i>
                <i
                    class="bi bi-chevron-right top-right-icon hover:bg-zinc-800 cursor-pointer z-100 top-1/2 -translate-y-1/2 absolute rounded-full -translate-x-1/2 w-10 h-10 right-2  text-white flex justify-center items-center"></i>
                <div class="flex top-bar w-full overflow-x-auto scroll-hidden p-4 gap-2">
                    @foreach ($categories as $item)
                        <div class="px-4 bg-zinc-900 rounded-md py-2">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- video section --}}


            <div class="grid w-full rounded-md  gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                {{-- my videos --}}
                @foreach ($allVideos as $item)
                    <div
                        class="single-video hover:bg-gray-900 p-3 rounded-xl transition-all duration-200 cursor-pointer py-3">
                        <img class="rounded-xl" height="300px" class="w-full h-full object-cover"
                            src="{{ asset('/storage/' . $item['thumbnail']) }}" width="100%" alt="video thumbnail">
                        <div class="flex justify-between my-3">
                            <div class="flex gap-2">
                                <div class="w-10 shrink-0 bg-green-500 h-10 rounded-full"></div>
                                <div class="">
                                    <h2 class="font-semibold text-sm text-white">
                                        {{ $item['title'] }}
                                    </h2>
                                    <p class="text-gray-500 text-captialize text-sm">
                                        {{ $item->user->name }}
                                    </p>
                                    <div class="flex  text-gray-500 text-sm">
                                        <span>3.3K view</span>
                                        <span><i class="bi bi-dot"></i></span>
                                        <span class="upload-time">
                                            {{ $item['created_at'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>


    </div>


    <script>
        $('.top-right-icon').on('click', function () {
            document.querySelector('.top-bar').scrollBy({
                left: 100,
                behavior: 'smooth'
            })
        })
        $('.top-left-icon').on('click', function () {
            document.querySelector('.top-bar').scrollBy({
                left: -100,
                behavior: 'smooth'
            })
        })

        document.querySelectorAll('.upload-time').forEach((item, index) => {
            item.innerText = moment(item.innerText).fromNow()
        })
    </script>

</x-layout>
