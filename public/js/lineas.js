const thisYear=new Date().getFullYear();

new Morris.Line({
// ID of the element in which to draw the chart.
element: 'myfirstchart',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
data: [
    { year: (thisYear-4).toString(), value: 3 },
    { year: (thisYear-3).toString(), value: 6 },
    { year: (thisYear-2).toString(), value: 5 },
    { year: (thisYear-1).toString(), value: 8 },
    { year: thisYear.toString(), value: 12 }
],
// The name of the data record attribute that contains x-values.
xkey: 'year',
// A list of names of data record attributes that contain y-values.
ykeys: ['value'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['Pepsi'],
resize:true,
lineColors:['#fe4918'],
lineWidth:1

});

//SELECT * FROM tabla WHERE MONTH(colfecha) = 10 AND YEAR(colfecha) = 2016