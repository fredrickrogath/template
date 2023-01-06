<template>
    <app-layout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <v-row>
            <v-col
                v-if="showSideBarBeforeSrollDown"
                sm="3"
                :md="dynamicColForSideBarComputed"
                offset-lg="1"
            >
                <!-- md 2 inaipa sidebar area besides the main content area -->
                <side-bar></side-bar>
            </v-col>
            <v-col
                sm="9"
                :md="contentFullWidthWhenSideBarHidesComputed"
                offset-sm="7"
            >

            <post-card></post-card>
                <!-- md 10 inaipa main content area besides the sidebar area -->
                <!-- <div class="py-0">
                    <div v-if="showSpinner" class="text-center py-2">
                        <v-progress-circular
                            class="dark:text-white text-purple-500"
                            :size="40"
                            indeterminate
                        ></v-progress-circular>
                    </div>
                </div> -->
            </v-col>
        </v-row>
    </app-layout>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
import gsap from "gsap";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import SideBar from "./Components/SideBar.vue";

import PostCard from "./Components/PostCard.vue";

export default {
    components: {
        AppLayout,
        Welcome,
        PostCard,
        SideBar,
    },

    data() {
        return {
    
            contentFullWidthWhenSideBarHides: 10,
            contentForCardsWhenSideBarHides: 4,
            showSideBarBeforeSrollDown: true,
            dynamicColForSideBar: 2,
            
        };
    },

    methods: {},

    computed: {
        counter() {
            return this.$store.getters["numbers/finalCounter2"];    
        },

        dynamicColForSideBarComputed() {
            return this.dynamicColForSideBar;
        },
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },
        contentNoPaddingWhenSideBarHidesComputed() {
            return this.contentNoPaddingWhenSideBarHides;
        },
    },

    // watch: {
    //     showSideBarBeforeSrollDown(val) {
    //         if (val) {
    //             this.contentForCardsWhenSideBarHides = 4;
    //             this.dynamicColForSideBar = 2;
    //             this.contentFullWidthWhenSideBarHides = 10;
    //             this.contentNoPaddingWhenSideBarHides = "max-w-7xl";
    //         } else {
    //             this.contentForCardsWhenSideBarHides = 3;
    //             this.dynamicColForSideBar = 0;
    //             this.contentFullWidthWhenSideBarHides = 12;
    //             this.contentNoPaddingWhenSideBarHides = "";
    //         }
    //     },
    //     number(n) {
    //         gsap.to(this, { duration: 5, tweened: Number(n) || 0 });
    //     },
    // },
};
</script>
