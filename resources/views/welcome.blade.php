@extends('layouts.app')

@section('content')
<div class="container">
    <table id="dt-table-a">
        <thead>
            <tr>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Year</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="chart"></div>
</div>
<script>
    $(document).ready(function(){
        init();
    });
    var init = ()=>{
        const table = $("#dt-table-a").DataTable(
            {
            ajax: {
                url: 'api/car',
                async: false,
                dataSrc: ''
            },
            columns: [
            { "data": "manufacturer" },
            { "data": "model" },
            { "data": "year" },
            { "data": "country" },
            ]
            }
        );
        
        const tableData = getTableData(table);
        createHighcharts(tableData);
        setTableEvents(table);
    }

    var getTableData = (table)=>{
        const dataArray = [];
        const dataUnique = [];
        const modelUnique = [];
        let unique = true;
       
        // loop table rows
        table.rows({ search: 'applied', page: 'current'}).every(function() {
        const data = this.data();
        if ($.inArray(data.manufacturer, dataUnique) === -1 || $.inArray(data.model, modelUnique) === -1) {
            dataUnique.push(data.manufacturer);
            modelUnique.push(data.model);
            unique = true;
        }else{
            unique = false;
        }
        if(unique){
            var obj = {
            name: data.manufacturer + ' - '+data.model,
            y: Math.floor((Math.random() * 100) + 1)
            };
            dataArray.push(obj);
            
        }
        });
        return dataArray;
    }

    var createHighcharts = (tableData)=>{
        Highcharts.chart('chart', {
        chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
        },
        title: {
        text: 'Cars manufacturer with market percentage (here percentage is random for example)'
        },
        tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
        point: {
        valueSuffix: '%'
        }
        },
        plotOptions: {
        pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
        enabled: false
        },
        showInLegend: true
        }
        },
        series: [{
        name: 'Brands',
        colorByPoint: true,
        data: tableData
        }]
        });
    }
    let draw = false;
    var setTableEvents = (table)=>{
        table.on("page", () => {
        draw = true;
        });

        // listen for updates and adjust the chart accordingly
        table.on("draw", () => {
        if (draw) {
        draw = false;
        } else {
        const tableData = getTableData(table);
        createHighcharts(tableData);
        }
        });
    }
</script>
@endsection