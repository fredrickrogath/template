<template>
        <v-col>
                <div class="flex bg-red-800">
                    <div class="col-6">
                        <spark-line></spark-line>
                    </div>
                    <div class="bg-green-800 col-6">
                        hello
                    </div>
                    <!-- <spark-line></spark-line> -->
                    <!-- <spark-line></spark-line> -->
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

export default {
    components: { StatisticCards, TableData, SparkLine },
    data() {
        return {};
    },
};
</script>
