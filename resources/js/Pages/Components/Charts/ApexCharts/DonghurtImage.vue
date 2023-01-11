<template>
    <div>
        <apexchart
            type="donut"
            width="380"
            :options="chartOptions"
            :series="series"
        ></apexchart>
    </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";

export default {
    components: {
        apexchart: VueApexCharts,
    },
    data() {
        return {
            series: [44, 33, 54, 45],
            chartOptions: {
                chart: {
                    width: 100,
                    type: "pie",
                },
                colors: ["#93C3EE", "#E5C6A0", "#669DB5", "#94A74A"],
                fill: {
                    type: "image",
                    opacity: 0.85,
                    image: {
                        src: [
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                        ],
                        width: 25,
                        imagedHeight: 25,
                    },
                },
                stroke: {
                    width: 2,
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ["#111"],
                    },
                    background: {
                        enabled: true,
                        foreColor: "#fff",
                        borderWidth: 1,
                    },
                },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 400,
                            },
                            legend: {
                                position: "bottom",
                            },
                        },
                    },
                ],
            },
        };
    },
};
</script>
