//DATATABLES
$(function () {
    $("#pegawais,#deptgroup").DataTable();
});

$("#x").click(function(){
    $("#iddept").val(" ");
});
$("#x2").click(function(){
    $("#Dept").val(" ");
});
$("#x3").click(function(){
    $("#Job").val(" ");
    $("#DeptNama").empty();
    $("#DeptNama").append("<option value='-'>-- Select Group Department ---</option>");
});
//SWEAT ALERT
