<template>
    <div>
        <header
        class="hover:cursor-pointer grid grid-cols-6 items-center p-3 border-b border-b-gray-300"
    >
        <div class="">
            <img
                src="https://picsum.photos/50/50"
                class="rounded-full w-10 h-10"
            />
        </div>

        <div class="col-span-4 text-sm font-semibold">felister</div>

        <!-- begining of option -->
        <div class="relative inline-block text-left">
            <div>
                <div class="">
                    <svg
                        @click="toggleOptions"
                        xmlns="http://www.w3.org/2000/svg"
                        class="hover:cursor-pointer ransition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300 h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                        />
                    </svg>
                </div>
            </div>

            <transition name="post-options">
                <div
                    v-if="optionsAreVisible"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-gray-200 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="menu-button"
                    tabindex="-1"
                >
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-0"
                            >Edit</a
                        >
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-1"
                            >Duplicate</a
                        >
                    </div>
                    <div class="py-1" role="none">
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-2"
                            >Archive</a
                        >
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-3"
                            >Move</a
                        >
                    </div>
                    <div class="py-1" role="none">
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-4"
                            >Share</a
                        >
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-5"
                            >Add to favorites</a
                        >
                    </div>
                    <div class="py-1" role="none">
                        <a
                            href="#"
                            class="hover:bg-gray-300 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-6"
                            >Delete</a
                        >
                    </div>
                </div>
            </transition>
        </div>
        <!-- end of options -->
    </header>

    <div>
        <img
            src="https://picsum.photos/500/500"
            class="transition ease-in-out delay-190 hover:-translate-y-1 hover:scale-110 duration-300"
        />
    </div>

    <div
        class="hover:cursor-pointer flex flex-col p-4 gap-3"
        @click="switchToComments"
    >
        <div class="flex flex-row gap-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                />
            </svg>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                />
            </svg>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                />
            </svg>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                />
            </svg>
        </div>

        <div class="text-sm font-semibold">11,552 Likes</div>

        <div class="text-sm">
            <span class="font-semibold">gnfi</span> Saat ini Indonesia memiliki
            34 provinsi, jumlah tersebut diproyeksi bertambah seiring dengan
            adanya usulan 30 Daerah Otonomi Baru (DOB) khusus untuk provinsi,
            dan 9 diantaranya berada di Pulau Jawa.
        </div>

        <div class="text-gray-500 text-sm">View all 877 comments</div>

        <div class="text-gray-400 text-xs">2 HOURS AGO</div>
    </div>

    <footer></footer>
    </div>
</template>

<script>
export default {
    //   inject:['switchToComments'],
    data() {
        return {
            optionsAreVisible: false,
        };
    },
    methods: {
        toggleOptions() {
            this.optionsAreVisible = !this.optionsAreVisible;
        },
    },
};
</script>

<style scoped>
.post-options-enter-from {
    opacity: 0;
    transform: translateY(50px);
}
.post-options-enter-active {
    transition: all 0.5s ease-out;
}
.post-options-enter-to {
    opacity: 1;
    transform: translateY(0);
}
.post-options-leave-from {
    opacity: 1;
    transform: translateY(0);
}
.post-options-leave-active {
    transition: all 0.5s ease-in;
}
.post-options-leave-to {
    opacity: 0;
    transform: translateY(-30px);
}
</style>
