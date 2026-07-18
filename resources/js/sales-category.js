import Chart from 'chart.js/auto';


const canvas = document.getElementById(
    'salesCategoryChart'
);


if(canvas){

    const categoryData = window.salesByCategory ?? [];


    new Chart(canvas, {

        type: 'pie',

        data: {

            labels: categoryData.map(
                item => item.name
            ),

            datasets:[
                {
                    data: categoryData.map(
                        item => item.total_sales
                    )
                }
            ]

        },

        options:{
            responsive:true,

            plugins:{
                legend:{
                    position:'bottom'
                }
            }
        }

    });

}