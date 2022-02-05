
@section('modal.form_start')
@show

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
        @section('modal.title')
        Title
        @show
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
        
<div class="modal-body">
    <div class="row">
        <div class="col-lg-12">
            
            <div id="message" class="hidden"></div>
            
            <div class="table-responsive" style="max-height: 450px; overflow-y: auto">
                
                @yield('modal.body')
                
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    
    <div id="additional_actions"></div>
    
    @section('modal.actions')
    
    @show
    
    @include('component.close_button')
    
</div>
    
@section('modal.form_end')
@show

<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script>
    $(document).ready(function () {
        let form = $("#ajaxForm");
        if (form.length > 0) {
            let submitBtn = form.closest('form').find(':submit');
            form.ajaxForm({
                url: $(this).attr("action"), 
                type: 'post',
                dataType:  'json',
                beforeSubmit: function () {
                    $("#message").removeClass("hidden alert-danger alert-info");
                    $("#message").html('<p>&nbsp;&nbsp; <img src="{{ asset('assets/img/loading.gif') }}" style="width: 20px"/> Mengirim Data ... </p>');
                    $("#message").addClass("alert alert-warning");
                    submitBtn.addClass("disabled");
                    submitBtn.attr("type", "button");
                    $("#additional_actions").html("");
                    submitBtn.html('<span class="fa fa-send"></span> Kirim');
                },
                success: function (e) {
                    if(false === e.status) {
                        $("#message").html("<p>Error: " + e.errors + "</p>");
                        $("#message").removeClass("hidden");
                        submitBtn.removeClass("disabled");
                        submitBtn.attr("type", "submit");
                        submitBtn.html('<span class="fa fa-save"></span> Simpan');
                    } else {
                        $("#message").html("<p>data berhasil disimpan</p>");
                        $("#message").removeClass("hidden");
                        $("#message").removeClass("alert-danger alert-warning");
                        $("#message").addClass("alert-info");
                        if (e.redirectURL) {
                            if (e.redirectURL.length > 0) {
                                for (i = 0; i < e.redirectURL.length; i++) {
                                    let uri = e.redirectURL[i];
                                    let icon = (uri.icon) ? uri.icon : '<i class="fa fa-list"></i>';
                                    $("#additional_actions").append('<a href="'+uri.url+'" target="_blank" class="btn btn-sm btn-outline-warning">'+icon+' '+uri.title+'</a>');
                                }

                                submitBtn.addClass("hidden");
                                submitBtn.attr("type", "submit");
                                submitBtn.html('<span class="fa fa-save"></span> Simpan');
                                $("#btn-modal-close").attr("onclick", "return location.reload();");
                            }
                        } else {
                            location.reload();
                        }
                    }
                },
                error: function(xhr, status, error) {
                    switch (xhr.status) {
                        case 500:
                            alert('500 status code! internal server error, please contact administrator.');
                            break;
                        case 302:
                            alert('session expire, please login.');
                            location.reload();
                            break;
                        default:
                            alert(xhr.responseText);
                            location.reload();
                            break;
                    }

                    $("#message").addClass("hidden");
                    submitBtn.removeClass("disabled");
                    submitBtn.attr("type", "submit");
                    submitBtn.html('<span class="fa fa-save"></span> Simpan');
                }
            });
        } 
    });
</script>
@section('modal.javascript')
@endsection