<template>
    <v-card
        :dark="isDark"
        class="pa-12"
        flat
        max-width="200px"
        style="position: fixed"
        v-if="$vuetify.breakpoint.smAndUp"
    >
        <v-card width="256">
            <v-navigation-drawer floating permanent>
                <v-list dense rounded class="text-center">
                    <v-list-item
                        v-for="(item, i) in items"
                        :key="item.title"
                        link
                        class="border-r-4 border-indigo-500"
                        :class="
                            route().current($page.props.page + item.route)
                                ? 'bg-indigo-100 dark:bg-gray-900'
                                : 'bg-gray-50 dark:bg-gray-900'
                        "
                        :style="[
                            isDark &&
                            route().current($page.props.page + item.route)
                                ? { 'background-color': '#6366F1' }
                                : { background: '' },
                        ]"
                    >
                        <my-custom-link
                            :href="route($page.props.page + item.route)"
                            :active="
                                route().current($page.props.page + item.route)
                            "
                        >
                            <v-list-item-icon>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title class="py-1 font-bold">{{
                                    item.title
                                }}</v-list-item-title>
                            </v-list-item-content>
                        </my-custom-link>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-card>

        <div class="h-11"></div>

        <v-card elevation="12" width="256">
            <v-navigation-drawer floating permanent>
                <v-list dense rounded class="text-center">
                    <v-list-item
                        v-for="(item, i) in items"
                        :key="item.title"
                        v-if="i < 2"
                        link
                        class="border-r-4 border-indigo-500"
                        :class="
                            route().current($page.props.page + item.route)
                                ? 'bg-indigo-100 dark:bg-gray-800'
                                : 'bg-gray-50 dark:bg-gray-900'
                        "
                        :style="[
                            isDark &&
                            !route().current($page.props.page + item.route)
                                ? { 'background-color': '#1e1e1e' }
                                : { background: '' },
                        ]"
                    >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-card>
    </v-card>

    <v-expansion-panels style="position: fixed" v-else :dark="isDark">
        <v-expansion-panel>
            <v-expansion-panel-header> SideBar </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-card :dark="isDark" class="pa-12" flat>
                    <v-card elevation="12" width="256">
                        <v-navigation-drawer floating permanent>
                            <v-list dense rounded class="text-center">
                                <v-list-item
                                    v-for="item in items"
                                    :key="item.title"
                                    link
                                >
                                    <v-list-item-icon>
                                        <v-icon>{{ item.icon }}</v-icon>
                                    </v-list-item-icon>

                                    <v-list-item-content>
                                        <v-list-item-title class="font-bold">{{
                                            item.title
                                        }}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-navigation-drawer>
                    </v-card>
                </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<script>
import MyCustomLink from "@/Jetstream/MyCustomLink";

export default {
    components: {
        MyCustomLink,
    },

    data() {
        return {
            items: [
                {
                    title: "Home",
                    icon: "mdi-view-dashboard-outline",
                    route: "",
                },
                { title: "pageOne", icon: "mdi-numeric-1", route: ".pageOne" },
                { title: "pageTwo", icon: "mdi-numeric-2", route: ".pageTwo" },
                {
                    title: "pageThree",
                    icon: "mdi-numeric-3",
                    route: ".pageThree",
                },
                { title: "pageFour", icon: "mdi-numeric-4", route: ".pageFour" },
                { title: "pageFive", icon: "mdi-numeric-5", route: ".pageFive" },
                { title: "pageSix", icon: "mdi-numeric-6", route: ".pageSix" },
                {
                    title: "pageSeven",
                    icon: "mdi-numeric-7",
                    route: ".pageSeven",
                },
                // { title: 'About8', icon: 'mdi-forum' },
            ],
        };
    },

    methods: {
        select: function (path) {
            if (path.extension !== "") {
                window.location.href = path.url + path.extension;
            }
            window.location.href = path.url;
        },
    },
};
</script>
