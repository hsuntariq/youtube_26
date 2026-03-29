<x-flash />



{{-- overlay --}}

<form action="/upload-video" method="POST" enctype="multipart/form-data"
    class="fixed flex justify-center items-center top-0 min-h-screen bg-black/70 z-300 w-full">
    @csrf
    {{-- first form --}}

    <div
        class="bg-zinc-900 first-form w-[90%] md:w-[70%] lg:w-[50%] xl:w-[40%] h-[500px] rounded-xl shadow-lg relative text-center text-white">

        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-zinc-700">
            <h2 class="text-lg font-semibold">Upload videos</h2>
            <button class="text-gray-400 hover:text-white text-xl">✕</button>
        </div>

        <!-- Upload Content -->
        <div class="flex flex-col items-center justify-center h-[320px]">

            <!-- Upload Icon -->
            <div class="bg-zinc-800 w-24 h-24 rounded-full flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 16V4m0 0l-4 4m4-4l4 4M4 20h16" />
                </svg>
            </div>

            <p class="text-lg font-medium mb-2">
                Drag and drop video files to upload
            </p>

            <p class="text-sm text-gray-400 mb-6">
                Your videos will be private until you publish them.
            </p>

            <!-- Button -->
            <input type="file" name="video" id="video" accept="video/mp4" class="hidden video-input">
            <label for="video" class="bg-white text-black px-6 py-2 rounded-full font-medium hover:bg-zinc-200">
                Select files
            </label>

        </div>

        <!-- Footer -->
        <div class="absolute bottom-6 left-0 right-0 text-xs text-gray-400 px-10">
            By submitting your videos to YouTube, you acknowledge that you agree to
            <span class="text-blue-400">YouTube's Terms of Service</span> and
            <span class="text-blue-400">Community Guidelines</span>.
            <br>
            Please be sure not to violate others' copyright or privacy rights.
            <span class="text-blue-400">Learn more</span>
        </div>
    </div>


    {{-- second form --}}


    <div class="bg-zinc-900 hidden second-form text-white h-[700px] rounded-xl  flex-col">

        <!-- Header Progress Bar -->
        <div class="flex items-center px-6 py-4 space-x-6">
            <div class="flex-1 flex items-center space-x-2">
                <span class="w-4 h-4 bg-white rounded-full"></span>
                <span class="text-gray-400 text-sm">Details</span>
            </div>
            <div class="flex-1 flex items-center space-x-2">
                <span class="w-4 h-4 bg-zinc-700 rounded-full"></span>
                <span class="text-zinc-400 text-sm">Video elements</span>
            </div>
            <div class="flex-1 flex items-center space-x-2">
                <span class="w-4 h-4 bg-zinc-700 rounded-full"></span>
                <span class="text-zinc-400 text-sm">Initial check</span>
            </div>
            <div class="flex-1 flex items-center space-x-2">
                <span class="w-4 h-4 bg-zinc-700 rounded-full"></span>
                <span class="text-zinc-400 text-sm">Visibility</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-1 overflow-y-auto scroll-hidden px-6 py-4 space-x-6">

            <!-- Left Column -->
            <div class="flex-1 max-w-xl space-y-6">

                <!-- Title -->
                <div class="space-y-1">
                    <label class="block text-gray-400 text-sm">Title (required)</label>
                    <input type="text" name="title"
                        class="w-full p-2 rounded border border-zinc-700 bg-zinc-800 text-white" value="user">
                    <button class="mt-2 px-3 py-1 bg-zinc-700 rounded text-sm flex items-center space-x-1">
                        <i class="bi bi-sliders"></i><span>A/B Testing</span>
                    </button>
                </div>

                <!-- Description -->
                <div class="space-y-1">
                    <label class="block text-gray-400 text-sm">Description</label>
                    <textarea name="description" class="w-full h-32 p-2 rounded border border-zinc-700 bg-zinc-800 text-white"
                        placeholder="Tell viewers about your video..."></textarea>
                    <div class="text-gray-500 text-xs text-right">0/5000</div>
                </div>

                <!-- Thumbnail -->
                <div class="space-y-1">
                    <p class="text-gray-400 text-sm">Thumbnail</p>
                    <div class="flex space-x-2">
                        <input type="file" name="thumbnail" class='hidden image-preview-input' id='thumbnail'
                            accept="image/jpg">
                        <label for="thumbnail"
                            class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">Upload
                            file</label>
                        <label
                            class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">Auto-generated</label>
                        <label class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">A/B
                            Testing</label>
                    </div>
                    {{-- thumbnail preview --}}
                    <img src='https://media.istockphoto.com/id/814423752/photo/eye-of-model-with-colorful-art-make-up-close-up.jpg?s=612x612&w=0&k=20&c=l15OdMWjgCKycMMShP8UK94ELVlEGvt7GmB_esHWPYE='
                        class="w-50 h-50 object-contain rounded-md hidden image-preview"></img>
                </div>

                <!-- Playlists -->
                <div class="space-y-1">
                    <label class="block text-gray-400 text-sm">Playlists</label>
                    <select name="playlist_ids[]" multiple
                        class="w-full p-2 rounded border border-zinc-700 bg-zinc-800 text-white">
                        <option value="">Select</option>
                        <!-- populate dynamically in real app -->
                    </select>
                </div>

                <!-- Audience -->
                <div class="space-y-2">
                    <p class="text-gray-400 text-sm font-semibold">Audience</p>
                    <p class="text-gray-500 text-xs">
                        This video is set to not made for kids. Regardless of your location, you're legally required to
                        comply with COPPA.
                    </p>
                    <div class="flex space-x-4">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="made_for_kids" value="0" checked class="accent-gray-600">
                            <span>No, it's not made for kids</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="made_for_kids" value="1" class="accent-gray-600">
                            <span>Yes, it's made for kids</span>
                        </label>
                    </div>
                    <button class="text-gray-400 text-sm flex items-center space-x-1">
                        <i class="bi bi-chevron-down"></i><span>Age restriction (advanced) Show more</span>
                    </button>
                </div>

            </div>

            <!-- Right Column -->
            <div class="w-80 flex-shrink-0 space-y-4">
                <div class="bg-zinc-800 rounded p-2">
                    <video src="" class="w-full rounded video-preview" controls alt="Video thumbnail">
                        <p class="text-gray-400 text-sm mt-2">Video link: <a href="#"
                                class="text-blue-500">https://youtu.be/0AugSbR_6iw</a></p>
                        <p class="text-gray-400 text-sm">Filename: user.mkv</p>
                </div>
            </div>

        </div>

        <!-- Bottom Navigation -->
        <div class="flex justify-end p-4 border-t border-zinc-700 space-x-2">
            <button type="button" class="px-4 py-2 bg-zinc-700 next rounded text-white">Next</button>
        </div>

    </div>

    {{-- second form end --}}

    {{-- third form --}}

    <div class="fixed inset-0 hidden third-form   justify-center items-center z-50">

        <div
            class="bg-zinc-900 third-form scroll-hidden overflow-y-auto max-h-[85vh] w-[850px] rounded-xl text-white p-4">

            <div class="bg-[#1f1f1f] rounded-xl shadow-lg p-6">

                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold">2025 03 29 15 09 29</h2>

                    <div class="flex gap-4 items-center text-sm">
                        <span class="bg-[#2b2b2b] px-3 py-1 rounded">Saved as private</span>
                        <button class="text-xl">✕</button>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="flex items-center justify-between mb-8">

                    <div class="flex flex-col items-center w-full">
                        <div class="bg-white text-black px-4 py-2 rounded-lg font-medium">
                            Details
                        </div>
                        <div class="w-full h-[2px] bg-gray-600 mt-3 relative">
                            <div class="absolute left-0 top-[-5px] w-4 h-4 bg-white rounded-full"></div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full">
                        <span class="text-gray-400">Video elements</span>
                        <div class="w-full h-[2px] bg-gray-600 mt-3 relative">
                            <div class="absolute left-1/2 top-[-5px] w-4 h-4 bg-gray-400 rounded-full"></div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full">
                        <span class="text-gray-400">Initial check</span>
                        <div class="w-full h-[2px] bg-gray-600 mt-3 relative">
                            <div class="absolute left-1/2 top-[-5px] w-4 h-4 bg-gray-400 rounded-full"></div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full">
                        <span>Visibility</span>
                        <div class="w-full h-[2px] bg-gray-600 mt-3 relative">
                            <div class="absolute right-0 top-[-5px] w-5 h-5 bg-white rounded-full"></div>
                        </div>
                    </div>

                </div>

                <!-- Title -->
                <h2 class="text-2xl font-semibold mb-2">Visibility</h2>

                <p class="text-gray-400 mb-6">
                    Choose when to publish and who can see your video
                </p>

                <!-- Recommendation -->
                <div class="bg-[#2b2b2b] p-4 rounded mb-6 flex items-center gap-3">
                    <span class="text-xl">ℹ️</span>
                    <p class="text-sm">
                        We recommend keeping this video private and not sharing it until checks are complete.
                    </p>
                </div>

                <div class="flex gap-6">

                    <!-- Left Column -->
                    <div class="flex-1 space-y-6">

                        <!-- Visibility -->
                        <div class="border border-gray-700 rounded-lg p-6">

                            <h3 class="text-lg mb-4">Save or publish</h3>

                            <p class="text-gray-400 text-sm mb-4">
                                Make your video public, unlisted, or private
                            </p>

                            <div class="space-y-4">

                                <label class="flex items-start gap-3">
                                    <input type="radio" name="visibility" value="private" class="mt-1">
                                    <div>
                                        <p class="font-medium">Private</p>
                                        <p class="text-gray-400 text-sm">
                                            Only you and people you choose can watch your video
                                        </p>
                                    </div>
                                </label>

                                <label class="flex items-start gap-3">
                                    <input type="radio" name="visibility" value="unlisted" checked class="mt-1">
                                    <div>
                                        <p class="font-medium">Unlisted</p>
                                        <p class="text-gray-400 text-sm">
                                            Anyone with the video link can watch your video
                                        </p>
                                    </div>
                                </label>

                                <label class="flex items-start gap-3">
                                    <input type="radio" name="visibility" value="public" class="mt-1">
                                    <div>
                                        <p class="font-medium">Public</p>
                                        <p class="text-gray-400 text-sm">
                                            Everyone can watch your video
                                        </p>
                                    </div>
                                </label>

                            </div>

                            <div class="mt-4 flex items-center gap-2 text-gray-400 text-sm">
                                <input type="checkbox" name="is_premiere" value="1">
                                <span>Set as instant Premiere</span>
                            </div>

                        </div>

                        <!-- Schedule -->
                        <div class="border border-gray-700 rounded-lg p-4 flex justify-between items-center">

                            <div>
                                <p class="font-medium">Schedule</p>
                                <p class="text-gray-400 text-sm">
                                    Select a date to make your video public.
                                </p>
                            </div>

                            <span>⌄</span>

                        </div>

                        <!-- Info Section -->
                        <div class="bg-[#1a1a1a] p-5 rounded-lg">

                            <h4 class="font-semibold mb-3">
                                Before you publish, check the following:
                            </h4>

                            <p class="text-gray-300 text-sm mb-2">
                                Do kids appear in this video?
                            </p>

                            <p class="text-gray-400 text-sm mb-4">
                                Make sure you follow our policies to protect minors from harm,
                                exploitation, bullying, and violations of labor law.
                            </p>

                            <p class="text-gray-300 text-sm mb-2">
                                Looking for overall content guidance?
                            </p>

                            <p class="text-gray-400 text-sm">
                                Our Community Guidelines can help you avoid trouble and ensure
                                YouTube remains a safe and vibrant community.
                            </p>

                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="w-[260px]">

                        <div class="bg-[#121212] rounded-lg p-4">

                            <video src=""
                                class="video2 h-[150px] flex items-center justify-center text-gray-400">
                                Processing video...
                            </video>

                            <p class="mt-4 text-sm text-gray-400">
                                2025 03 29 15 09 29
                            </p>

                            <p class="text-sm mt-2">
                                Video link
                            </p>

                            <a href="#" class="text-blue-400 text-sm break-all">
                                https://youtu.be/xXq_QPhxBjE
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="flex justify-between items-center mt-8">

                    <p class="text-gray-400 text-sm">
                        Processing up to SD ... 3 minutes left
                    </p>

                    <div class="flex gap-3">

                        <button class="bg-[#2b2b2b] px-4 py-2 rounded hover:bg-[#3a3a3a]">
                            Back
                        </button>

                        <button class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200">
                            Save
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- third form end --}}

