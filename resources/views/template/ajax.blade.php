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

    });
</script>