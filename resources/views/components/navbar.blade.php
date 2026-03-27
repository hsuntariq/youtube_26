<div class="flex justify-between p-5 items-center">
    <div class="logo flex gap-2 items-center">
        <i class="bi bi-list text-2xl"></i>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/YouTube_Logo_2017.svg/1280px-YouTube_Logo_2017.svg.png"
            width="100px" alt="">
    </div>
    <div class="search flex gap-2 w-[50%]">
        <div class="sm:flex hidden  gap-1 rounded-full bg-[#1C1C1C] text-white px-3 py-2">
            <i class="bi bi-person"></i>
            <span class="font-semibold">Filters</span>
            <i class="bi bi-filter"></i>
        </div>


        <div class="flex gap-2  w-full ps-4 overflow-hidden rounded-full outline outline-gray-400 items-center">
            <div class="flex w-full">
                <input type="text" class="w-full" placeholder='Search'>
                <i class="bi bi-search  bg-[#1C1C1C] px-4 py-2"></i>
            </div>
        </div>
        <i class="bi bi-mic w-10 h-10 flex justify-center items-center rounded-full bg-[#1C1C1C]"></i>

    </div>
    <div class="account flex gap-2 items-center">
        <div class="hidden xl:flex bg-[#1C1C1C] p-2 rounded-md">
            <div class="flex gap-2 text-sm">
                <i class="bi bi-watch"></i>
                5,886
                <i class="bi bi-eye"></i>
                11
                <i class="bi bi-eye"></i>
                170
                |
                <i class="bi bi-droplet"></i>
                <i class="bi bi-list"></i>
                |
                <i class="bi bi-cup"></i>
            </div>
        </div>
        <div class="flex items-center text-sm gap-2">

            <i class="bi bi-bell text-2xl"></i>


            @guest
                <a href="/login">
                    <i class="bi bi-person text-2xl"></i>
                </a>
            @endguest


            @auth
                <a href="/studio" class="sm:flex hidden items-center  px-2 py-1 rounded-full bg-primary">
                    <i class="bi bi-plus text-2xl"></i>
                    <span>Create</span>
                </a>
                {{ auth()->user()->name }}
            @endauth


        </div>

    </div>
</div>