</form>

{{-- form end --}}



<div class="flex justify-between p-5 items-center">
    <div class="logo flex gap-2 items-center">
        <i class="bi bi-list text-2xl"></i>
        <img src="https://www.gstatic.com/youtube/img/creator/yt_studio_logo_v2_darkmode.svg" width="100px"
            alt="">
    </div>
    <div class="search flex gap-2 w-[50%]">



        <div class="flex gap-2  w-full ps-4 overflow-hidden rounded-full outline outline-gray-400 items-center">
            <div class="flex w-full">
                <input type="text" class="w-full" placeholder='Search'>
                <i class="bi bi-search  bg-[#1C1C1C] px-4 py-2"></i>
            </div>
        </div>
        <div class="hidden xl:flex bg-[#1C1C1C] p-2 rounded-md">
            <div class="flex gap-2 text-sm">
                <i class="bi bi-watch"></i>
                5,886
                <i class="bi bi-eye"></i>
                11
                <i class="bi bi-eye"></i>
                170

            </div>





        </div>

    </div>
    <div class="account flex gap-2 items-center">

        <div class="flex items-center text-sm gap-2">
            <div class="sm:flex create hidden items-center  px-2 py-1 rounded-full bg-primary">
                <i class="bi bi-plus text-2xl"></i>
                <span>Create</span>
                </div=>
                <i class="bi bi-bell text-2xl"></i>
                <i class="bi bi-person text-2xl"></i>
            </div>

        </div>
    </div>


    <script>
        let form1 = $('.first-form')
        let form2 = $('.second-form')
        let video_input = $('.video-input')


        video_input.on('input', (e) => {
            let file = e.target.files[0]
            form1.addClass('hidden')
            form2.removeClass('hidden').addClass('flex')
            let link = URL.createObjectURL(file)
            $('.video-preview').attr('src', link)
            $('.video2').attr('src', link)
        })


        $('.image-preview-input').on('input', function(e) {
            let file = e.target.files[0]
            let imageURL = URL.createObjectURL(file)
            $('.image-preview').attr('src', imageURL).removeClass('hidden')
        })


        $('.next').on('click', function() {
            $('.second-form').removeClass('flex').addClass('hidden')
            $('.third-form').removeClass('hidden').addClass('flex')
        })
    </script>
