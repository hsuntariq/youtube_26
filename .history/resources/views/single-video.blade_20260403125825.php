<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>YouTube Video Page Clone - Watch & Engage</title>
    <!-- Font Awesome 6 (Free Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Roboto for modern YouTube-like look -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0f0f0f;
            color: #f1f1f1;
            line-height: 1.5;
        }

        /* Container and layout */
        .app-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 1rem 1.5rem 2rem;
        }

        /* Header (minimal YouTube style) */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #2a2a2a;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .logo-icon {
            font-size: 2rem;
            color: #ff0000;
        }
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .search-bar {
            display: flex;
            background: #121212;
            border: 1px solid #303030;
            border-radius: 40px;
            overflow: hidden;
        }
        .search-bar input {
            background: #0f0f0f;
            border: none;
            padding: 0.6rem 1rem;
            width: 300px;
            color: white;
            font-size: 0.9rem;
            outline: none;
        }
        .search-bar button {
            background: #222;
            border: none;
            padding: 0 1rem;
            color: #aaa;
            cursor: pointer;
            transition: 0.2s;
        }
        .search-bar button:hover {
            background: #3a3a3a;
            color: white;
        }
        .header-icons {
            display: flex;
            gap: 1.2rem;
            font-size: 1.3rem;
            color: #ddd;
        }

        /* MAIN GRID: Video + Suggestions */
        .main-grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 1.8rem;
        }

        /* Video Player Section */
        .video-section {
            width: 100%;
        }
        .video-wrapper {
            position: relative;
            width: 100%;
            background: black;
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 16 / 9;
        }
        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .video-info {
            margin-top: 1rem;
        }
        .video-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .channel-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-bottom: 1px solid #2a2a2a;
            padding-bottom: 0.8rem;
            margin-bottom: 1rem;
        }
        .channel {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .avatar {
            background: #3a6ea5;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .channel-name {
            font-weight: 700;
            font-size: 1rem;
        }
        .subscribers {
            font-size: 0.75rem;
            color: #aaa;
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
        }
        .action-btn {
            background: #272727;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: 0.2s;
        }
        .action-btn:hover {
            background: #3a3a3a;
        }
        .description {
            background: #1a1a1a;
            padding: 0.8rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        .desc-stats {
            color: #aaa;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        /* COMMENTS SECTION */
        .comments-section {
            margin-top: 1.5rem;
        }
        .comments-header {
            display: flex;
            align-items: baseline;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        .comment-count {
            font-weight: 700;
            font-size: 1.1rem;
        }
        .sort-by {
            color: #aaa;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            cursor: pointer;
        }
        .add-comment {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            align-items: flex-start;
        }
        .comment-avatar {
            background: #2b6a9f;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .comment-input-area {
            flex: 1;
        }
        .comment-input-area input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #3a3a3a;
            padding: 0.6rem 0;
            color: white;
            outline: none;
            font-size: 0.9rem;
        }
        .comment-input-area input:focus {
            border-bottom-color: #3ea6ff;
        }
        .comment-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 0.6rem;
        }
        .cancel-btn, .comment-btn {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }
        .cancel-btn {
            background: transparent;
            color: #ccc;
        }
        .comment-btn {
            background: #3ea6ff;
            color: #0f0f0f;
        }
        .comment-btn.disabled {
            background: #3a6a8f;
            cursor: not-allowed;
            opacity: 0.6;
        }
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            max-height: 500px;
            overflow-y: auto;
            padding-right: 5px;
        }
        .comment-item {
            display: flex;
            gap: 1rem;
        }
        .comment-body {
            flex: 1;
        }
        .commenter-name {
            font-weight: 700;
            font-size: 0.85rem;
            display: inline-block;
            margin-right: 0.5rem;
        }
        .comment-time {
            font-size: 0.7rem;
            color: #aaa;
        }
        .comment-text {
            margin: 0.3rem 0 0.4rem;
            font-size: 0.9rem;
        }
        .comment-actions-sm {
            display: flex;
            gap: 1rem;
            margin-top: 0.3rem;
            font-size: 0.75rem;
            color: #aaa;
        }
        .comment-actions-sm span {
            cursor: pointer;
        }
        .comment-actions-sm span:hover {
            color: #ccc;
        }

        /* SUGGESTIONS SIDEBAR */
        .suggestions {
            width: 100%;
        }
        .suggestion-item {
            display: flex;
            gap: 0.8rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: 0.1s;
            border-radius: 8px;
            padding: 0.3rem;
        }
        .suggestion-item:hover {
            background: #1a1a1a;
        }
        .suggestion-thumb {
            width: 168px;
            min-width: 168px;
            height: 94px;
            background-color: #2a2a2a;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            background-size: cover;
            background-position: center;
        }
        .suggestion-info {
            flex: 1;
        }
        .suggestion-title {
            font-weight: 500;
            font-size: 0.9rem;
            line-height: 1.3;
            margin-bottom: 0.2rem;
        }
        .suggestion-channel {
            font-size: 0.75rem;
            color: #aaa;
        }
        .suggestion-views {
            font-size: 0.7rem;
            color: #7e7e7e;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .main-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .suggestions {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1rem;
            }
            .suggestion-item {
                flex-direction: column;
                gap: 0.5rem;
            }
            .suggestion-thumb {
                width: 100%;
                height: 150px;
            }
            .search-bar input {
                width: 180px;
            }
        }

        @media (max-width: 550px) {
            .app-container {
                padding: 0.8rem;
            }
            .action-buttons {
                gap: 0.5rem;
            }
            .action-btn span {
                display: none;
            }
            .action-btn i {
                margin: 0;
            }
            .action-btn {
                padding: 0.5rem;
            }
        }

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #1f1f1f;
        }
        ::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="app-container">
    <!-- Header -->
    <div class="header">
        <div class="logo-area">
            <i class="fab fa-youtube logo-icon"></i>
            <span class="logo-text">YouTubeClone</span>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search" id="searchInput">
            <button id="searchBtn"><i class="fas fa-search"></i></button>
        </div>
        <div class="header-icons">
            <i class="fas fa-video"></i>
            <i class="fas fa-bell"></i>
            <i class="fas fa-user-circle"></i>
        </div>
    </div>

    <!-- Main Grid: Video + Suggestions -->
    <div class="main-grid">
        <!-- Left: Video Player & Comments -->
        <div class="video-section">
            <div class="video-wrapper">
                <!-- Embed a high-quality sample video (YouTube's official "The Rise of AI" style but using an official demo video that's safe) -->
                <iframe id="mainVideoFrame" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=6k2nZ5oWqLkP9c3E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="video-info">
                <div class="video-title" id="videoTitle">Rick Astley - Never Gonna Give You Up (Official Music Video)</div>
                <div class="channel-stats">
                    <div class="channel">
                        <div class="avatar">RA</div>
                        <div>
                            <div class="channel-name">Rick Astley</div>
                            <div class="subscribers">14.2M subscribers</div>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <div class="action-btn"><i class="fas fa-thumbs-up"></i> <span>1.2M</span></div>
                        <div class="action-btn"><i class="fas fa-thumbs-down"></i> <span>12K</span></div>
                        <div class="action-btn"><i class="fas fa-share"></i> <span>Share</span></div>
                        <div class="action-btn"><i class="fas fa-download"></i> <span>Save</span></div>
                    </div>
                </div>
                <div class="description">
                    <div class="desc-stats">1,234,567 views  •  Premiered on Mar 25, 2010</div>
                    <div>Official music video for "Never Gonna Give You Up" by Rick Astley. Listen to Rick Astley: https://RickAstley.lnk.to/ListenYD Subscribe to the official Rick Astley YouTube channel: https://RickAstley.lnk.to/SubscribeYD ...</div>
                </div>
            </div>

            <!-- COMMENTS SECTION -->
            <div class="comments-section">
                <div class="comments-header">
                    <div class="comment-count" id="commentCount">0 Comments</div>
                    <div class="sort-by"><i class="fas fa-sort"></i> Sort by</div>
                </div>
                <div class="add-comment">
                    <div class="comment-avatar">U</div>
                    <div class="comment-input-area">
                        <input type="text" id="commentInput" placeholder="Add a public comment...">
                        <div class="comment-actions">
                            <button class="cancel-btn" id="cancelCommentBtn">CANCEL</button>
                            <button class="comment-btn disabled" id="submitCommentBtn" disabled>COMMENT</button>
                        </div>
                    </div>
                </div>
                <div class="comments-list" id="commentsList">
                    <!-- Sample comments pre-loaded -->
                    <div class="comment-item">
                        <div class="comment-avatar" style="background: #9b4d96;">JD</div>
                        <div class="comment-body">
                            <div><span class="commenter-name">Jessica Drew</span><span class="comment-time">2 days ago</span></div>
                            <div class="comment-text">This song never gets old! Classic 80s vibe 🔥</div>
                            <div class="comment-actions-sm"><span><i class="far fa-thumbs-up"></i> 342</span><span><i class="far fa-thumbs-down"></i></span><span>Reply</span></div>
                        </div>
                    </div>
                    <div class="comment-item">
                        <div class="comment-avatar" style="background: #2c6e2c;">MK</div>
                        <div class="comment-body">
                            <div><span class="commenter-name">Mike K.</span><span class="comment-time">5 days ago</span></div>
                            <div class="comment-text">One of the most iconic rickrolls of all time. Respect to Rick!</div>
                            <div class="comment-actions-sm"><span><i class="far fa-thumbs-up"></i> 1.1K</span><span><i class="far fa-thumbs-down"></i></span><span>Reply</span></div>
                        </div>
                    </div>
                    <div class="comment-item">
                        <div class="comment-avatar" style="background: #b45f1b;">TL</div>
                        <div class="comment-body">
                            <div><span class="commenter-name">TechLover</span><span class="comment-time">1 week ago</span></div>
                            <div class="comment-text">The production quality was amazing for its time!</div>
                            <div class="comment-actions-sm"><span><i class="far fa-thumbs-up"></i> 203</span><span><i class="far fa-thumbs-down"></i></span><span>Reply</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUGGESTIONS SIDEBAR -->
        <div class="suggestions">
            <h3 style="font-size:1rem; margin-bottom:0.8rem; font-weight:500;">Recommended</h3>
            <div id="suggestionsContainer">
                <!-- dynamic suggestions via JS -->
            </div>
        </div>
    </div>
