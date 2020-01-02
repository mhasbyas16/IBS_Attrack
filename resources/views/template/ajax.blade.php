<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content"),
            }
        });
    //DEPARTEMENT GROUP
        //DELETE
        $("body").on("click","#deptGroupDel",function(e){
            e.preventDefault();
            var dept_id=$(this).data("id");
            if (confirm('apakah anda akan menghapus data ini?')) {
            
            $.ajax({
                method: "GET",
                url: "{{url('/dept_grup/destroy')}}/"+dept_id,
                success: function(del){
                    $("#id_dept_"+dept_id).remove();
    
                    $(function(){
                      const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                      });
    
                      Toast.fire({
                      type: 'success',
                      title: 'Sukses Menghapus Data'
                      });
                    });
                },
                error: function (del) {
                    console.log("Error:",del);
                }
            });
            }
        });
    
    //DEPT
    //DELETE
      $("body").on("click","#DeptDel",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        if (confirm('apakah anda akan menghapus data ini?')) {
    
        $.ajax({
          method: "GET",
          url: "{{url('/dept/destroy')}}/"+id,
          success: function(dept){
            $("#id_dept_"+id).remove();
            $(function(){
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
              Toast.fire({
              type: 'success',
              title: 'Sukses Menghapus Data'
              });
            });
          },
          error: function(dept){
            condole.log('Error:',dept);
          }
        });
        }
      });
    
    //JOB TYPE
    //COMBOBOX
      $("#IDKelDept").on("change",function(e){
        e.preventDefault();
        var idkeldept= $(this).val();
    
        $.ajax({
          method: "GET",
          url: "{{url('/job_type/cmbx')}}/"+idkeldept,
          success: function(cmbx){
            console.log(cmbx);
            $("#DeptNama").empty();
            $.each(cmbx.isi,function(key,val){
              $("#DeptNama").append("<option value='"+val.id+"'>"+val.nama+"</option>");
            });
          },
          error: function(cmbx){
            console.log("Error:",cmbx);
          }
        });
      });
    //DELETE
      $("body").on("click","#JobTypeDel", function(e){
        e.preventDefault();
        var idJob=$(this).data("id");
    
        if (confirm('apakah anda akan menghapus data ini?')) {
        $.ajax({
          method: "GET",
          url: "{{url('/job_type/destroy')}}/"+idJob,
          success: function(result){
            $("#id_job_"+idJob).remove();
            $(function(){
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
              Toast.fire({
              type: 'success',
              title: 'Sukses Menghapus Data'
              });
            });
          }
        });
        }
      });
    
//CUSTOMER
    //SHOW EDIT
      $("body").on("click","#editCust", function(e){
        e.preventDefault();
        var idCust=$(this).data("id");
    
        $.ajax({
          method: "GET",
          url: "{{url('/customer/edit')}}/"+idCust,
          success: function(hasil){
            console.log(hasil);
          $("#CUST").val(" ");
          $("#CustName").val(" ");
          
          $("#CUST").val(hasil.id);
          $("#CustName").val(hasil.cust_name);
          },
          error: function(hasil){
            console.log("Error:",hasil);
          }
        });
      });
    //DELETE
      $("body").on("click","#deleteCust", function(e){
        e.preventDefault();
        var idCUST=$(this).data("id");
        if (confirm('apakah anda akan menghapus data ini?')) {
        $.ajax({
          method: "GET",
          url: "{{url('/customer/destroy')}}/"+idCUST,
          success: function(G){
            $("#id_cust_"+idCUST).remove();
            $(function(){
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
              Toast.fire({
              type: 'success',
              title: 'Sukses Menghapus Data'
              });
            });
          },
          error: function(G){
            console.log("Error:",G);
          }
        });    
        }     
      });

//CUSTOMER SITE
    //SHOW EDIT
    $("body").on("click","#editCustSite", function(e){
        e.preventDefault();
        var idCustS=$(this).data("id");
    
        $.ajax({
          method: "GET",
          url: "{{url('/customer_site/edit')}}/"+idCustS,
          success: function(hasil){
            console.log(hasil);
            $("#CUSTS").val(" ");
            $("#PIC").val("");
            $("#Name").val("");
            $("#Phone").val("");
            $("#Address").val("");
          
            $("#CUSTS").val(hasil.id);
            $("#PIC").val(hasil.pic);
            $("#Name").val(hasil.customer_site);
            $("#Phone").val(hasil.phone);
            $("#Address").val(hasil.address);
          },
          error: function(hasil){
            console.log("Error:",hasil);
          }
        });
      });
    //DELETE
    $("body").on("click","#deleteCustSite", function(e){
        e.preventDefault();
        var idCUSTS=$(this).data("id");
        if (confirm('apakah anda akan menghapus data ini?')) {
        $.ajax({
          method: "GET",
          url: "{{url('/customer_site/destroy')}}/"+idCUSTS,
          success: function(G){
            $("#id_site_"+idCUSTS).remove();
            $(function(){
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
              Toast.fire({
              type: 'success',
              title: 'Sukses Menghapus Data'
              });
            });
          },
          error: function(G){
            console.log("Error:",G);
          }
        });    
        }     
      });

