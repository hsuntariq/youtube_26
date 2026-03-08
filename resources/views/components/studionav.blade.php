


{{-- overlay --}}


<form action="/upload-video" method="POST" class="fixed flex justify-center items-center top-0 min-h-screen bg-black/70 z-300 w-full">
    {{-- first form --}}

    <div class="bg-zinc-900 first-form w-[90%] md:w-[70%] lg:w-[50%] xl:w-[40%] h-[500px] rounded-xl shadow-lg relative text-center text-white">

    <!-- Header -->
    <div class="flex justify-between items-center px-6 py-4 border-b border-zinc-700">
      <h2 class="text-lg font-semibold">Upload videos</h2>
      <button class="text-gray-400 hover:text-white text-xl">✕</button>
    </div>

    <!-- Upload Content -->
    <div class="flex flex-col items-center justify-center h-[320px]">

      <!-- Upload Icon -->
      <div class="bg-zinc-800 w-24 h-24 rounded-full flex items-center justify-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-10 w-10 text-gray-300" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M12 16V4m0 0l-4 4m4-4l4 4M4 20h16"/>
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
        <input type="text" class="w-full p-2 rounded border border-zinc-700 bg-zinc-800 text-white" value="user">
        <button class="mt-2 px-3 py-1 bg-zinc-700 rounded text-sm flex items-center space-x-1">
          <i class="bi bi-sliders"></i><span>A/B Testing</span>
        </button>
      </div>

      <!-- Description -->
      <div class="space-y-1">
        <label class="block text-gray-400 text-sm">Description</label>
        <textarea class="w-full h-32 p-2 rounded border border-zinc-700 bg-zinc-800 text-white" placeholder="Tell viewers about your video..."></textarea>
        <div class="text-gray-500 text-xs text-right">0/5000</div>
      </div>

      <!-- Thumbnail -->
      <div class="space-y-1">
        <p class="text-gray-400 text-sm">Thumbnail</p>
        <div class="flex space-x-2">
          <button class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">Upload file</button>
          <button class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">Auto-generated</button>
          <button class="flex-1 border border-zinc-700 p-4 rounded text-gray-300 hover:bg-zinc-700">A/B Testing</button>
        </div>
      </div>

      <!-- Playlists -->
      <div class="space-y-1">
        <label class="block text-gray-400 text-sm">Playlists</label>
        <select class="w-full p-2 rounded border border-zinc-700 bg-zinc-800 text-white">
          <option>Select</option>
        </select>
      </div>

      <!-- Audience -->
      <div class="space-y-2">
        <p class="text-gray-400 text-sm font-semibold">Audience</p>
        <p class="text-gray-500 text-xs">
          This video is set to not made for kids. Regardless of your location, you're legally required to comply with COPPA.
        </p>
        <div class="flex space-x-4">
          <label class="flex items-center space-x-2">
            <input type="radio" name="kids" checked class="accent-gray-600">
            <span>No, it's not made for kids</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="radio" name="kids" class="accent-gray-600">
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
        <p class="text-gray-400 text-sm mt-2">Video link: <a href="#" class="text-blue-500">https://youtu.be/0AugSbR_6iw</a></p>
        <p class="text-gray-400 text-sm">Filename: user.mkv</p>
      </div>
    </div>

  </div>

  <!-- Bottom Navigation -->
  <div class="flex justify-end p-4 border-t border-zinc-700 space-x-2">
    <button class="px-4 py-2 bg-zinc-700 rounded text-white">Next</button>
  </div>

</div>





</form>

{{-- form end --}}



<div class="flex justify-between p-5 items-center">
    <div class="logo flex gap-2 items-center">
        <i class="bi bi-list text-2xl"></i>
        <img src="https://www.gstatic.com/youtube/img/creator/yt_studio_logo_v2_darkmode.svg" width="100px" alt="">
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
    

    video_input.on('input',(e)=>{
        let file = e.target.files[0]
        form1.addClass('hidden')
        form2.removeClass('hidden').addClass('flex')
        let link = URL.createObjectURL(file)
        $('.video-preview').attr('src',link)
    })



</script>