<!DOCTYPE html>
<html lang="en" class="bg-zinc-950">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YouTube — Video Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: 'DM Sans', sans-serif;
        }

        .thumb-hover:hover .thumb-overlay {
            opacity: 1;
        }

        .like-btn.active {
            color: #3b82f6;
        }

        .progress-fill {
            width: 38%;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #18181b;
        }

        ::-webkit-scrollbar-thumb {
            background: #3f3f46;
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-zinc-950 text-zinc-100 min-h-screen">

    <!-- Navbar -->
    <nav
        class="sticky top-0 z-50 bg-zinc-950/95 backdrop-blur border-b border-zinc-800 px-4 py-2 flex items-center gap-4">
        <div class="flex items-center gap-1">
            <svg class="w-7 h-7 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
            <span class="font-semibold text-lg tracking-tight">YouTube</span>
        </div>
        <div class="flex-1 max-w-xl mx-auto">
            <div class="flex rounded-full overflow-hidden border border-zinc-700">
                <input type="text" placeholder="Search"
                    class="flex-1 bg-zinc-900 px-4 py-1.5 text-sm outline-none text-zinc-100 placeholder-zinc-500" />
                <button class="bg-zinc-800 hover:bg-zinc-700 px-4 border-l border-zinc-700 transition-colors">
                    <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center gap-3 ml-auto">
            <button class="text-zinc-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <div
                class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-semibold cursor-pointer">
                AK</div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="max-w-screen-xl mx-auto px-4 py-5 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column -->
        <div class="lg:col-span-2">

            <!-- Video Player -->
            <div class="relative bg-black rounded-xl overflow-hidden aspect-video group mb-3">

                <!-- Video Element -->
                <video id="videoEl" class="absolute inset-0 w-full h-full object-cover"
                    src="{{asset('/storage/' . $video['video'])}}" preload="metadata" onclick="togglePlay()"></video>

                <!-- Play/Pause Overlay -->
                <div id="playOverlay" class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <button id="playBtn" onclick="togglePlay()"
                        class="pointer-events-auto relative z-10 w-16 h-16 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 flex items-center justify-center transition-all duration-200 hover:scale-105">
                        <svg id="playIcon" class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>

                <!-- Controls Bar -->
                <div
                    class="absolute bottom-0 left-0 right-0 px-3 pb-2 pt-8 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- Progress Bar -->
                    <div class="relative w-full h-1 bg-white/30 rounded-full cursor-pointer mb-2" id="progressBar"
                        onclick="seek(event, this)">
                        <div id="progressFill" class="h-full bg-red-500 rounded-full relative" style="width:0%">
                            <div
                                class="absolute right-0 top-1/2 -translate-y-1/2 w-3 h-3 bg-red-500 rounded-full shadow">
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Controls -->
                    <div class="flex items-center justify-between text-white text-xs">
                        <div class="flex items-center gap-3">

                            <!-- Play/Pause -->
                            <button onclick="togglePlay()" class="hover:text-zinc-300 transition-colors">
                                <svg id="ctrlIcon" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </button>

                            <!-- Time -->
                            <span id="timeDisplay" class="text-white/80">0:00 / 0:00</span>

                            <!-- Mute -->
                            <button onclick="toggleMute()" class="hover:text-zinc-300 transition-colors">
                                <svg id="muteIcon" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z" />
                                </svg>
                            </button>

                            <!-- Volume Slider -->
                            <input id="volumeSlider" type="range" min="0" max="1" step="0.05" value="1"
                                oninput="setVolume(this.value)" class="w-16 accent-red-500 cursor-pointer" />
                        </div>

                        <div class="flex items-center gap-3">
                            <!-- Playback Speed -->
                            <button onclick="cycleSpeed(this)"
                                class="hover:text-zinc-300 transition-colors text-xs">1x</button>

                            <!-- Fullscreen -->
                            <button onclick="toggleFullscreen()" class="hover:text-zinc-300 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-lg font-semibold leading-snug mb-2">{{ $video['title'] }}</h1>

            <!-- Meta + Actions -->
            <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                <span class="text-sm text-zinc-400">2.4M views &nbsp;·&nbsp; 3 weeks ago</span>
                <div class="flex items-center gap-2 flex-wrap">
                    <button id="likeBtn" onclick="toggleLike()"
                        class="like-btn flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-800 hover:bg-zinc-700 text-sm font-medium transition-colors border border-zinc-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                        <span id="likeCount">148K</span>
                    </button>
                    <button
                        class="flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-800 hover:bg-zinc-700 text-sm font-medium transition-colors border border-zinc-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        Share
                    </button>
                    <button
                        class="flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-800 hover:bg-zinc-700 text-sm font-medium transition-colors border border-zinc-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        Save
                    </button>
                    <button
                        class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-zinc-800 hover:bg-zinc-700 text-sm transition-colors border border-zinc-700">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="h-px bg-zinc-800 mb-3"></div>

            <!-- Channel + Subscribe -->
            <div class="flex items-center gap-3 mb-2">
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                    CD</div>
                <div class="flex-1">
                    <p class="text-sm font-semibold">
                        {{ $video->user->name }}
                    </p>
                    <p class="text-xs text-zinc-400">1.2M subscribers</p>
                </div>
                <button id="subBtn" onclick="toggleSub()"
                    class="px-5 py-2 rounded-full bg-white text-zinc-900 text-sm font-semibold hover:bg-zinc-200 transition-colors">Subscribe</button>
            </div>

            <!-- Description -->
            <div id="descBox" class="mt-3 bg-zinc-900 rounded-xl p-4 text-sm text-zinc-300 leading-relaxed">
                <p id="descShort">{{ $video['description'] }}</p>
                <div id="descFull" class="hidden mt-2 space-y-2">
                    <p>Topics covered:</p>
                    <ul class="list-disc list-inside space-y-1 text-zinc-400 text-xs">
                        <li>Next.js 14 App Router & Server Components</li>
                        <li>Prisma ORM setup with PostgreSQL</li>
                        <li>Authentication with NextAuth.js</li>
                        <li>Tailwind CSS advanced patterns</li>
                        <li>Deployment to Vercel</li>
                    </ul>
                    <p class="text-zinc-400 text-xs mt-2">Source code: github.com/codewithdev/nextjs-tutorial<br />00:00
                        Intro &nbsp; 02:15 Project Setup &nbsp; 06:30 Database &nbsp; 14:00 Auth &nbsp; 20:00 Deploy</p>
                </div>
                <button onclick="toggleDesc()" class="mt-2 text-xs font-semibold text-zinc-200 hover:text-white"
                    id="descToggle">Show more</button>
            </div>

            <!-- Comments -->
            <div class="mt-6">
                <div class="flex items-center gap-5 mb-5">
                    <h2 class="text-base font-semibold">3,841 Comments</h2>
                    <button class="flex items-center gap-1.5 text-sm text-zinc-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                        Sort by
                    </button>
                </div>

                <!-- Add Comment -->
                <div class="flex gap-3 mb-6">
                    <div
                        class="w-9 h-9 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                        AK</div>
                    <div class="flex-1">
                        <input id="commentInput" type="text" placeholder="Add a comment..."
                            class="w-full bg-transparent border-b border-zinc-700 focus:border-zinc-400 outline-none text-sm py-1.5 text-zinc-100 placeholder-zinc-500 transition-colors" />
                        <div id="commentBtns" class="hidden justify-end gap-2 mt-2 flex">
                            <button onclick="cancelComment()"
                                class="px-4 py-1.5 text-sm rounded-full hover:bg-zinc-800 transition-colors text-zinc-400">Cancel</button>
                            <button onclick="submitComment()"
                                class="px-4 py-1.5 text-sm rounded-full bg-blue-600 hover:bg-blue-500 text-white font-medium transition-colors">Comment</button>
                        </div>
                    </div>
                </div>

                <!-- Comments List -->
                <div id="commentsList" class="space-y-5">

                    <!-- Comment 1 -->
                    <div class="flex gap-3">
                        <div
                            class="w-9 h-9 rounded-full bg-emerald-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            JS</div>
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-semibold">@jsmaster99</span> <span
                                    class="text-zinc-500 text-xs ml-2">2 days ago</span></p>
                            <p class="text-sm text-zinc-300 mt-1 leading-relaxed">This is hands-down the best Next.js
                                tutorial I've found. The Prisma integration section alone saved me hours of debugging.
                                Subscribed immediately!</p>
                            <div class="flex items-center gap-4 mt-2">
                                <button
                                    class="flex items-center gap-1 text-xs text-zinc-400 hover:text-white transition-colors comment-like"
                                    onclick="likeComment(this)">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    <span>843</span>
                                </button>
                                <button class="text-xs text-zinc-500 hover:text-white transition-colors"
                                    onclick="toggleReplyForm(this)">Reply</button>
                            </div>
                            <div class="reply-form hidden mt-3">
                                <input type="text" placeholder="Add a reply..."
                                    class="w-full bg-transparent border-b border-zinc-700 focus:border-zinc-400 outline-none text-sm py-1 text-zinc-100 placeholder-zinc-500 transition-colors" />
                                <div class="flex justify-end gap-2 mt-2">
                                    <button onclick="cancelReply(this)"
                                        class="px-3 py-1 text-xs rounded-full hover:bg-zinc-800 transition-colors text-zinc-400">Cancel</button>
                                    <button onclick="submitReply(this)"
                                        class="px-3 py-1 text-xs rounded-full bg-blue-600 hover:bg-blue-500 text-white transition-colors">Reply</button>
                                </div>
                            </div>
                            <div class="replies mt-3 pl-4 border-l border-zinc-800 space-y-3 hidden">
                                <div class="flex gap-2">
                                    <div
                                        class="w-7 h-7 rounded-full bg-violet-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        CD</div>
                                    <div>
                                        <p class="text-xs"><span class="font-semibold text-blue-400">@CodeWithDev</span>
                                            <span class="text-zinc-500 ml-1">1 day ago</span>
                                        </p>
                                        <p class="text-xs text-zinc-300 mt-1">Thank you so much! Really glad the Prisma
                                            section clicked. More advanced content coming soon 🚀</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="text-xs text-blue-400 hover:text-blue-300 mt-2 transition-colors show-replies-btn"
                                onclick="toggleReplies(this)">▶ 12 replies</button>
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="flex gap-3">
                        <div
                            class="w-9 h-9 rounded-full bg-amber-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            MR</div>
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-semibold">@mariadev_codes</span> <span
                                    class="text-zinc-500 text-xs ml-2">5 days ago</span></p>
                            <p class="text-sm text-zinc-300 mt-1 leading-relaxed">Finally someone who explains server
                                components properly. I've watched 10+ tutorials and this is the only one that made it
                                click for me. Timestamp 6:30 is gold.</p>
                            <div class="flex items-center gap-4 mt-2">
                                <button
                                    class="flex items-center gap-1 text-xs text-zinc-400 hover:text-white transition-colors comment-like"
                                    onclick="likeComment(this)">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    <span>527</span>
                                </button>
                                <button class="text-xs text-zinc-500 hover:text-white transition-colors"
                                    onclick="toggleReplyForm(this)">Reply</button>
                            </div>
                            <div class="reply-form hidden mt-3">
                                <input type="text" placeholder="Add a reply..."
                                    class="w-full bg-transparent border-b border-zinc-700 focus:border-zinc-400 outline-none text-sm py-1 text-zinc-100 placeholder-zinc-500 transition-colors" />
                                <div class="flex justify-end gap-2 mt-2">
                                    <button onclick="cancelReply(this)"
                                        class="px-3 py-1 text-xs rounded-full hover:bg-zinc-800 transition-colors text-zinc-400">Cancel</button>
                                    <button onclick="submitReply(this)"
                                        class="px-3 py-1 text-xs rounded-full bg-blue-600 hover:bg-blue-500 text-white transition-colors">Reply</button>
                                </div>
                            </div>
                            <div class="replies mt-3 pl-4 border-l border-zinc-800 space-y-3 hidden"></div>
                            <button
                                class="text-xs text-blue-400 hover:text-blue-300 mt-2 transition-colors show-replies-btn"
                                onclick="toggleReplies(this)">▶ 4 replies</button>
                        </div>
                    </div>

                    <!-- Comment 3 -->
                    <div class="flex gap-3">
                        <div
                            class="w-9 h-9 rounded-full bg-sky-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                            TN</div>
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-semibold">@techie_noor</span> <span
                                    class="text-zinc-500 text-xs ml-2">1 week ago</span></p>
                            <p class="text-sm text-zinc-300 mt-1 leading-relaxed">Quick question — does this approach
                                work with MySQL instead of PostgreSQL? I'm stuck on the Prisma connection string part.
                            </p>
                            <div class="flex items-center gap-4 mt-2">
                                <button
                                    class="flex items-center gap-1 text-xs text-zinc-400 hover:text-white transition-colors comment-like"
                                    onclick="likeComment(this)">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                    </svg>
                                    <span>91</span>
                                </button>
                                <button class="text-xs text-zinc-500 hover:text-white transition-colors"
                                    onclick="toggleReplyForm(this)">Reply</button>
                            </div>
                            <div class="reply-form hidden mt-3">
                                <input type="text" placeholder="Add a reply..."
                                    class="w-full bg-transparent border-b border-zinc-700 focus:border-zinc-400 outline-none text-sm py-1 text-zinc-100 placeholder-zinc-500 transition-colors" />
                                <div class="flex justify-end gap-2 mt-2">
                                    <button onclick="cancelReply(this)"
                                        class="px-3 py-1 text-xs rounded-full hover:bg-zinc-800 transition-colors text-zinc-400">Cancel</button>
                                    <button onclick="submitReply(this)"
                                        class="px-3 py-1 text-xs rounded-full bg-blue-600 hover:bg-blue-500 text-white transition-colors">Reply</button>
                                </div>
                            </div>
                            <div class="replies mt-3 pl-4 border-l border-zinc-800 space-y-3 hidden"></div>
                            <button
                                class="text-xs text-blue-400 hover:text-blue-300 mt-2 transition-colors show-replies-btn"
                                onclick="toggleReplies(this)">▶ 2 replies</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Right Column — Suggestions -->
        <div class="lg:col-span-1">
            <p class="text-xs font-semibold text-zinc-500 uppercase tracking-widest mb-4">Up Next</p>
            <div class="space-y-3" id="suggestions">

                <!-- Suggestion 1 -->
                <div class="flex gap-3 group cursor-pointer" onclick="">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-900 to-indigo-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-blue-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">18:42</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            React Server Components Deep Dive — Everything You Need to Know</p>
                        <p class="text-xs text-zinc-500 mt-1">Fireship</p>
                        <p class="text-xs text-zinc-500">980K views · 1 month ago</p>
                    </div>
                </div>

                <!-- Suggestion 2 -->
                <div class="flex gap-3 group cursor-pointer">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-emerald-900 to-teal-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-emerald-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">24:10</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            Tailwind CSS v4 — What's New & Should You Upgrade?</p>
                        <p class="text-xs text-zinc-500 mt-1">Kevin Powell</p>
                        <p class="text-xs text-zinc-500">1.3M views · 2 weeks ago</p>
                    </div>
                </div>

                <!-- Suggestion 3 -->
                <div class="flex gap-3 group cursor-pointer">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-violet-900 to-purple-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-violet-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">31:05</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            Full Authentication with NextAuth.js — Email, OAuth & JWT</p>
                        <p class="text-xs text-zinc-500 mt-1">Traversy Media</p>
                        <p class="text-xs text-zinc-500">654K views · 3 weeks ago</p>
                    </div>
                </div>

                <!-- Suggestion 4 -->
                <div class="flex gap-3 group cursor-pointer">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-amber-900 to-orange-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-amber-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">14:27</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            PostgreSQL + Prisma Tutorial: Database Design Patterns</p>
                        <p class="text-xs text-zinc-500 mt-1">Theo — t3.gg</p>
                        <p class="text-xs text-zinc-500">430K views · 5 days ago</p>
                    </div>
                </div>

                <!-- Suggestion 5 -->
                <div class="flex gap-3 group cursor-pointer">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-rose-900 to-pink-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-rose-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">09:55</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            Deploying Next.js to Vercel in Under 10 Minutes</p>
                        <p class="text-xs text-zinc-500 mt-1">Vercel</p>
                        <p class="text-xs text-zinc-500">2.1M views · 2 months ago</p>
                    </div>
                </div>

                <!-- Suggestion 6 -->
                <div class="flex gap-3 group cursor-pointer">
                    <div class="w-40 flex-shrink-0 rounded-lg overflow-hidden aspect-video relative bg-zinc-800">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-cyan-900 to-sky-800 flex items-center justify-center">
                            <svg class="w-8 h-8 text-cyan-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/80 text-white px-1 rounded">42:18</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium leading-snug line-clamp-2 group-hover:text-blue-400 transition-colors">
                            Building a SaaS Product: From Zero to Launch (2024 Edition)</p>
                        <p class="text-xs text-zinc-500 mt-1">CodeWithDev</p>
                        <p class="text-xs text-zinc-500">178K views · 1 week ago</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let playing = false;
        let liked = false;
        let subscribed = false;

        function togglePlay() {
            playing = !playing;
            const icon = `<path d="${playing ? 'M6 19h4V5H6v14zm8-14v14h4V5h-4z' : '8 5v14l11-7z'}"/>`;
            document.getElementById('playIcon').innerHTML = icon;
            document.getElementById('ctrlIcon').innerHTML = icon;
        }

        function toggleLike() {
            liked = !liked;
            const btn = document.getElementById('likeBtn');
            const count = document.getElementById('likeCount');
            if (liked) {
                btn.classList.add('active', 'bg-blue-900/40', 'border-blue-500', 'text-blue-400');
                btn.classList.remove('bg-zinc-800', 'border-zinc-700');
                count.textContent = '148K+';
            } else {
                btn.classList.remove('active', 'bg-blue-900/40', 'border-blue-500', 'text-blue-400');
                btn.classList.add('bg-zinc-800', 'border-zinc-700');
                count.textContent = '148K';
            }
        }

        function toggleSub() {
            subscribed = !subscribed;
            const btn = document.getElementById('subBtn');
            if (subscribed) {
                btn.textContent = 'Subscribed ✓';
                btn.className =
                    'px-5 py-2 rounded-full bg-zinc-700 text-zinc-300 text-sm font-semibold hover:bg-zinc-600 transition-colors border border-zinc-600';
            } else {
                btn.textContent = 'Subscribe';
                btn.className =
                    'px-5 py-2 rounded-full bg-white text-zinc-900 text-sm font-semibold hover:bg-zinc-200 transition-colors';
            }
        }

        function toggleDesc() {
            const full = document.getElementById('descFull');
            const toggle = document.getElementById('descToggle');
            const short = document.getElementById('descShort');
            if (full.classList.contains('hidden')) {
                full.classList.remove('hidden');
                short.classList.add('hidden');
                toggle.textContent = 'Show less';
            } else {
                full.classList.add('hidden');
                short.classList.remove('hidden');
                toggle.textContent = 'Show more';
            }
        }

        document.getElementById('commentInput').addEventListener('focus', () => {
            document.getElementById('commentBtns').classList.remove('hidden');
            document.getElementById('commentBtns').classList.add('flex');
        });

        function cancelComment() {
            document.getElementById('commentInput').value = '';
            document.getElementById('commentBtns').classList.add('hidden');
        }

        function submitComment() {
            const input = document.getElementById('commentInput');
            const text = input.value.trim();
            if (!text) return;
            const list = document.getElementById('commentsList');
            const div = document.createElement('div');
            div.className = 'flex gap-3';
            div.innerHTML = `
        <div class="w-9 h-9 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">AK</div>
        <div class="flex-1">
          <p class="text-sm"><span class="font-semibold">@you</span> <span class="text-zinc-500 text-xs ml-2">Just now</span></p>
          <p class="text-sm text-zinc-300 mt-1">${text}</p>
          <div class="flex items-center gap-4 mt-2">
            <button class="flex items-center gap-1 text-xs text-zinc-400 hover:text-white transition-colors" onclick="likeComment(this)">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
              <span>0</span>
            </button>
          </div>
        </div>`;
            list.prepend(div);
            input.value = '';
            cancelComment();
        }

        function likeComment(btn) {
            const span = btn.querySelector('span');
            const n = parseInt(span.textContent);
            if (btn.dataset.liked) {
                span.textContent = n - 1;
                delete btn.dataset.liked;
                btn.classList.remove('text-blue-400');
            } else {
                span.textContent = n + 1;
                btn.dataset.liked = '1';
                btn.classList.add('text-blue-400');
            }
        }

        function toggleReplyForm(btn) {
            const comment = btn.closest('.flex-1');
            const form = comment.querySelector('.reply-form');
            form.classList.toggle('hidden');
            if (!form.classList.contains('hidden')) form.querySelector('input').focus();
        }

        function cancelReply(btn) {
            btn.closest('.reply-form').classList.add('hidden');
        }

        function submitReply(btn) {
            const form = btn.closest('.reply-form');
            const input = form.querySelector('input');
            const text = input.value.trim();
            if (!text) return;
            const comment = form.closest('.flex-1');
            let replies = comment.querySelector('.replies');
            replies.classList.remove('hidden');
            const div = document.createElement('div');
            div.className = 'flex gap-2';
            div.innerHTML =
                `<div class="w-7 h-7 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">AK</div><div><p class="text-xs"><span class="font-semibold">@you</span> <span class="text-zinc-500 ml-1">Just now</span></p><p class="text-xs text-zinc-300 mt-1">${text}</p></div>`;
            replies.appendChild(div);
            input.value = '';
            form.classList.add('hidden');
        }

        function toggleReplies(btn) {
            const comment = btn.closest('.flex-1');
            const replies = comment.querySelector('.replies');
            replies.classList.toggle('hidden');
            btn.textContent = replies.classList.contains('hidden') ? btn.textContent.replace('▼', '▶') : btn.textContent
                .replace('▶', '▼');
        }

        function seek(e, track) {
            const rect = track.getBoundingClientRect();
            const pct = Math.min(100, Math.max(0, ((e.clientX - rect.left) / rect.width) * 100));
            document.getElementById('progressFill').style.width = pct + '%';
        }




        const video = document.getElementById('videoEl');
        const playIcon = document.getElementById('playIcon');
        const ctrlIcon = document.getElementById('ctrlIcon');
        const progressFill = document.getElementById('progressFill');
        const timeDisplay = document.getElementById('timeDisplay');
        const playOverlay = document.getElementById('playOverlay');
        const speeds = [0.5, 1, 1.25, 1.5, 2];
        let speedIndex = 1;

        function fmt(s) {
            const m = Math.floor(s / 60);
            const sec = Math.floor(s % 60).toString().padStart(2, '0');
            return `${m}:${sec}`;
        }

        function togglePlay() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        }

        video.addEventListener('play', () => {
            const pause = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />';
            playIcon.innerHTML = pause;
            ctrlIcon.innerHTML = pause;
            playOverlay.classList.add('opacity-0');
        });

        video.addEventListener('pause', () => {
            const play = '<path d="M8 5v14l11-7z" />';
            playIcon.innerHTML = play;
            ctrlIcon.innerHTML = play;
            playOverlay.classList.remove('opacity-0');
        });

        video.addEventListener('timeupdate', () => {
            if (!video.duration) return;
            const pct = (video.currentTime / video.duration) * 100;
            progressFill.style.width = pct + '%';
            timeDisplay.textContent = `${fmt(video.currentTime)} / ${fmt(video.duration)}`;
        });

        function seek(e, bar) {
            if (!video.duration) return;
            const rect = bar.getBoundingClientRect();
            const pct = Math.min(1, Math.max(0, (e.clientX - rect.left) / rect.width));
            video.currentTime = pct * video.duration;
        }

        function toggleMute() {
            video.muted = !video.muted;
            const on = '<path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/>';
            const off = '<path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>';
            document.getElementById('muteIcon').innerHTML = video.muted ? off : on;
        }

        function setVolume(val) {
            video.volume = val;
            video.muted = val == 0;
        }

        function cycleSpeed(btn) {
            speedIndex = (speedIndex + 1) % speeds.length;
            video.playbackRate = speeds[speedIndex];
            btn.textContent = speeds[speedIndex] + 'x';
        }

        function toggleFullscreen() {
            const container = video.closest('.relative');
            if (!document.fullscreenElement) {
                container.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        }
    </script>
    </script>
</body>

</html>