//ATTENDANCE SEARCH DATE
  $("body").on("click","#searchAtt", function(e){
    e.preventDefault();
    var N = $("#min").val();
    var X = $("#max").val();
    $.ajax({
      method : "POST",
      url : "{{url('/att/search')}}",
      data : {
        min : N,
        max : X,
      },
      success : function(TB){
        console.log(TB);
        $("#export").attr("href", "{{url('/att/export')}}/"+N+"/"+X);
        //var export ="";
        //$("#export").text("<a href='' class='btn btn-primary'>axExport</a><br><br>");
        $("#isiTB").empty();

        var NO=0;

        $.each(TB, function(key,value){
          ++NO;
          var URL = "{{url('/att/detail/emp')}}/"+value.id+"/"+N+"/"+X;
          if (value.status=="telat") {
            var alert="<span class='right badge badge-danger'>Telat</span>";
          }else{
            var alert ="";
          }

          $("#isiTB").append(
                
          "<tr>"
              +"<td>"+NO+"</td>"
              +"<td>"+value.pegawai.nama+"</td>"
              +"<td>"+value.device_date_in+" "+value.device_time_in+"</td>"
              +"<td><a href='https://www.google.com/maps/search/"+value.loc_in+"' target='_blank'>"+value.loc_in+"</a></td>"
              +"<td>"+value.device_date_out+" "+value.device_time_out+"</td>"
              +"<td><a href='https://www.google.com/maps/search/"+value.loc_out+"' target='_blank'>"+value.loc_out+"</a></td>"
              +"<td>"
                  +alert
              +"</td>"
              +"<td style='width:50px;'>"
                  +"<a href='"+URL+"' target='_blank' class='btn btn-social-icon btn-info'>"
                    +"<i class='fa fa-info-circle'></i></a>"
              +"</td>"
              +"</tr>"

              +"<div class='modal fade' id='modal-lg-"+NO+"'>"
                              +"<div class='modal-dialog modal-lg'>"
                                +"<div class='modal-content'>"
                                  +"<div class='modal-header'>"
                                    +"<h4 class='modal-title'>Attendance"
                                    +"</h4>"
                                    +"<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                                      +"<span aria-hidden='true'>&times;</span>"
                                    +"</button>"
                                  +"</div>"
                                  +"<div class='modal-body'>"
                                    +"<div class='row'>"
                                      +"<div class='col-md-12 col-sm-12'>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Nama</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'>"+value.pegawai.nama+"</div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Server Date/Time In</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'>"+value.server_date_in+"/"+value.server_time_in+"</div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Device Date/Time In</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'>"+value.device_date_in+"/"+value.device_time_in+""                                           
                                          +"</div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Location In</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'><a href='https://www.google.com/maps/search/"+value.loc_in+"' target='_blank'>"+value.loc_in+"</a></div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Server Date/Time Out</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'>"+value.server_date_out+"/"+value.server_time_out+"</div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Device Date/Time Out</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'>"+value.device_date_out+"/"+value.device_time_out+""
                                           
                                          +"</div>"
                                        +"</div>"
                                        +"<div class='row'>"
                                          +"<div class='col-md-4 col-sm-4'>Location Out</div>"
                                          +"<div class='col-md-1 col-sm-1'>:</div>"
                                          +"<div class='col-md-7 col-sm-7'><a href='https://www.google.com/maps/search/"+value.loc_out+"' target='_blank'>"+value.loc_out+"</a></div>"
                                        +"</div>"
                                        +"<hr>"
                                      +"</div>"                                    
                                    +"</div>"
                                  +"</div>"
                                  +"<div class='modal-footer justify-content-between'>"
                                    +"<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>"
                                  +"</div>"
                                +"</div>"
                                
                              +"</div>"
                              
                            +"</div>"
      );

  
        });
              
      }
    });
  });

    });
</script>