</div>

<script>
    // ---------- SUGGESTION DATA ----------
    const suggestionsData = [
        {
            id: "s1",
            title: "The Weeknd - Blinding Lights (Official Video)",
            channel: "TheWeekndVEVO",
            views: "450M views",
            thumbnail: "https://img.youtube.com/vi/4NRXx6U8ABQ/hqdefault.jpg",
            videoId: "4NRXx6U8ABQ"
        },
        {
            id: "s2",
            title: "Dua Lipa - Levitating ft. DaBaby",
            channel: "Dua Lipa",
            views: "710M views",
            thumbnail: "https://img.youtube.com/vi/TUVcZfQe-Kw/hqdefault.jpg",
            videoId: "TUVcZfQe-Kw"
        },
        {
            id: "s3",
            title: "JavaScript Tutorial for Beginners: Learn JS in 1 Hour",
            channel: "Programming with Mosh",
            views: "4.2M views",
            thumbnail: "https://img.youtube.com/vi/W6NZfCO5SIk/hqdefault.jpg",
            videoId: "W6NZfCO5SIk"
        },
        {
            id: "s4",
            title: "Top 10 Most Beautiful Places in Iceland",
            channel: "TravelXP",
            views: "1.8M views",
            thumbnail: "https://img.youtube.com/vi/7EOr ${'f'}_vJ0tY/hqdefault.jpg",
            videoId: "7EOf_vJ0tY"
        },
        {
            id: "s5",
            title: "Marques Brownlee - Tesla Cybertruck Review!",
            channel: "MKBHD",
            views: "9.1M views",
            thumbnail: "https://img.youtube.com/vi/tlPfGx0n8KQ/hqdefault.jpg",
            videoId: "tlPfGx0n8KQ"
        },
        {
            id: "s6",
            title: "PewDiePie - Minecraft EP 1",
            channel: "PewDiePie",
            views: "23M views",
            thumbnail: "https://img.youtube.com/vi/6J7piO2F7wM/hqdefault.jpg",
            videoId: "6J7piO2F7wM"
        }
    ];

    // Fix the thumbnail for Iceland video properly
    suggestionsData[3].thumbnail = "https://img.youtube.com/vi/7EOf_vJ0tY/hqdefault.jpg";

    // Main video details mapping (for suggestion clicks)
    const videoDetailsMap = {
        "dQw4w9WgXcQ": {
            title: "Rick Astley - Never Gonna Give You Up (Official Music Video)",
            channel: "Rick Astley",
            subs: "14.2M subscribers",
            views: "1,234,567 views",
            desc: "Official music video for 'Never Gonna Give You Up' by Rick Astley. Listen to Rick Astley: https://RickAstley.lnk.to/ListenYD Subscribe to the official Rick Astley YouTube channel..."
        },
        "4NRXx6U8ABQ": {
            title: "The Weeknd - Blinding Lights (Official Video)",
            channel: "TheWeekndVEVO",
            subs: "25M subscribers",
            views: "450M views",
            desc: "Official music video by The Weeknd performing 'Blinding Lights'. © 2020 Republic Records."
        },
        "TUVcZfQe-Kw": {
            title: "Dua Lipa - Levitating ft. DaBaby",
            channel: "Dua Lipa",
            subs: "19M subscribers",
            views: "710M views",
            desc: "Official music video for Dua Lipa - Levitating featuring DaBaby."
        },
        "W6NZfCO5SIk": {
            title: "JavaScript Tutorial for Beginners: Learn JS in 1 Hour",
            channel: "Programming with Mosh",
            subs: "3.2M subscribers",
            views: "4.2M views",
            desc: "In this JavaScript tutorial, you will learn the fundamentals of JS in just one hour."
        },
        "7EOf_vJ0tY": {
            title: "Top 10 Most Beautiful Places in Iceland",
            channel: "TravelXP",
            subs: "890K subscribers",
            views: "1.8M views",
            desc: "Discover the breathtaking landscapes and stunning waterfalls of Iceland."
        },
        "tlPfGx0n8KQ": {
            title: "Marques Brownlee - Tesla Cybertruck Review!",
            channel: "MKBHD",
            subs: "16M subscribers",
            views: "9.1M views",
            desc: "This is the Cybertruck. It's wild. Here's everything you need to know."
        },
        "6J7piO2F7wM": {
            title: "PewDiePie - Minecraft EP 1",
            channel: "PewDiePie",
            subs: "111M subscribers",
            views: "23M views",
            desc: "Welcome back to Minecraft! Let's build a new world."
        }
    };

    // Helper: Update main video content & info
    function updateMainVideo(videoId) {
        const iframe = document.getElementById('mainVideoFrame');
        iframe.src = `https://www.youtube.com/embed/${videoId}?si=update&autoplay=0`;
        const details = videoDetailsMap[videoId] || videoDetailsMap["dQw4w9WgXcQ"];
        document.getElementById('videoTitle').innerText = details.title;
        // Update channel area and description
        const channelDiv = document.querySelector('.channel .channel-name');
        const subSpan = document.querySelector('.channel .subscribers');
        const descDiv = document.querySelector('.description');
        const viewsSpan = document.querySelector('.desc-stats');

        channelDiv.innerText = details.channel;
        subSpan.innerText = details.subs;
        viewsSpan.innerText = `${details.views}  •  Premiered on ` + new Date().toLocaleDateString();
        descDiv.innerHTML = `<div class="desc-stats">${details.views}  •  Updated recently</div><div>${details.desc}</div>`;

        // Also update like count just for fun (static style)
        const likeBtn = document.querySelector('.action-btn:first-child span');
        if(likeBtn) likeBtn.innerText = (Math.floor(Math.random() * 500) + 100) + "K";

        // Scroll to top on video change (nice UX)
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Render suggestions
    function renderSuggestions() {
        const container = document.getElementById('suggestionsContainer');
        if(!container) return;
        container.innerHTML = '';
        suggestionsData.forEach(sugg => {
            const suggestionDiv = document.createElement('div');
            suggestionDiv.className = 'suggestion-item';
            suggestionDiv.setAttribute('data-video-id', sugg.videoId);
            suggestionDiv.innerHTML = `
                <div class="suggestion-thumb" style="background-image: url('${sugg.thumbnail}'); background-size: cover;"></div>
                <div class="suggestion-info">
                    <div class="suggestion-title">${sugg.title}</div>
                    <div class="suggestion-channel">${sugg.channel}</div>
                    <div class="suggestion-views">${sugg.views}</div>
                </div>
            `;
            suggestionDiv.addEventListener('click', (e) => {
                e.stopPropagation();
                updateMainVideo(sugg.videoId);
            });
            container.appendChild(suggestionDiv);
        });
    }

    // ---------- COMMENTS MANAGEMENT ----------
    let comments = [
        { id: 1, name: "Jessica Drew", time: "2 days ago", text: "This song never gets old! Classic 80s vibe 🔥", likes: 342, avatarBg: "#9b4d96", initial: "JD" },
        { id: 2, name: "Mike K.", time: "5 days ago", text: "One of the most iconic rickrolls of all time. Respect to Rick!", likes: 1100, avatarBg: "#2c6e2c", initial: "MK" },
        { id: 3, name: "TechLover", time: "1 week ago", text: "The production quality was amazing for its time!", likes: 203, avatarBg: "#b45f1b", initial: "TL" }
    ];

    function renderComments() {
        const commentsContainer = document.getElementById('commentsList');
        const commentCountSpan = document.getElementById('commentCount');
        if(!commentsContainer) return;
        commentsContainer.innerHTML = '';
        comments.forEach(comment => {
            const commentEl = document.createElement('div');
            commentEl.className = 'comment-item';
            commentEl.innerHTML = `
                <div class="comment-avatar" style="background: ${comment.avatarBg};">${comment.initial}</div>
                <div class="comment-body">
                    <div><span class="commenter-name">${escapeHtml(comment.name)}</span><span class="comment-time">${comment.time}</span></div>
                    <div class="comment-text">${escapeHtml(comment.text)}</div>
                    <div class="comment-actions-sm">
                        <span><i class="far fa-thumbs-up"></i> ${comment.likes}</span>
                        <span><i class="far fa-thumbs-down"></i></span>
                        <span>Reply</span>
                    </div>
                </div>
            `;
            commentsContainer.appendChild(commentEl);
        });
        commentCountSpan.innerText = `${comments.length} Comments`;
    }

    function escapeHtml(str) {
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        }).replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, function(c) {
            return c;
        });
    }

    // Add new comment
    function addComment(text) {
        if(!text.trim()) return;
        const newComment = {
            id: Date.now(),
            name: "CurrentUser",
            time: "Just now",
            text: text.trim(),
            likes: 0,
            avatarBg: "#3ea6ff",
            initial: "CU"
        };
        comments.unshift(newComment);
        renderComments();
        // Clear input and disable button
        document.getElementById('commentInput').value = '';
        const submitBtn = document.getElementById('submitCommentBtn');
        submitBtn.disabled = true;
        submitBtn.classList.add('disabled');
    }

    // Input listener for comment
    function setupCommentEvents() {
        const commentInput = document.getElementById('commentInput');
        const submitBtn = document.getElementById('submitCommentBtn');
        const cancelBtn = document.getElementById('cancelCommentBtn');

        function toggleSubmit() {
            if(commentInput.value.trim() !== "") {
                submitBtn.disabled = false;
                submitBtn.classList.remove('disabled');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add('disabled');
            }
        }

        commentInput.addEventListener('input', toggleSubmit);
        submitBtn.addEventListener('click', () => {
            if(!submitBtn.disabled) {
                addComment(commentInput.value);
                toggleSubmit();
            }
        });
        cancelBtn.addEventListener('click', () => {
            commentInput.value = '';
            toggleSubmit();
        });
    }

    // Search functionality: just filter suggestions (mock search)
    function setupSearch() {
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        function performSearch() {
            const query = searchInput.value.trim().toLowerCase();
            if(query === "") {
                renderSuggestions();
                return;
            }
            const filtered = suggestionsData.filter(s => s.title.toLowerCase().includes(query) || s.channel.toLowerCase().includes(query));
            const container = document.getElementById('suggestionsContainer');
            container.innerHTML = '';
            if(filtered.length === 0) {
                container.innerHTML = '<div style="color:#aaa; padding:1rem;">No results found</div>';
                return;
            }
            filtered.forEach(sugg => {
                const suggestionDiv = document.createElement('div');
                suggestionDiv.className = 'suggestion-item';
                suggestionDiv.setAttribute('data-video-id', sugg.videoId);
                suggestionDiv.innerHTML = `
                    <div class="suggestion-thumb" style="background-image: url('${sugg.thumbnail}'); background-size: cover;"></div>
                    <div class="suggestion-info">
                        <div class="suggestion-title">${sugg.title}</div>
                        <div class="suggestion-channel">${sugg.channel}</div>
                        <div class="suggestion-views">${sugg.views}</div>
                    </div>
                `;
                suggestionDiv.addEventListener('click', () => updateMainVideo(sugg.videoId));
                container.appendChild(suggestionDiv);
            });
        }
        searchBtn.addEventListener('click', performSearch);
        searchInput.addEventListener('keypress', (e) => { if(e.key === 'Enter') performSearch(); });
    }

    // Initialize page
    function init() {
        renderSuggestions();
        renderComments();
        setupCommentEvents();
        setupSearch();
        // Ensure the main video's like count matches dynamic for demo
        const likeSpan = document.querySelector('.action-btn:first-child span');
        if(likeSpan && likeSpan.innerText === "1.2M") {} // keep as is
    }

    init();
</script>
</body>
</html>
