function addForm(){
    var addrow ='<div class="row baru-data" id="dynamic_form">\
                <div class="col-md-5">\
                <select class="form-control">\
                <label>Santri Lain</label>\
                   <option value="">- Pilih Santri -</option>\
                   <option value="1">Buku</option>\
                </select>\
                <br>\
              </div>\
              <div class="col-md-1 button-group">\
                  <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>\
                  <button type="button" class="btn btn-danger btn-hapus"><i class="fa fa-times"></i></button>\
              </div>\
              </div>\
                </div>'
    $("#dynamic_form").append(addrow);
 }
 
 $("#dynamic_form").on("click", ".btn-tambah", function(){
    addForm()
    $(this).css("display","none")     
    var valtes = $(this).parent().find(".btn-hapus").css("display","");
 })
 
 $("#dynamic_form").on("click", ".btn-hapus", function(){
  $(this).parent().parent('.baru-data').remove();
  var bykrow = $(".baru-data").length;
  if(bykrow==1){
    $(".btn-hapus").css("display","none")
    $(".btn-tambah").css("display","");
  }else{
    $('.baru-data').last().find('.btn-tambah').css("display","");
  }
 });
 
 $('.btn-simpan').on('click', function () {
    $('#dynamic_form').find('input[type="text"], input[type="number"], select, textarea').each(function() {
       if( $(this).val() == "" ) {
          event.preventDefault()
          $(this).css('border-color', 'red');
          
          $(this).on('focus', function() {
             $(this).css('border-color', '#ccc');
          });
       }
    })
 })