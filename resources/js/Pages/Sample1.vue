<template>
    <v-col
            sm="9"
            :md="contentFullWidthWhenSideBarHidesComputed"
            offset-sm="7"
            cols="12"
        >
    <div
        class="mx-auto sm:px-6 lg:px-8"
        :class="contentNoPaddingWhenSideBarHides"
    >
        <div class="overflow-hidden sm:rounded-lg">
            <!-- <welcome /> -->
            <!-- <v-row>
                <div class="pt-16 sm:pt-4">
                    heloooooooooooooooooooo
                </div>
            </v-row> -->
            <v-row>
                <v-col>
                    <v-row>
                        <v-col
                            :sm="colDivisionCountComputed"
                            :md="contentForCardsWhenSideBarHidesComputed"
                            offset-sm="7"
                            v-for="(post, i) in posts"
                            :key="post.id + i"
                        >
                            <v-card outlined :dark="isDark">
                                <!-- <table-data></table-data> -->
                                <spark-line></spark-line>
                                <!-- <donghurt-image></donghurt-image> -->
                            </v-card>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </div>
    </div>
</v-col>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
import StatisticCards from "../Components/StatisticCards.vue";
import TableData from "../Components/Tables.vue";
import SparkLine from "../Components/SparkLine.vue";
import DonghurtImage from "../Components/Charts/ApexCharts/DonghurtImage.vue";

export default {
    components: { StatisticCards, TableData, SparkLine, DonghurtImage },
//   inject:['switchToComments'],
filters: {
    //For filter long sentences into a limited number of characters
    truncate: function (text, length, suffix) {
        if (text.length > length) {
            return text.substring(0, length) + suffix;
        } else {
            return text;
        }
    },
},

mounted() {
    setInterval(() => {
        this.number = 1111;
    }, 5000);
    var prevScrollpos = window.pageYOffset;
    this.showSpinner = true;
    this.getPosts();
    window.onscroll = () => {
        if (
            window.scrollY + window.innerHeight >=
                document.body.scrollHeight &&
            !this.nextPageLoaded
        ) {
            console.log("fired");
            this.nextPageLoaded = true;
            this.showSpinner = true;
            this.nextPage();
        }

        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            // show sidebar
            // this.showSideBarBeforeSrollDown = true;
            // show topbar
            // this.showTopBar();
        } else {
            // hide sidebar
            // this.showSideBarBeforeSrollDown = false;
            // hide topbar
            // this.hideTopBar();
        }
        prevScrollpos = currentScrollPos;
    };
},

data() {
    return {
        contentFullWidthWhenSideBarHides: 10,
        contentNoPaddingWhenSideBarHides: "max-w-7xl",
        optionsAreVisible: false,
        colDivisionCount: 4, //4 = 3 divisions , 6 = 2 divisions
        showSpinner: false,
        tweened: 0,
        posts: [],
        number: 0,
        page: 1,
    };
},
methods: {
    toggleOptions() {
        this.optionsAreVisible = !this.optionsAreVisible;
    },

    //Get the first post with page=1
    getPosts() {
        console.log("Loading next page");
        axios.get("/posts?page=1").then((response) => {
            this.posts = response.data.data.data;
            //increament url pages
            this.page = this.page + 1;
        });
    },

    nextPage() {
        console.log(this.page);
        console.log("Loading next page");
        axios.get("/posts?page=" + this.page).then((response) => {
            response.data.data.data.forEach((data) => {
                this.posts.push(data);
            });
            setTimeout(() => {
                this.showSpinner = false;
            }, 9000);
            this.nextPageLoaded = false;
        });

        this.page = this.page + 1;
    },

    incrementByOne() {
        this.$store.dispatch("numbers/increment", { value: 5 });
    },

    showTopBar() {
        this.$store.dispatch("showTopBar");
    },

    hideTopBar() {
        this.$store.dispatch("hideTopBar");
    },
},

computed: {
    contentForCardsWhenSideBarHidesComputed() {
        return this.contentForCardsWhenSideBarHides;
    },

    colDivisionCountComputed() {
        return this.colDivisionCount;
    },

    contentFullWidthWhenSideBarHidesComputed() {
        return this.contentFullWidthWhenSideBarHides;
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


<!-- <template>
        <v-col class="bg-red-800">
                <div class="sm:flex sm:bg-indigo-700">
                    <div class="col-4">
                        <spark-line></spark-line>
                    </div>
                    <div class="col-4">
                        <donghurt-image></donghurt-image>
                    </div>
                    <div class="col-4">
                        <spark-line></spark-line>
                    </div>
                </div>
            <div>
                <statistic-cards></statistic-cards>
            </div>
            <div>
                <table-data></table-data>
            </div>
        </v-col>
</template>

<script>
import StatisticCards from "../Components/StatisticCards.vue";
import TableData from "../Components/Tables.vue";
import SparkLine from "../Components/SparkLine.vue";
import DonghurtImage from "../Components/Charts/ApexCharts/DonghurtImage.vue";

export default {
    components: { StatisticCards, TableData, SparkLine, DonghurtImage },
    data() {
        return {};
    },
};
</script> -->
