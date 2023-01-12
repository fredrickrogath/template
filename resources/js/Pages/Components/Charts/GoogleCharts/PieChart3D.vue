<template>
    <div class="component-wrapper py-6">
        <GChart type="PieChart" :data="chartData" :options="chartOptions" />
    </div>
</template>

<script>
import { GChart } from "vue-google-charts/legacy";

export default {
    components: {
        GChart,
    },

    data() {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            chartData: [
                ["Language", "Speakers (in millions)"],
                ["Assamese", 13],
                ["Bengali", 83],
                ["Bodo", 1.4],
                ["Dogri", 2.3],
                ["Gujarati", 46],
                ["Hindi", 300],
                ["Kannada", 38],
                ["Kashmiri", 5.5],
                ["Konkani", 5],
                ["Maithili", 20],
                ["Malayalam", 33],
                ["Manipuri", 1.5],
                ["Marathi", 72],
                ["Nepali", 2.9],
                ["Oriya", 33],
                ["Punjabi", 29],
                ["Sanskrit", 0.01],
                ["Santhali", 6.5],
                ["Sindhi", 2.5],
                ["Tamil", 61],
                ["Telugu", 74],
                ["Urdu", 52],
            ],
            chartOptions: {
                chart: {
                    title: "Company Performance",
                    subtitle: "Sales, Expenses, and Profit: 2014-2017",
                },
                chartArea: {width: 400, height: 300, backgroundColor: {fill: 'transparent'}},
                is3D: true,
            },
        };
    },
};
</script>
