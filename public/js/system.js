//DATATABLES
$(function () {
    $("#pegawais,#deptgroup").DataTable();
});

//DEPARTEMENT
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
//CUSTOMER
$("#custCancel").click(function(){
    $("#CUST").val(" ");
    $("#CustName").val("");
});
//CUSTOMER sITE
$("#Cancelcust").click(function(){
    $("#CUSTS").val(" ");
    $("#PIC").val("");
    $("#Name").val("");
    $("#Phone").val("");
    $("#Address").val("");
});
