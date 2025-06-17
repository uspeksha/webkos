<div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
    <nav class="fixed bottom-5 w-full max-w-[640px] mx-auto px-5 z-50">
        <div class="grid grid-cols-4 gap-2 h-fit rounded-[40px] px-5 py-4 bg-[#1E1E1E]/95 shadow-xl border border-white/10">
            <a href="{{ route('home') }}" class="flex flex-col items-center text-center gap-1 transition-all duration-300 hover:scale-105 active:scale-95">
                <img src="assets/images/icons/global-green.svg" class="w-7 h-7" alt="icon">
                <span class="font-semibold text-xs text-white">Discover</span>
            </a>
            <a href="{{ route('check-booking') }}" class="flex flex-col items-center text-center gap-1 transition-all duration-300 hover:scale-105 active:scale-95">
                <img src="assets/images/icons/note-favorite.svg" class="w-7 h-7" alt="icon">
                <span class="font-semibold text-xs text-white">Orders</span>
            </a>
            <a href="{{ route('find-kos') }}" class="flex flex-col items-center text-center gap-1 transition-all duration-300 hover:scale-105 active:scale-95">
                <img src="assets/images/icons/search-status.svg" class="w-7 h-7" alt="icon">
                <span class="font-semibold text-xs text-white">Find</span>
            </a>
            <a href="#" class="flex flex-col items-center text-center gap-1 transition-all duration-300 hover:scale-105 active:scale-95">
                <img src="assets/images/icons/24-support.svg" class="w-7 h-7" alt="icon">
                <span class="font-semibold text-xs text-white">Help</span>
            </a>
        </div>
    </nav>
</div>
